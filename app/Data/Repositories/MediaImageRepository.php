<?php

namespace App\Data\Repositories;

use JWTAuth, Carbon\Carbon;
use Storage, Image, Zipper,App;
use Techplanner\Helpers\Helper;
use Hash, Illuminate\Support\Str;
use App\MediaImage;
use App\Contracts\RepositoryContract;


class MediaImageRepository extends AbstractRepository implements RepositoryContract {

    /**
     *
     * These will hold the instance of User Class.
     *
     * @var object
     * @access public
     * 
     **/
    public $model;

    /**
     *
     * This is the prefix of the cache key to which the
     * user data will be stored
     * user Auto incremented Id will be append to it
     *
     * Example: user-1
     *
     * @var string
     * @access protected
     *
     **/
    protected $_cacheKey = 'mediaImages-';
    protected $_cacheTotalKey = 'total-media-images';

    public function __construct(MediaImage $mediaImage) {
        $this->model = $mediaImage;
     
}

    public function findById($id, $refresh = false, $details = false, $encode = true, $input = []) {
        $data = parent::findById($id, $refresh, $details);
        return $data;
    }


    public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {
        $this->builder = $this->model->orderBy('created_at', 'desc');

        if (!empty($input['keyword']) && is_string($input['keyword'])) {
            $this->builder->where('name', 'like', "%{$input['keyword']}%");
            $this->builder->orWhere('email', 'like', "%{$input['keyword']}%");
        }
        return parent::findByAll($pagination, $perPage, $input);
    }

    public function uploadImage(array $data = []){ 
        $input['image'] = $data['image']; 
        if($upload = parent::create($input)){
            if($upload){
           $upload->image  = ($upload->image===NULL)? $upload->image 
                       : Storage::url(config('app.files.promotion.public_relative').$upload->image);
                       
            }
            return $upload;
       }
       return false;
    }

}

