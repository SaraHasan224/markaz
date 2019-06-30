<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User,
    App\EventLog,
    DB;
    
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionController extends Controller
{
    public function getroles(){
        $data['title'] = "Manage Roles";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->with('permissions')->first();
        $data['logged_user'] = $getuser;        
        $role = DB::table('roles')->where('name',session()->get('role_name'))->first();
        if($role->id == 1){
            $data['roles'] = DB::table('roles')->get();
        }else{
            $data['roles'] = '';
        }
        $data['role'] = $role->name;
        return view('roles.view-roles',$data);
    }
    public function getpermission(){
        $data['title'] = "Manage Permission";
        $user_id = session()->get('user_id');
        $getuser = User::where('id',$user_id)->with('permissions')->first();
        $data['logged_user'] = $getuser;        
        $role = DB::table('roles')->where('name',session()->get('role_name'))->first();
        $data['permission'] = DB::table('permissions')->get();
        $data['role'] = $role->name;
        return view('roles.view-permission',$data);
    } 
    public function addpermission(Request $request){
            $repsonse = Permission::create(['name' => $request->name]);
            EventLog::create([
                'component' => 'Permission',
                'component_name' => $repsonse->name,
                'operation' => 'Added',
                'user_id'   => session()->get('user_id')
            ]);
            if($repsonse){
                $code = 200;
                $output = ['code' => $code,'message'=>'Permission added successfully.'];
            }else{
                $code = 400;
                $output = ['code' => $code,'message' => 'An error occurred while adding Permission.'];
            }
        return response()->json($output, $code);
    }
    public function viewrolepermission(Request $request, $role_id = null){
        if($request->isMethod('post'))
        {
            $findRolehasPermission = DB::table('role_has_permissions')
                                        ->leftJoin('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                        ->where('role_id',$role_id)->select('role_has_permissions.permission_id','permissions.name')->get();
            $code = 200;
            $output = ['code' => $code,'message' => $findRolehasPermission];
            return response()->json($output, $code);
        }
    }
}
