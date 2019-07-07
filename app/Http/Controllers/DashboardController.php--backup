<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashView()
    {
        if($request->isMethod('post'))
        {
            $role = session()->get('role_name');
            if($role = 'Admin')
            {
                
            }else{
                $stores = Store::all();
                $views = [];
                foreach($stores as $store){ array_push($views,$store->views); }
                $data['total_views'] =  array_sum($views)/count($stores)*100;

                $followed = Follower::where('status',1)->get();
                $unfollowed = Follower::where('status',0)->get();
                $users = Users::where('role_id',4)->get();

                $data['total_followers']  =  count($followed)/count($users)*100;
                $data['total_unfollowers']  =  count($unfollowed)/count($users)*100;

                $data['recent_followers']  =  Follower::orderBy('id',DESC)->with('hasuser')->limit(20);
                $data['recent_promotions']  =  Promotion::orderBy('id',DESC)->with('hasuser')->limit(20);
            }
        
        }
        
    }
}
