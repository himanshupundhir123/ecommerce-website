<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Session;
use App\country;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
        $data=$request->all();
        $usercount=User::where('email',$data['email'])->count();
        if($usercount>0){
            return redirect()->back()->with('flash_message_error','user aleready exists');
        }
        else{
            $users=new User;
            
            $users->name=$data['name'];
            $users->email=$data['email'];
            $users->password=Hash::make($data['password']);
            $users->save();

            // $email=$data['email'];
            // $messageData=['email'=>$data['email'],'name'=>$data['name']];
            // Mail::send('email.register',$messageData,function($message) use($email){
            //     $message->to($email)->subject('Registration with e-com Website');
            // });

             $email=$data['email'];
             $messageData=['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($data['email'])];
             // Mail::send('email.confirmation',$messageData,function($message) use($email)
             // {
             //     $message->to($email)->subject('Confirm your E-com Account');
             // });
            

             return redirect()->back()->with('flash_message_success','your account is activate');
        }
        
        }
        


        return view('users.login_register');
    }

    public function checkemail(Request $request){

            $data=$request->all();

        $usercount=User::where('email',$data['email'])->count();
        if($usercount>0){
        echo "false";
        }
        else{
            echo "true";
        }

    }
    public function userlogin(Request $request){
        if($request->IsMethod('post')){

        
        $data=$request->all();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            Session::put('frontsession',$data['email']);
            return redirect('cart');
        }
        else{
           return  redirect()->back()->with('flash_message_error','invalid user name');
        }
    
 
    }

}
public function account(Request $request){
        $email=Session::get('frontsession');
        $user_details=User::where('email',$email)->first();
    if($request->isMethod('post')){
         $data=$request->all();
        $user=User::find($data['id']);
        $user->name=$data['name'];
        $user->address=$data['address'];
        $user->city=$data['city'];
        $user->state=$data['state'];
        $user->country=$data['country'];
        $user->pincode=$data['pincode'];
        $user->mobile=$data['mobile'];
        $user->save();
        return redirect()->back()->with('flash_message_success','your acccount details has been filled successfully');

    }
    
     $country=country::get();
    return view('users.account')->with(compact('country','user_details'));
}



// this code is used for chk password
    public function checkpwd(Request $request){
        $data=$request->all();
         $email=Session::get('frontsession');
        $current_password=$data['current_pwd'];
        $check_password=User::where('email',$email)->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true";        
        }else{
        echo "false";
        }

    }




public function logout(){

    Auth::logout();
    Session::forget('frontsession');
    Session::forget('session_id');
    return redirect('/');
}


public function updatepwd(Request $request){

    if($request->isMethod('post')){
        $data=$request->all();
        $email=Session::get('frontsession');
        // echo "<pre>";print_r($data);die;
        $check_password=User::where('email', $email)->first();
        $current_password=$data['current_pwd'];

        if(Hash::check($current_password,$check_password->password)){
            $password=bcrypt($data['new_pwd']);
            User::where('email',$email)->update(['password'=>$password]);
            return redirect()->back()->with('flash_message_success','password update successfully');
        }
        else
        {
            return redirect()->back()->with('flash_message_error','current password is not write');
        }

    }
}





public function forgetpassword(Request $request){
    if($request->isMethod('post')){
        $data=$request->all();
        // echo "<pre>";
        // print_r($data);
        // die;
        $userCount=User::where('email',$data['email'])->count();
        if($userCount==0){
            return redirect()->back()->with('flash_message_error','Email does not exists');
        }
        // Get User Details
        $userDetails=User::where('email',$data['email'])->first();
         $random_password=str::random(8);
        $new_password=bcrypt($random_password);
        // update password
        User::where('email',$data['email'])->update(['password'=>$new_password]);

        // send password code Email code
        $email=$data['email'];
        $name=$userDetails->name;
        $messageData=[
            'email'=>$email,
            'name'=>$name,
            'password'=> $random_password
        ];
        Mail::send('email.forgetpassword',$messageData,function($message)use($email){
            $message->to($email)->subject('New password-ecommerce password');

        });

        return redirect('login-register')->with('flash_message_success','please check your email for new password' );
        
    }
    return view('users.forget_password');
}







}


