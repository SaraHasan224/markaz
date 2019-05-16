<?php

namespace App\Data\Repositories;

use JWTAuth, Carbon\Carbon;
use Storage, Image, Zipper,App;
use Techplanner\Helpers\Helper;
use Hash, Illuminate\Support\Str;
use App\PromotionComment;
use App\Contracts\RepositoryContract;


class CommentRepository extends AbstractRepository implements RepositoryContract {

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
    protected $_cacheKey = 'comment-';
    protected $_cacheTotalKey = 'total-comments';

    public function __construct(PromotionComment $comment) {
        $this->model = $comment;
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


    public function addComment(array $data = []){
        $input['user_id']   = $data['user_id'];
        $input['promotion_id']  = $data['promotion_id'];
        $input['comment'] = $data['comment'];
       
        if($comment = parent::create($input)){
          
      return $comment;
  }
  return false;
    }

    public function getCommentsOfPromotion(array $data = []){
        $input['promotion_id']   = $data['promotion_id'];
        $data1 =  $this->findByAll(false,10,$input);
        foreach($data1['data'] as $singleObject){
       $singleObject->user = $this->user_repo->findById($singleObject->user_id, false);
       $data2['data'][]= $singleObject;
                }
      return $data2;
            }
  
    

}

