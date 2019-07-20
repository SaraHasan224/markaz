<?php

namespace App\Data\Repositories;

use JWTAuth, Carbon\Carbon;
use Storage, Image, Zipper,App;
use Techplanner\Helpers\Helper;
use Hash, Illuminate\Support\Str;
use App\Store;
use App\Contracts\RepositoryContract;
use App\Data\Repositories\FollowerRepository;
use App\Follower;


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
        //  $this->follower_repo = app()->make('FollowerRepository');
    }

    public function findById($id, $refresh = false, $details = false, $encode = true, $input = []) {
        $data = parent::findById($id, $refresh, $details);
        return $data;
    }


    public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {
        $this->builder = $this->model->orderBy('created_at');

        // if (isset($input['user_id'])) {
        //     if (!empty($input['user_id'])) {
        //         $this->builder = $this->builder->where('user_id','=',$input['user_id']);
        //     }
        // }

        if(isset($input['category_id'])){
            if (!empty($input['category_id'])) {
                $this->builder = $this->builder->where('category_id','=',$input['category_id']);
            }
        }

        if (!empty($input['keyword']) && is_string($input['keyword'])) {
            $this->builder->where('name', 'like', "%{$input['keyword']}%");
            $this->builder->orWhere('tagline', 'like', "%{$input['keyword']}%");
            $this->builder->orWhere('description', 'like', "%{$input['keyword']}%");
        }
        return parent::findByAll($pagination, $perPage, $input);
    }

  
    public function createStore(array $data = []) {
        
        $input['name']         = $data['name'];
        $input['address']  = $data['address'];
        $input['latitude']        = $data['latitude'];
        $input['longitude']      = $data['longitude'];
        $input['tagline'] = $data['tagline'];
        $input['description'] = $data['description'];
        $input['telephone'] = $data['telephone'];
        $input['emailaddress'] = $data['emailaddress'];
        $input['user_id'] = $data['user_id'];
        $input['category_id'] = $data['category_id'];
        $input['website'] = $data['website'];
        $input['image'] = $data['image']; 
        $input['cover'] = $data['cover']; 
      if($store = parent::create($input)){
            if($store){
                $store->image  = ($store->image===NULL)? $store->image 
                            : Storage::url(config('app.files.store.public_relative').$store->image);

                            $store->cover  = ($store->cover===NULL)? $store->cover 
                            : Storage::url(config('app.files.store.public_relative').$store->cover);
                            
                 }
                return $store;
        }
        return false;
    }
    
    public function getNewStores(array $data1 = []){
        $stores = Store::orderBy('id', 'desc')->take(10)->get();
        foreach($stores as $singleStore){
            $input['store_id'] = $singleStore->id;
            $data = app()->make('FollowerRepository')->findByAll(false,10,$input);
            $isFollowed = app()->make('FollowerRepository')->isFollowed($data1['user_id'],$singleStore->id);
            $singleStore->followers = sizeof($data['data']);
            $singleStore->isFollowed = $isFollowed;
    }
    return $stores;

    }


    public function findAllStore(array $data = []){
        $data1 =  $this->findByAll(false,10,$data);
        foreach($data1['data'] as $singleObject){
            $input['store_id'] = $singleObject->id;
            $data2 = app()->make('FollowerRepository')->findByAll(false,10,$input);
            $isFollowed = app()->make('FollowerRepository')->isFollowed($data['user_id'],$singleObject->id);
            $singleObject->followers = sizeof($data2['data']);
            $singleObject->isFollowed = $isFollowed;
                }
      return $data1;

    }
  

}
