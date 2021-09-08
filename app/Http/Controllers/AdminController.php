<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data=$request->input();
            echo $adminCount=Admin::where(['username'=>$data['username'],'password'=>($data['password']),'status'=>1])->count();
            if($adminCount>0){
                Session::put('adminSession',$data['username']);
                return redirect('/admin/dashboard');
               
            }
            else{
                
                return redirect('/admin')->with('flash_message_error','invalid username or password');
            }
        
        }
         return view('admin.admin_login');
    }

    public function dashboard(){
        // if(Session::has('adminSession'))
        // {

        // }
        // else
        // {
        //     return redirect('/admin')->with('flash_message_login','please login the page');
        // }
        return view('admin.dashboard');
    }
    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success','logout successfully');
    }

    public function setting()
    {
        return view('admin.setting');
    }
    public function chkPassword(Request $request)
    {
        $data=$request->all();
        $current_password=$data['current_pwd'];
        $check_password=User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true";die;            
        }else{
        echo "false";die;
        }

    }

    public function updatePassword(Request $request){
                if($request->isMethod('post')){
                    $data=$request->all();
                    // echo "<pre>";print_r($data);die;
                    $check_password=User::where(['email'=>Auth::user()->email])->first();
                    $current_password=$data['current_pwd'];
                    if(Hash::check($current_password,$check_password->password)){
                        $password=bcrypt($data['new_pwd']);
                        User::where('id',1)->update(['password'=>$password]);
                        return redirect('/admin/setting')->with('flash_message_success','password update successfully');
                    }
                    else
                    {
                        return redirect('/admin/setting')->with('flash_message_error','current password is not write');
                    }

                }
          }
   
}
