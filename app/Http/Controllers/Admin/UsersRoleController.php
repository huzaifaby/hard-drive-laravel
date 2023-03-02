<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\PrivacyPolicy;
use App\Models\TermsandCondition;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UsersRoleController extends Controller
{
    //index
    public function index()
    {
        $userrole = UserRole::paginate(5);
        return view('admin.UsersRole.usersrole')->with(compact('userrole'));
    }  
     //end

        //blogs
        public function addUsersRole()
        {    
         return view('admin.UsersRole.add_users_role');
        }
         //end
     
            //add product
        public function saveUsersRole(Request $request){
     
            UserRole::create([
                 'user_role'=>$request->user_role,  
             ]);
     
             return redirect("dashboard/users-role");
        }
         //end
     
     
         //edit
        public function usersroleEdit($id)
        {
           $usersroles = UserRole::where('id', $id)->first();
     
            return view('admin.UsersRole.update_users_role')->with(compact('usersroles'));
        }  
        //end
     
     
     
        //update blog
         public function updateUsersRole(Request $request){

        $usersroles = UserRole::find($request->up_id);

         $usersroles->update([
            'user_role'=>$request->user_role,  
         ]);
     
         return redirect("dashboard/users-role");
     
         }
          //end
     
     
         //delete blog
         public function deleteUsersRole(Request $request){
     
         $id = $request->role_id;
         $usersroles = UserRole::find($id);

         $usersroles->delete();
     
         return response()->json([
             'status' => 'success',
         ]);
         }
          //end

     

}