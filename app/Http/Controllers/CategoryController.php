<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data=$request->all();
            if(empty($data['status'])){
               echo  $status=0;
            }
            else{
               echo  $status=1;
            }
            
            $category=new Category;
            $category->name=$data['category_name'];
            $category->parent_id=$data['parent_id'];
            $category->description=$data['description'];
            $category->url=$data['url'];
            $category->status=$status;
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','add category successfully');
        }
        $levels=Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels'));

    }
    public function viewCategories()
    {

        $categories=Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
    public function editCategory(Request $request,$id=null)
    {
            if($request->isMethod('post')){
                $data=$request->all();
                if(empty($data['status'])){
                 $status=0;
                 }
                 else{
                 $status=1;
                 }
                 
                Category::where(['id'=>$id])->update(['url'=>$data['url'],'name'=>$data['category_name'],'description'=>$data['description'],'status'=>$status,'parent_id'=>$data['parent_id']]);
                return redirect('/admin/view-categories')->with('flash_message_success','category update successfully');
                
            }
        $categoryDetails=Category::where(['id'=>$id])->first();
        $levels=Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_categories')->with(compact('categoryDetails','levels'));
    }
    public function deleteCategory($id=null)
    {
        if(!empty($id))
        {
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','category deleted successfully');
        }

    }
}
