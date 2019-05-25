<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Store,
    App\Support,
    App\Promotion,
    App\PromotionCategories,
    App\PromotionTags,
    App\User;
use yajra\Datatables\Datatables;
class DatatablesController extends Controller
{
    public function getstore()
    {
        $getStore = Store::select('id','name','address','telephone','websitelink','emailaddress','desciption','latitude','longitude','user_id','status','created_at');
        return Datatables::of($getStore)
        ->editColumn('desciption', function ($store) {
            return(str_limit($store->desciption, 50));
        })->editColumn('status', function ($store) {
            if($store->status == 1)
            {
                $status = '<button type="button" class="btn m-btn--pill btn-accent response" data-toggle="modal" data-target="#m_status_6" data-id="'.$store->id.'">Enable</button>';
            }
            else{
                $status = '<button type="button" class="btn m-btn--pill btn-focus response"  data-toggle="modal" data-target="#m_status_6" data-id="'.$store->id.'">Disable</button>';
            }
            return($status);
        })->editColumn('actions', function ($store) {
            $actions = '
        <a id="view_store" data-id="'.$store->id.'"
            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
            title="View Store" ><i class="la la-eye"></i></a>
            <a id="edit_store" data-id="'.$store->id.'"
                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                title="Edit Store" ><i class="la la-edit"></i></a>
        <a  id="delete" data-id="'.$store->id.'" 
            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
            <i class="la la-trash" style="color:#ef2626;"></i>
        </a>
        <span class="dropdown">
            <a href="#"
                class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="'.url("followers/".$store->user_id).'"><i class="la la-edit"></i> Manage Following</a>
                <a class="dropdown-item" href="'.url("unfollowers/".$store->user_id).'"><i class="la la-edit"></i> Manage Blocked</a>
            </div>
        </span>';
            return($actions);
        })->rawColumns(['actions','status'])->make();
    }
    public function getpromotions()
    {
        $getPromotions = Promotion::select('id','title','description','time','location','longitude','latitude','payment_status','store_id','created_at')->with('hasstore');
        return Datatables::of($getPromotions)
        ->editColumn('store_id', function ($promotion) {
            return(empty($promotion->hasstore) ? '' : $promotion->hasstore->name);
        })->editColumn('location', function ($promotion) {
            return($promotion->location.' longitude = '.$promotion->longitude.' latitude = '.$promotion->latitude);
        })->editColumn('actions', function ($promotion) {
            $actions = ' <a  id="delete" data-id="'.$promotion->id.'" 
                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                            <i class="la la-trash" style="color:#ef2626;"></i>
                        </a>
                        <a href="'.url("view-promotions").'" id="m_view_6" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                            title="Eit"><i class="la la-edit"></i>
                        </a>';
            return($actions);
        })->rawColumns(['actions','location','store_id'])->make();
    }
    public function getCategories()
    {
        $getCategories = PromotionCategories::select('id','title','status','created_at');
        return Datatables::of($getCategories)
        ->editColumn('status', function ($store) {
            if($store->status == 1)
            {
                $status = '<button type="button" class="btn m-btn--pill btn-accent" data-id="'.$store->id.'">Enable</button>';
            }
            else{
                $status = '<button type="button" class="btn m-btn--pill btn-focus" data-id="'.$store->id.'">Disable</button>';
            }
            return($status);
        })->editColumn('actions', function ($categories) {
            $actions = ' 
            <a  id="delete" data-id="'.$categories->id.'" 
                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                <i class="la la-trash" style="color:#ef2626;"></i>
            </a>
            <a  id="edit_categories" data-id="'.$categories->id.'" data-category="'.$categories->title.'" 
                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                <i class="la la-edit"></i>
            </a>';
            return($actions);
        })->rawColumns(['actions','status'])->make();
    }
    public function getTags()
    {
        $getTags = PromotionTags::select('id','title','status','created_at');
        return Datatables::of($getTags)
        ->editColumn('status', function ($store) {
            if($store->status == 1)
            {
                $status = '<button type="button" class="btn m-btn--pill btn-accent" data-id="'.$store->id.'">Enable</button>';
            }
            else{
                $status = '<button type="button" class="btn m-btn--pill btn-focus" data-id="'.$store->id.'">Disable</button>';
            }
            return($status);
        })->editColumn('actions', function ($tags) {
            $actions = ' 
            <a  id="delete" data-id="'.$tags->id.'" 
                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                <i class="la la-trash" style="color:#ef2626;"></i>
            </a>
            <a  id="edit_tags" data-id="'.$tags->id.'" data-tag="'.$tags->title.'" 
                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                <i class="la la-edit"></i>
            </a>';
            return($actions);
        })->rawColumns(['actions','status'])->make();
    }
    public function getusers()
    {
        $getusers = User::select('id','email','name','phone_number','profile_pic','position','created_at');
        return Datatables::of($getusers)
        ->editColumn('actions', function ($users) {
            $actions = ' 
            <a  id="delete" data-id="'.$users->id.'" 
                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                <i class="la la-trash" style="color:#ef2626;"></i>
            </a>
            <a  id="view" data-id="'.$users->id.'" 
                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                <i class="la la-edit"></i>
            </a>';
            return($actions);
        })->rawColumns(['actions'])->make();
    }
    public function getsupport()
    {
        $getusers = Support::with('getstore')->select('id','store_id','first_name','last_name','email','subject','description','response','status','created_at');
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
    public function getfollowers()
    {
        $getusers = DB::table('followers')->select('id','user_id','store_id','created_at');
        return Datatables::of($getusers)
        // ->editColumn('actions', function ($users) {
        //     $actions = '<span class="dropdown">
        //     <a href="#"
        //         class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
        //         data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
        //     <div class="dropdown-menu dropdown-menu-right">
        //         <a class="dropdown-item" href="'.url("edit-users").'"><i class="la la-edit"></i> Edit Details</a>
        //         <a class="dropdown-item" href="#" data-toggle="modal" id="m_status_6"
        //             data-target="#m_status_6" data-id="'.$users->id.'"><i class="la la-leaf"></i> Update Status</a>
        //     </div>
        // </span>
        // <a href="'.url("view-promotions").'" id="m_view_6"
        //     class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
        //     title="View"><i class="la la-edit"></i></a>';
        //     return($actions);
        // })
        ->make();
    }
    public function getunfollowers()
    {
        $getusers = DB::table('followers')->where('deleted_at','<>',Null)->select('id','user_id','store_id','created_at');
        return Datatables::of($getusers)
        // ->editColumn('actions', function ($users) {
        //     $actions = '<span class="dropdown">
        //     <a href="#"
        //         class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
        //         data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
        //     <div class="dropdown-menu dropdown-menu-right">
        //         <a class="dropdown-item" href="'.url("edit-users").'"><i class="la la-edit"></i> Edit Details</a>
        //         <a class="dropdown-item" href="#" data-toggle="modal" id="m_status_6"
        //             data-target="#m_status_6" data-id="'.$users->id.'"><i class="la la-leaf"></i> Update Status</a>
        //     </div>
        // </span>
        // <a href="'.url("view-promotions").'" id="m_view_6"
        //     class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
        //     title="View"><i class="la la-edit"></i></a>';
        //     return($actions);
        // })
        ->make();
    }
    
}
