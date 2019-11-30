<?php

namespace Unicorn\Author\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Unicorn\Author\Models\Users;
use Unicorn\Author\Models\Role;

use Closure;
use DB;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$per = null)
    {   
        // $ListRoleOrUser = Users::find(Auth()->id())->roles()->select('role.permission')->pluck('permission')->toarray();
        // foreach($ListRoleOrUser as $row){
        //     $arr = json_decode($row);
        //     if (in_array($per,$arr)) {
        //         return $next($request);
        //     }
        // } 
        // return abort(401);
        

        
    //     $ListRoleOrUser = Users::where('users.id',Auth()->id())
    //         ->join('role_user','users.id', '=' , 'role_user.user_id')
    //         ->join('role','role_user.role_id', '=' ,'role.id')
    //         ->select('role.*')
    //         ->get()->pluck('permission');

    //     foreach($ListRoleOrUser as $row){
    //             $arr = json_decode($row);
    //             if (in_array($per,$arr)) {
    //                 return $next($request);
    //             }
    //         } 
    //         return redirect('admin/users');
    // }
}
}
