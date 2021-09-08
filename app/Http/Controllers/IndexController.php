<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class IndexController extends Controller
{
    public function index()
    {
        // ascending order
        $productsAll=Product::get();
        // product fetch desceindin order
        $productsAll=Product::orderBy('id','DESC')->get();

        // randorm order

        $productsAll=Product::inRandomOrder()->limit(3)->get();
        // $productsAll=Product::inRandomOrder()->paginate(3);
        // $categoryItem=Category::where(['parent_id'=>0])->get();
        // $categoryItem=json_decode(json_encode($categoryItem));
        
        // echo "<pre>";
        // print_r($categoryItem);
        // die;


        //get all categories and sub categories
        $categories=Category::with('categories')->where(['parent_id'=>0])->get();
         $categories=json_decode(json_encode($categories));
        // echo "<pre>";
        // print_r($categories);
        // die;

    //     $categories_menu="";
    //     foreach($categories as $cat)
    //     {
            
    //         $categories_menu.=" <div class='panel-heading'>
    //                         <h4 class='panel-title'>
    //                             <a data-toggle='collapse' data-parent='#".$cat->id."' href='#".$cat->url."'>
    //                                 <span class='badge pull-right'><i class='fa fa-plus'></i></span>
    //                                 ".$cat->name."
    //                             </a>
    //                         </h4>
    //                     </div>
    //                     <div id='".$cat->."' class='panel-collapse collapse'>
    //                     <div class='panel-body'>
    //                         <ul>";
    //                 $sub_categories=Category::where(['parent_id'=>$cat->id])->get();
    //                 foreach($sub_categories as $subcat)
    //                 {
    //                     $categories_menu.="<li><a href='#'>".$subcat->name." </a></li>";
            
    //                 }
                               
    //                             $categories_menu.="</ul>
    //                     </div>
    //                 </div>
    //                     ";

    //  }
        $meta_title="E-shop Sample website";
        $meta_description="Online Shopping Site for men,Women and kids clothing";
        $meta_keyword="eshop website,online shopping,men clothing";


       return view('index')->with(compact('productsAll','categories','meta_title','meta_description','meta_keyword'));
    }
    public function products($url =null)
    {
        //
    }
}
