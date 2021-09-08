<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cmspage;
use App\Category;
use Illuminate\Support\Facades\Mail;

class cmscontroller extends Controller
{
    public function addcmspage(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
                $cmspage=new cmspage;
                if(empty($data['meta_description'])){
                    $meta_description="";
                }
                if(empty($data['meta_title'])){
                    $meta_title="";
                }
                if(empty($data['meta_keyword'])){
                    $meta_keyword="";
                }
                $cmspage->title=$data['title'];
                $cmspage->description=$data['description'];
                $cmspage->url=$data['url'];
                $cmspage->meta_title=$data['meta_title'];
                $cmspage->meta_description=$data['meta_description'];
                $cmspage->meta_keyword=$data['meta_keyword'];
                if(empty($data['status'])){
                    $status=0;
                }
                else{
                    $status=1;
                }
                $cmspage->status=$status;
                $cmspage->save();
                return redirect()->back()->with('flash_message_success','cms page has been added successfylly');
        }

        return view('admin.pages.add_cms_page');
    }
    public function viewcmspage(){

        $cmspages=cmspage::get();
        return view('admin.pages.view_cms_page')->with(compact('cmspages'));
    }
    public function editcmspage(Request $request,$id){
        if($request->isMethod('post')){
                $data=$request->all();

                if(empty($data['meta_description'])){
                    $meta_description="";
                }
                if(empty($data['meta_title'])){
                    $meta_title="";
                }
                if(empty($data['meta_keyword'])){
                    $meta_keyword="";
                }
                if(!empty($data['status'])){
                    $status=1;
                }
                else{
                    $status=0;
                }
                cmspage::where('id',$id)->update(['title'=>$data['title'],'url'=>$data['url'],'description'=>$data['description'],'status'=>$status
                ,'meta_title'=>$data['meta_title'],'meta_description'=>$data['meta_description'],'meta_keyword'=>$data['meta_keyword']]);

                return redirect()->back()->with('flash_message_success','your cms page update successfully');
        }

        $cmspage=cmspage::where('id',$id)->first();
        $cmspage=json_decode(json_encode($cmspage));
        // echo "<pre>";
        // print_r($cmspage);
        // die;

        return view('admin.pages.edit_cms_page')->with(compact('cmspage'));

    }
    public function deletecmspage($id){
        cmspage::where('id',$id)->delete();
        return redirect('/admin/view-cms-page')->with('flash_message_success','product delete successfully');
    }

    public function cmspage($url){
        $cmspagecount=cmspage::where(['url'=>$url,'status'=>1])->count();
        if($cmspagecount>0){
            $cmspagedetails=cmspage::where('url',$url)->first();
            $meta_title=$cmspagedetails->meta_title;
            $meta_description=$cmspagedetails->meta_description;
            $meta_keyword=$cmspagedetails->meta_keyword;
        }
        else{
            abort(404);
        }
        

        $categories=Category::with('categories')->where(['parent_id'=>0])->get();
         $categories=json_decode(json_encode($categories));
        return view('admin.pages.cms_page')->with(compact('cmspagedetails','categories','meta_title','meta_description','meta_keyword'));
    }
    public function contact(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $email="himanshupundhir1234@gmail.com";
            $messagedata=[
                'name'=>$data['name'],
                'email'=>$data['email'],
                'subject'=>$data['subject'],
                'comment'=>$data['message']
            ];
            Mail::send('email.enquiry',$messagedata,function($message)use($email){
                $message->to($email)->subject('Enquiry from e commerce website');
            });
            return redirect()->back()->with('flash_message_success','Thanks for enqueiry');
        }

        $categories=Category::with('categories')->where(['parent_id'=>0])->get();
        $categories=json_decode(json_encode($categories));

        $meta_title=" contact Us - E-shop Sample website";
        $meta_description=" Contact us for any queries related to our products";
        $meta_keyword="contact us ,queries";

       return view('admin.pages.contact')->with(compact('categories','meta_title','meta_description','meta_keyword'));

    }
}
