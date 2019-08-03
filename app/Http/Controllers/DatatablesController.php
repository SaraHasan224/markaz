<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Follower,
    App\Store,
    App\Support,
    App\Promotion,
    App\Categories,
    App\Tags,
    App\User;
use yajra\Datatables\Datatables;
class DatatablesController extends Controller
{
    public function getCategories()
    {
        $role =  session()->get('role_name');
        
        $getCategories = Categories::select('id','title','image','created_at');
        return Datatables::of($getCategories)
        ->editColumn('image', function ($cat) {
            return("<img src=".asset('images/category')."/".$cat->image." style='width:60px; height:60px;'/>");
        })->editColumn('actions', function ($categories)  use($role)   {
            $actions = '';
            if($role == 'Admin')
            {
                $actions = ' 
                <a  id="delete" data-id="'.$categories->id.'" 
                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                    <i class="la la-trash" style="color:#ef2626;"></i>
                </a>
                <a  id="edit_categories" data-id="'.$categories->id.'" data-category="'.$categories->title.'"  data-image="'.$categories->image.'"   
                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                    <i class="la la-edit"></i>
                </a>';
            }else{
                $actions = 'You don\'t have permissions to perform any action';
            }
            return($actions);
        })->rawColumns(['actions','image'])->make();
    }
    public function getTags()
    {
        $role =  session()->get('role_name');
        
        $getTags = Tags::select('id','title','created_at');
        return Datatables::of($getTags)
       ->editColumn('actions', function ($tags)  use($role)   {
            $actions = '';
            if($role == 'Admin')
            {
                $actions = '<a  id="delete" data-id="'.$tags->id.'" 
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                <i class="la la-trash" style="color:#ef2626;"></i>
                            </a>';
                $actions .= '<a  id="edit_tags" data-id="'.$tags->id.'" data-tag="'.$tags->title.'" 
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                <i class="la la-edit"></i>
                            </a>';
            }        else{
                $actions = 'You don\'t have permissions to perform any action';
            }    
            return($actions);
        })->rawColumns(['actions'])->make();
    }
    public function getstore($user_id = '')
    {
        $role =  session()->get('role_name');
        if($user_id == '')
        {
            $getStore = DB::table('stores')
            ->leftJoin('categories', 'stores.category_id', '=', 'categories.id')
            ->select('categories.title as category_id','stores.id as id','stores.name as name','stores.address as address','stores.telephone as telephone','stores.website as website','stores.emailaddress as emailaddress','stores.tagline as tagline','stores.status as status','stores.user_id as user_id','stores.created_at as created_at');
        }else{
            $getStore = DB::table('stores')->where('user_id',$user_id)
            ->leftJoin('categories', 'stores.category_id', '=', 'categories.id')
            ->select('categories.title as category_id','stores.id as id','stores.name as name','stores.address as address','stores.telephone as telephone','stores.website as website','stores.emailaddress as emailaddress','stores.tagline as tagline','stores.status as status','stores.user_id as user_id','stores.created_at as created_at');
        }
        return Datatables::of($getStore)
        ->editColumn('telephone', function ($store) {
            return(str_limit($store->telephone, 50));
        })->editColumn('tagline', function ($store) {
            return(str_limit($store->tagline, 50));
        })->editColumn('status', function ($store) {
            if($store->status == 1)
            {
                $status = '<button type="button" class="btn m-btn--pill btn-accent response" id="status" data-id="'.$store->id.'" >Enable</button>';
            }
            else{
                $status = '<button type="button" class="btn m-btn--pill btn-focus response"  id="status" data-id="'.$store->id.'" >Disable</button>';
            }
            return($status);
        })->editColumn('actions', function ($store)  use($role)  {
            $actions = '';
            if($role == 'Admin' || $role == 'Store Admin')
            {
                $actions .= 
                '<a id="edit_store" href="'.url("edit-store").'/'.$store->id.'"
                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                        title="Edit Store" ><i class="la la-edit"></i></a>
                <a  id="delete" data-id="'.$store->id.'" 
                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                    <i class="la la-trash" style="color:#ef2626;"></i>
                </a><span class="dropdown">
                            <a href="#"
                                class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="'.url("followers/".$store->id).'"><i class="la la-edit"></i> Manage Following</a>
                                <a class="dropdown-item" href="'.url("unfollowers/".$store->id).'"><i class="la la-edit"></i> Manage Blocked</a>
                            </div>
                    </span>';
            }
            else if(($role == 'Store Franchise'))
            {
                $actions .= '<span class="dropdown">
                        <a href="#"
                            class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                            data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="'.url("followers/".$store->user_id).'"><i class="la la-edit"></i> Manage Following</a>
                            <a class="dropdown-item" href="'.url("unfollowers/".$store->user_id).'"><i class="la la-edit"></i> Manage Blocked</a>
                        </div>
                </span>';
            }
            return($actions);
        })->rawColumns(['tagline','actions','status'])->make();
    }
    public function getpromotions($store_id = '')
    { 
        $role =  session()->get('role_name');
        if($store_id == '')
        {
            $getPromotions = Promotion::select('id','title','start_time','end_time','location','longitude','latitude','image','store_id','radius','payment_status','created_at')->with('hasstore');
        }else{
            $getPromotions = Promotion::where('store_id',$store_id)->select('id','title','start_time','end_time','location','longitude','latitude','image','store_id','radius','payment_status','created_at')->with('hasstore');
        }

        return Datatables::of($getPromotions)
        ->editColumn('store_id', function ($promotion) {
            return(empty($promotion->hasstore) ? '' : $promotion->hasstore->name);
        })->editColumn('start_time', function ($promotion) {
            return(date('d-M-Y H:i A', strtotime($promotion->start_time)).' to '.date('d-M-Y H:i A', strtotime($promotion->end_time)));
        })->editColumn('location', function ($promotion) {
            return($promotion->location.' longitude = '.$promotion->longitude.' latitude = '.$promotion->latitude);
        })->editColumn('image', function ($users) {
            return("<img src=".asset('images/promotion')."/".$users->image." style='width:60px; height:60px;'/>");
        })->editColumn('created_at', function ($promotion)    {
             return(date('d-M-Y H:i A', strtotime($promotion->created_at)));
        })->editColumn('actions', function ($promotion)  use($role)   {
            $actions = '';
            if($role == 'Admin' || $role == 'Store Admin')
            {
                $actions = ' <a  id="delete" data-id="'.$promotion->id.'" 
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                <i class="la la-trash" style="color:#ef2626;"></i>
                            </a> 
                            <a href="'.url("promotions/edit/".$promotion->id).'" id="m_view_6" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                title="Eit"><i class="la la-edit"></i>
                            </a>';
            }
            return($actions);
        })->rawColumns(['image','actions','location','store_id'])->make();
    }
    public function getusers()
    {
        $role = session()->get('role_name');
        $getusers = DB::table('users')
        ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
        ->select('users.id as id','users.name as name','users.email as email','users.profile_pic as profile_pic','users.phone_number as phone_number','roles.name as role_id','users.created_at as created_at');
        return Datatables::of($getusers)
        ->editColumn('profile_pic', function ($users) {
            return("<img src=".asset('images/user')."/".$users->profile_pic." style='width:60px; height:60px;'/>");
        })
        ->editColumn('actions', function ($users)   use($role)  {
            $actions = '';
            if($role == 'Admin' || $role == 'Store Admin')
            {
                $actions = ' 
                <a  id="delete" data-id="'.$users->id.'" 
                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                    <i class="la la-trash" style="color:#ef2626;"></i>
                </a>
                <a  id="view" data-id="'.$users->id.'" 
                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                    <i class="la la-edit"></i>
                </a>';
            }
            return($actions);
        })->rawColumns(['actions','profile_pic','role_id'])->make();
    }
    public function getsupport($store_id = '')
    {
        $role =  session()->get('role_name');
        if($role == 'Admin')
        {
            $getusers = Support::with('getstore')->select('id','store_id','first_name','last_name','email','subject','description','response','status','created_at');
        }else
        {
            $getusers = Support::where('store_id',$store_id)->with('getstore')->select('id','store_id','first_name','last_name','email','subject','description','response','status','created_at');
        }
        return Datatables::of($getusers)
        ->editColumn('store_id', function ($users) { 
            return($users->getstore->name);
        })->filterColumn('store_id', function($query, $keyword) {
            $sql = "(stores.name)  like ?";
            $query->whereRaw($sql, ["%{$keyword}%"]);
        })->editColumn('first_name', function ($users) {
            return($users->first_name.' '.$users->last_name);
        })->filterColumn('first_name', function($query, $keyword) {
            $sql = "CONCAT(support.first_name,' ',support.last_name)  like ?";
            $query->whereRaw($sql, ["%{$keyword}%"]);
        })->editColumn('status', function ($users) {
            if($users->status == 0)
            {
                $actions = '<button type="button" class="btn m-btn--pill btn-accent response" data-toggle="modal" data-target="#m_status_6" data-id="'.$users->id.'" data-response="'.$users->response.'">Waiting for response</button>';
            }
            else{
                $actions = '<button type="button" class="btn m-btn--pill btn-focus response"  data-toggle="modal" data-target="#m_status_6" data-id="'.$users->id.'" data-response="'.$users->response.'">Response sent</button>';
            }
            return($actions);
        })
        ->rawColumns(['store_id','status','first_name'])->make();
    }
    public function getfollowers($store_id = '')
    {      
        $role =  session()->get('role_name');
        if($role == 'Admin')
        {
            $getfollowers = DB::table('followers')
            ->leftJoin('users', 'followers.user_id', '=', 'users.id')
            ->where('followers.deleted_at',NULL)
            ->select('followers.id as id','users.name as  name','followers.store_id as store_id','followers.created_at as created_at','followers.status as status');
        }else
        {
            $getfollowers = DB::table('followers')->where('store_id',$store_id)
            ->leftJoin('users', 'followers.user_id', '=', 'users.id')
            ->where('followers.deleted_at',NULL)
            ->select('followers.id as id','users.name as  name','followers.store_id as store_id','followers.created_at as created_at','followers.status as status');
        }
        return Datatables::of($getfollowers)
        ->editColumn('status', function ($follower) {
            if($follower->status == 0)
            {
                $actions = '<button type="button" class="btn m-btn--pill btn-accent">Followed</button>';
            }
            elseif($follower->status == 1){
                $actions = '<button type="button" class="btn m-btn--pill btn-focus">Blocked</button>';
            }
            return($actions);
        })
        ->rawColumns(['status'])->make();
    }
    public function getunfollowers($store_id = '')
    {    
        $role =  session()->get('role_name');
        if($role == 'Admin')
        {
            $getfollowers = DB::table('followers')
            ->leftJoin('users', 'followers.user_id', '=', 'users.id')
            ->where('followers.deleted_at','<>',NULL)
            ->select('followers.id as id','users.name as  name','followers.store_id as store_id','followers.created_at as created_at','followers.status as status');
        }else{
            $getfollowers = DB::table('followers')->where('store_id',$store_id)
            ->leftJoin('users', 'followers.user_id', '=', 'users.id')
            ->where('followers.deleted_at','<>',NULL)
            ->select('followers.id as id','users.name as  name','followers.store_id as store_id','followers.created_at as created_at','followers.status as status');    
        }
        return Datatables::of($getfollowers)
        ->editColumn('user_id', function ($follower) {
            return(!empty($follower->hasUser) ? $follower->hasUser->name : '');
        })
        ->editColumn('status', function ($follower) {
            if($follower->status == 0)
            {
                $actions = '<button type="button" class="btn m-btn--pill btn-accent">Followed</button>';
            }
            elseif($follower->status == 1){
                $actions = '<button type="button" class="btn m-btn--pill btn-focus">Blocked</button>';
            }
            return($actions);
        })
        ->rawColumns(['status','user_id'])->make();
    }
    public function getQuestions($id = null)
    {
        $role =  session()->get('role_name');
        $getQuestions = DB::table('faq')
        ->where('faq.store_id',$id)
        ->select('faq.id as id','faq.description as description','faq.status as status','faq.title as title');
        return Datatables::of($getQuestions)
        ->editColumn('description', function ($question) {
            return(str_limit($question->description, 150));
        })
        ->editColumn('status', function ($question)  use($role)   {
            $status = '';
            if($role == 'Admin' || $role == 'Store Admin')
            {
                if($question->status == 0)
                {
                    $status = '<button type="button" id="status" data-id="'.$question->id.'"  data-status="'.$question->status.'" class="btn m-btn--pill btn-accent">Disabled</button>';
                }
                elseif($question->status == 1){
                    $status = '<button type="button" id="status" data-id="'.$question->id.'"  data-status="'.$question->status.'" class="btn m-btn--pill btn-focus">Enabled</button>';
                }
            }
            return($status);
        })
        ->editColumn('actions', function ($question)   use($role)  {
            $actions = '';
            if($role == 'Admin' || $role == 'Store Admin')
            {
                $actions = ' 
                <a  id="delete" data-id="'.$question->id.'" 
                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                    <i class="la la-trash" style="color:#ef2626;"></i>
                </a>
                <a  id="edit_faq" data-id="'.$question->id.'" 
                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                    <i class="la la-edit"></i>
                </a>';
            }
            return($actions);
        })->rawColumns(['status','description','actions'])->make();
    }
}
