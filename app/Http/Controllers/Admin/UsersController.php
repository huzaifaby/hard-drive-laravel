<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\PrivacyPolicy;
use App\Models\TermsandCondition;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Hash;

class UsersController extends Controller
{
    //index
    public function index()
    {
        $users = User::select('users.id as users_id', 'users.*', 'user_roles.*')
        ->leftJoin('user_roles', 'user_roles.id', '=', 'users.role_id')
        ->paginate(5);
        return view('admin.Users.users')->with(compact('users'));
    }  
     //end

        //User
        public function addUsers()
        {    
         $UserRole = UserRole::all();
         return view('admin.Users.add_users')->with(compact('UserRole'));
        }
         //end
     
            //add product
        public function saveUsers(Request $request){

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
     
            User::create([
                 'name'=>$request->name,
                 'email'=>$request->email,
                 'password' => Hash::make($request->password),
                 'role_id'=>$request->role_id,     
             ]);
     
             return redirect("dashboard/users");
        }
         //end
     
     
         //edit
        public function usersEdit($id)
        {
           $users = User::select('users.id as users_id', 'users.*', 'user_roles.*')
           ->leftJoin('user_roles', 'user_roles.id', '=', 'users.role_id')->
           where('users.id', $id)->first();

           $UserRole = UserRole::all();

     
            return view('admin.Users.update_users')->with(compact('users','UserRole'));
        }  
        //end
     
     
     
        //update blog
         public function updateUsers(Request $request){

        $User = User::find($request->up_id);

  

         
         //update users with new image name
         $User->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'role_id'=>$request->role_id,     
         ]);
     
         return redirect("dashboard/users");
     
         }
          //end
     
     
         //delete blog
         public function deleteUsers(Request $request){
     
         $id = $request->user_id;
         $User = User::find($id);

         $User->delete();
     
         return response()->json([
             'status' => 'success',
         ]);
         }
          //end
     
     
         //pagination page
        public function pagination(Request $request){
     
         $users = User::select('users.id as users_id', 'users.*', 'user_roles.*')
         ->leftJoin('user_roles', 'user_roles.id', '=', 'users.role_id')
         ->paginate(5);
         return view('admin.Users.pagination_users',compact('users'))->render();
     
        }
     
         //search product
        public function searchUsers(Request $request){
     
         $users = User::select('users.id as users_id', 'users.*', 'user_roles.*')
         ->leftJoin('user_roles', 'user_roles.id', '=', 'users.role_id')->
         where('users.name', 'like', '%'.$request->search_string.'%')
         ->paginate(5);
     
         if($users->count() >= 1){
             return view('admin.Users.pagination_users',compact('users'))->render();
         }else{
             return response()->json([
                 'status' => 'nothing_found',
     
             ]);
         }
        }
         //end
     

}