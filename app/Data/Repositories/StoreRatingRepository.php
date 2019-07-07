<?php

namespace App\Data\Repositories;

use JWTAuth, Carbon\Carbon;
use Storage, Image, Zipper,App;
use Techplanner\Helpers\Helper;
use Hash, Illuminate\Support\Str;
use App\StoreRating;
use App\Contracts\RepositoryContract;


class StoreRatingRepository extends AbstractRepository implements RepositoryContract {

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
    protected $_cacheKey = 'store-ratings-';
    protected $_cacheTotalKey = 'total-store-ratings';

    public function __construct(StoreRating $rating) {
        $this->model = $rating;
        $this->user_repo  = app()->make('UserRepository');
     
}

    public function findById($id, $refresh = false, $details = false, $encode = true, $input = []) {
        $data = parent::findById($id, $refresh, $details);
        return $data;
    }


    public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {
        $this->builder = $this->model->orderBy('created_at');

        if (isset($input['promotion_id'])) {
            if (!empty($input['promotion_id'])) {
                $this->builder = $this->builder->where('promotion_id','=',$input['promotion_id']);
            }
        }
       
        if (!empty($input['keyword']) && is_string($input['keyword'])) {
            $this->builder->where('name', 'like', "%{$input['keyword']}%");
            $this->builder->orWhere('email', 'like', "%{$input['keyword']}%");
        }
        return parent::findByAll($pagination, $perPage, $input);
    }


    public function addRatings(array $data = []){
        $input['user_id']   = $data['user_id'];
        $input['store_id']  = $data['store_id'];
        $input['rating'] = $data['rating'];
        if($rating = parent::create($input)){
            return $rating;
        }
        return false;
    }

    public function getRatingsOfStore(array $data = []){
        $input['store_id']   = $data['store_id'];
        $data1 =  $this->findByAll(false,10,$input);
        $rating = [];
        foreach($data1['data'] as $key =>$singleObject){
            array_push($rating,(float)$singleObject->rating); 
        }
        $calculated_rating = array_sum($rating)/count($data1['data']);
        return $calculated_rating;
    }
  
    

}

