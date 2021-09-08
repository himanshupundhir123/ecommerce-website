<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner;
use Image;

class Bannercontroller extends Controller
{
    public function addbanner(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
        $banner =new banner;
        $banner->title=$data['title'];
        $banner->link=$data['link'];
        if(empty($data['status'])){
            $status=0;
        }
        else{
            $status=1;
        }
        $banner->status=$status;
        if($request->hasFile('image')){
            $image_tmp = $request->image;
               if($image_tmp->isValid()){
                   $extension=$image_tmp->getClientOriginalExtension();
                   $filename= rand(111,99999).'.'.$extension;
                   $large_image_path='public/images/frontend_images/banners/'.$filename;
                   Image::make($image_tmp)->resize(1141,339)->save($large_image_path);
                
                   $banner->image=$filename;

               }}
            $banner->save();

            return redirect('/admin/add-banner')->with('flash_message_success','add banner successfully');

              }



        return view('admin.banner.add_banner');
    }
    public function viewbanner(){
        $banners=banner::get();
        return view('admin/banner.view_banner')->with(compact('banners'));

    }
    public function editbanner(Request $request, $id=null){
        if($request->isMethod('post'))
        {
            $data=$request->all();
                // for image upload code
            if($request->hasFile('image')){
                $image_tmp = $request->image;
                   if($image_tmp->isValid()){
                       $extension=$image_tmp->getClientOriginalExtension();
                       $filename= rand(111,99999).'.'.$extension;
                       $large_image_path='public/images/frontend_images/banners/'.$filename;
                    Image::make($image_tmp)->resize(1141,339)->save($large_image_path);
                    
   
                   }}else{
                       $filename=$data['current_image'];
                   }
            if(empty($data['status'])){
                $status=0;
            }
            else{
                $status=1;
            }
            banner::where(['id'=>$id])->update(['title'=>$data['title'],'link'=>$data['link'],
            'status'=>$status,'image'=>$filename]);
            return redirect('/admin/view-banner')->with('flash_message_success','banner update successfully');

        }

        $editbanners=banner::where(['id'=>$id])->first();
        return view('admin/banner.edit_banner')->with(compact('editbanners'));

    }
}
