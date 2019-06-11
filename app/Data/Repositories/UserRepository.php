<?php

namespace App\Data\Repositories;

use JWTAuth, Carbon\Carbon;
use Storage, Image, Zipper,App;
use Techplanner\Helpers\Helper;
use Hash, Illuminate\Support\Str;
use App\User; 
use App\Contracts\RepositoryContract;


class UserRepository extends AbstractRepository implements RepositoryContract {

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
    protected $_cacheKey = 'user-';
    protected $_cacheTotalKey = 'total-users';

    public function __construct(User $user) {
        $this->model = $user;
     
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

  
    public function registerUser(array $data = []) {
        
        $input['email']         = $data['email'];
        $input['phone_number']  = $data['phone_number'];
        $input['name']        = $data['name'];
        $input['role_id']        = $data['role_id'] != '' ? $data['role_id'] : 0;
        $input['password']      = bcrypt($data['password']);
        $input['access_token']  = $data['access_token'];
       
        if($user = parent::create($input)){
            $token = JWTAuth::fromUser($user);
            $update = $this->update([
                'id' =>$user->id,
                'access_token' => $token,
            ]);
            return $update;
        }
        return false;
    }
  
    public function registerStore(array $data = []) {
        
        $input['email']         = $data['email'];
        $input['phone_number']  = $data['phone_number'];
        $input['name']        = $data['name'];
        $input['role_id']        = $data['role_id'] != '' ? $data['role_id'] : 0;
        $input['password']      = bcrypt($data['password']);
        $input['access_token']  = $data['access_token'];
        $input['store_id'] = $data['store_id'];
       
        if($user = parent::create($input)){
            $token = JWTAuth::fromUser($user);
            $update = $this->update([
                'id' =>$user->id,
                'access_token' => $token,
            ]);
            return $update;
        }
        return false;
    }


    public function login($data){
        $user = $this->findByAttribute('email', $data['email'], false, true, false);
        if($user){
            if(Hash::check($data['password'], $user->password)){
                $token = JWTAuth::fromUser($user);
                return $this->update([
                    'id' => $user->id,
                    'access_token' => $token,
                    
                ]);
            }else{
             return false;
            }
        }else{
            return false;
        }
        
    }


    public function loginWeb($data)
    {
        $user = $this->findByAttribute('email', $data['email'], false, true, false);
        if($user){
            if(Hash::check($data['password'], $user->password)){
                $token = JWTAuth::fromUser($user);
                return $this->update([
                    'id' => $user->id,
                    'access_token' => $token,
                    
                ]);
                return back();
            }  
            else{
                return false;
           }
        }else{
            return false;
        }
    }

    public function addUserProfile(array $data = []) {

        $input['email']         = $data['email'];
        $input['phone_number']  = $data['phone_number'];
        $input['name']        = $data['name'];
        $input['role_id']        = $data['role_id'] != '' ? $data['role_id'] : 0;
        $input['password']      = bcrypt($data['password']);
        $input['access_token']  = $data['access_token'];
        $input['profile_pic']  = $data['profile_pic'];
        $input['store_id']  = $data['store_id'];

        if($user = parent::create($input)){
            $token = JWTAuth::fromUser($user);
            $update = $this->update([
                'id' =>$user->id,
                'profile_pic' =>$data['profile_pic'],
                'access_token' => $token,
            ]);
            return $update;
        }
        return false;
    }
    public function editUserProfile(array $data = []) {
                    
        $update = User::whereId($data['id'])->update([
                'email' => $data['email'],
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'position' => $data['position'],
                'profile_pic' => $data['profile_pic'],
            ]);
            return $update;
    }
}
