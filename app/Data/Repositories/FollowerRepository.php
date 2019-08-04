<?php

namespace App\Data\Repositories;

use JWTAuth, Carbon\Carbon;
use Storage, Image, Zipper,App;
use Techplanner\Helpers\Helper;
use Hash, Illuminate\Support\Str;
use App\Follower;
use App\Contracts\RepositoryContract;


class FollowerRepository extends AbstractRepository implements RepositoryContract {

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
    protected $_cacheKey = 'follower-';
    protected $_cacheTotalKey = 'total-followers';

    public function __construct(Follower $follower) {
        $this->model = $follower;

        $this->user_repo  = app()->make('UserRepository');
        $this->store_repo = app()->make('StoreRepository');
     
}

    public function findById($id, $refresh = false, $details = false, $encode = true, $input = []) {
        $data = parent::findById($id, $refresh, $details);
        return $data;
    }


    public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {
        $this->builder = $this->model->orderBy('created_at');
        if (isset($input['store_id'])) {
            if (!empty($input['store_id'])) {
                $this->builder = $this->builder->where('store_id','=',$input['store_id']);
            }
        }

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


    public function becomeFollower(array $data = []) {
        
        $input['user_id']   = $data['user_id'];
        $input['store_id']  = $data['store_id'];
       
        if($follower = parent::create($input)){
          
      return $follower;
  }
  return false;
    }

    public function getFollowerOfStore(array $data = []){
        $input['store_id']   = $data['store_id'];
        $data2 = ['data'=>[]];
         $data1 = $this->findByAll(false,10,$input);
         foreach($data1['data'] as $singleObject){
            $data2['data'][] = $this->user_repo->findById($singleObject->user_id, false);
         }
         return $data2;
       
    
        }

        
    public function getFollowerOfUser(array $data = []){
        $input['user_id']   = $data['user_id'];
        $data2 = ['data'=>[]];
         $data1 = $this->findByAll(false,10,$input);
         foreach($data1['data'] as $singleObject){
            $data2['data'][] = $this->store_repo->findById($singleObject->store_id, false);
         }
         return $data2;
       
    
        }
    
    

    

    

  
    


}

