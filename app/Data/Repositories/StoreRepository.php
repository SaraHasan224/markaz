<?php

namespace App\Data\Repositories;

use JWTAuth, Carbon\Carbon;
use Storage, Image, Zipper,App;
use Techplanner\Helpers\Helper;
use Hash, Illuminate\Support\Str;
use App\Store;
use App\Contracts\RepositoryContract;


class StoreRepository extends AbstractRepository implements RepositoryContract {

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
    protected $_cacheKey = 'store-';
    protected $_cacheTotalKey = 'total-stores';

    public function __construct(Store $store) {
        $this->model = $store;
     
}

    public function findById($id, $refresh = false, $details = false, $encode = true, $input = []) {
        $data = parent::findById($id, $refresh, $details);
        return $data;
    }


    public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {
        $this->builder = $this->model->orderBy('created_at');

        if (isset($input['user_id'])) {
            if (!empty($input['user_id'])) {
                $this->builder = $this->builder->where('user_id','=',$input['user_id']);
            }
        }

        if (!empty($input['keyword']) && is_string($input['keyword'])) {
            $this->builder->where('name', 'like', "%{$input['keyword']}%");
            $this->builder->orWhere('email', 'like', "%{$input['keyword']}%");
        }
        return parent::findByAll($pagination, $perPage, $input);
    }

  
    public function createStore(array $data = []) {
        
        $input['name']         = $data['name'];
        $input['address']  = $data['address'];
        $input['latitude']        = $data['latitude'];
        $input['longitude']      = $data['longitude'];
        $input['user_id']  = $data['user_id'];
       
        if($store = parent::create($input)){
          
      return $store;
  }
  return false;
    }


}

