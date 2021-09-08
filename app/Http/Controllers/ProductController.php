<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


use Illuminate\Support\Str;


use Auth;
use Image;
use Session;
use String\str_random;
use App\Category;
use App\Product;
use File;
use App\Productsattribute;
use App\product_image;
use DB;
use App\cart;
use App\coupon;
use App\country;
use App\User;
use App\delivery_address;
use App\Order;
use App\OrdersProduct;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function addProduct(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // echo "</pre>";print_r($data);die;
            $product=new Product;
            if(empty($data['category_id']))
            {
                return redirect()->back()->with('flash_message_error','under category is missing');
                
            }
            $product->category_id=$data['category_id'];
            $product->product_name=$data['product_name'];
            $product->product_code=$data['product_code'];
            $product->product_color=$data['product_color'];
            if(!empty($data['description']))
            {
                $product->description=$data['description'];
            }
            else{
                $product->description='';
            }
            if(!empty($data['care']))
            {
                $product->care=$data['care'];
            }
            else{
                $product->care='';
            }
            $product->price=$data['price'];
            if($request->hasFile('image')){
             $image_tmp = $request->image;
                if($image_tmp->isValid()){
                    $extension=$image_tmp->getClientOriginalExtension();
                    $filename= rand(111,99999).'.'.$extension;
                    $large_image_path='public/images/backend_images/products/large/'.$filename;
                    $small_image_path='public/images/backend_images/products/small/'.$filename;
                    $medium_image_path='public/images/backend_images/products/medium/'.$filename;
                 Image::make($image_tmp)->resize(1200,1200)->save($large_image_path);
                 Image::make($image_tmp)->resize(50,50)->save($small_image_path);
                 Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    $product->image=$filename;

                }}
            $product->save();
            return redirect()->back()->with('flash_message_success','product has been updated successfully');
            }
            // categories dropdawn code
            $categories=Category::where(['parent_id'=>0])->get();
            $categories_dropdawn="<option selected disabled>select</option>";
            foreach($categories as $cat){
            
                $categories_dropdawn.="<option value='".$cat->id."'>".$cat->name."</option>";
            
                $sub_categories=Category::where(['parent_id'=>$cat->id])->get();
                foreach($sub_categories as $sub_cat)
                {
                    $categories_dropdawn.="<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
                }
            }
                    // categories dropdawn code

        //  $categories1=json_decode(json_encode($categories));
        //  echo "</pre>";print_r($categories1);die;

            return view('admin.products.add-products')->with(compact('categories_dropdawn'));

    }
    
    public function viewProduct(Request $request)
    {
        $products=Product::get();
        foreach($products as $key=>$val){
            $category_name=Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name=$category_name['name'];
        }
        // $kk=json_encode(json_decode($products));
        // echo "</pre>";print_r($kk);die;
        return view('admin.products.view_products')->with(compact('products'));
    }
    public function editProduct(Request $request,$id=null)
    {

        if($request->isMethod('post'))
        {
            $data=$request->all();
                // for image upload code
            if($request->hasFile('image')){
                $image_tmp = $request->image;
                   if($image_tmp->isValid()){
                       $extension=$image_tmp->getClientOriginalExtension();
                       $filename= rand(111,99999).'.'.$extension;
                       $large_image_path='public/images/backend_images/products/large/'.$filename;
                       $small_image_path='public/images/backend_images/products/small/'.$filename;
                       $medium_image_path='public/images/backend_images/products/medium/'.$filename;
                    Image::make($image_tmp)->resize(1200,1200)->save($large_image_path);
                    Image::make($image_tmp)->resize(50,50)->save($small_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
   
                   }}else{
                       $filename=$data['current_image'];
                   }
                   
                   if(empty($data['description'])){
                       $data['description']='';
                   }
                   if(empty($data['care'])){
                    $data['care']='';
                }



            Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],
            'description'=>$data['description'],'care'=>$data['care'],'product_color'=>$data['product_color'],
            'product_code'=>$data['product_code'],'price'=>$data['price'],'image'=>$filename]);
            return redirect('/admin/view-product')->with('flash_message_success','category update successfully');

        }
            //categories dropdawn code
            $productDetails=Product::where(['id'=>$id])->first();
             $categories=Category::where(['parent_id'=>0])->get();
            $categories_dropdawn="<option selected disabled>select</option>";
            foreach($categories as $cat){
            if($cat->id==$productDetails->category_id){
                $selected="selected";
            }
            else{
                $selected="";
            }
        
            $categories_dropdawn.="<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
        
            $sub_categories=Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat)
            {
                if($sub_cat->id==$productDetails->category_id){
                    $selected="selected";
                }
                else{
                    $selected="";
                }
                $categories_dropdawn.="<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        // categories dropdawn code
       

        return view('admin.products.edit_products')->with(compact('productDetails','categories_dropdawn'));

    }
    public function deleteProduct($id=null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','product has been deletet successfully');
    }

    public function deleteProductImage($id=null){

            $deleteImage=Product::where(['id'=>$id])->first();
           
           
            $large_image_path='public/images/backend_images/products/large/';
            $small_image_path='public/images/backend_images/products/small/';
            $medium_image_path='public/images/backend_images/products/medium/';
            if(file_exists($large_image_path.$deleteImage->image)){
               $a=  unlink($large_image_path.$deleteImage->image);
               
            
            }

            if(file_exists($small_image_path.$deleteImage->image)){
                unlink($small_image_path.$deleteImage->image);
            }
            if(file_exists($medium_image_path.$deleteImage->image)){
                unlink($medium_image_path.$deleteImage->image);
            }
         Product::where(['id'=>$id])->update(['image'=>'']);
         return redirect()->back()->with('flash_message_success','Product message has been delete successfully');
    
    }

    public function addAttributes(Request $request,$id=null){
        $productDetails=Product::with('attributes')->where(['id'=>$id])->first();
        // foreach($productDetails['attributes'] as $attribute)
        // {
        //    echo  $attribute->sku;
        //    die;
        // }
                if($request->isMethod('post')){
            $data=$request->all();
            foreach($data['sku'] as $key=>$val)
            {
                if(!empty($val)){

                    
                    $attrcountsku=Productsattribute::where('sku',$val)->count();
                    if($attrcountsku>0){
                        return redirect('admin/add-attribute/'.$id)->with('flash_message_error',' this SKU '.$val.' ALREADY EXISTS');
                    }
                    // $attrcountsize=Productsattribute::where('size',$data['size'][$key])->count();

                    // //check prevent size
                    // if($attrcountsize>0){
                    //     return redirect('admin/add-attribute/'.$id)->with('flash_message_error',''.$data['size'][$key].'  size ALREADY EXISTS');
                    // }
                    $attribute=new Productsattribute;
                    $attribute->product_id=$id;
                    $attribute->sku=$val;
                    $attribute->size=$data['size'][$key];
                    $attribute->price=$data['price'][$key];
                    $attribute->stock=$data['stock'][$key];
                    $attribute->save();



                }

                
            }
            return redirect('admin/add-attribute/'.$id)->with('flash_message_success','product attribute has been insert successfully');
        }

        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }


    public function editAttributes(Request $request,$id=null){
        if($request->isMethod('post'))
        {
        $data=$request->all();
        foreach($data['idAttr'] as $key=>$attr){
           

             Productsattribute::where('id',$data['idAttr'][$key])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);



        }
    
        return redirect()->back()->with("flash_message_success","attributes update successfully");
        }
    }
    public function addImages(Request $request,$id=null){
        $productDetails=Product::with('attributes')->where(['id'=>$id])->first();
        // foreach($productDetails['attributes'] as $attribute)
        // {
        //    echo  $attribute->sku;
        //    die;
        // }
                if($request->isMethod('post')){
                    
                    if($request->hasFile('image')){
                        $files = $request->image;
                        foreach($files as $image_tmp)
                        {
                         $image=new  product_image;
                               $extension=$image_tmp->getClientOriginalExtension();
                               $filename= rand(111,99999).'.'.$extension;
                               $large_image_path='public/images/backend_images/products/large/'.$filename;
                               $small_image_path='public/images/backend_images/products/small/'.$filename;
                               $medium_image_path='public/images/backend_images/products/medium/'.$filename;
                            Image::make($image_tmp)->resize(1200,1200)->save($large_image_path);
                            Image::make($image_tmp)->resize(150,150)->save($small_image_path);
                            Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                               $image->image=$filename;
                               $image->product_id=$id;
                               $image->save();
           
                           }

                        }



           return redirect()->back()->with('flash_message_success','image add successfully');
                         }
                $productsImage=product_image::where('product_id',$id)->get();

        return view('admin.products.add_images')->with(compact('productDetails','productsImage'));
    }

    public function deleteImage($id=null){
        product_image::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','attribute has been deleted successfully');
    }


    public function deleteAttributes($id=null )
    {
        Productsattribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','attribute has been deleted successfully');
    }

    public function products($url=null)
            {
                
                 $countCategory=Category::where(['url'=>$url,'status'=>1])->count();
                     if($countCategory==0){
                        abort(404);
                     }
                
               
            // this code is used for particualr item pr jane ke liye
                $categories=Category::with('categories')->where(['parent_id'=>0])->get();
                $categoryDetails=Category::where(['url'=>$url])->first();

     // this code is used form main category select default itme
                if($categoryDetails->parent_id==0){
                      $subCategories=Category::where(['parent_id'=>$categoryDetails->id])->get();
                        foreach($subCategories as $subcat){
                                   $cat_ids[]=$subcat->id;
                                }
                    
                      // $productsAll=Product::whereIn('category_id',$cat_ids)->get();
                     $productsAll=Product::whereIn('category_id',$cat_ids)->inRandomOrder()->limit(6)->get();
                    
                    }else
                    {
                        // this is code used for products by subcategries
                    $productsAll=Product::where(['category_id'=>$categoryDetails->id])->get();
                    }


                return view('products.listing')->with(compact('productsAll','categoryDetails','categories'));
            }




            
            public function product($id=null)
                {
                    // this url is used for fetch product attributes
                    $productDetails=Product::with('attributes')->where(['id'=>$id])->first();
                    // this is used for fetch categroies and subcategories
                    $categories=Category::with('categories')->where(['parent_id'=>0])->get();
                    // this is used for product_attribute image fetch
                    $imageDetails=product_image::where(['product_id'=>$id])->get();
                    // this url is used for count product stock
                $total_stock=Productsattribute::where(['product_id'=>$id])->sum('stock');
                // this code is used for related items 
                $relatedProducts=Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->orderBy('id','DESC')->limit(9)->get();
                // $relatedProducts=json_decode(json_encode($relatedProducts));
                // echo "<pre>";
                // print_r($relatedProducts);
                // die;
                    // $productDetail=json_decode(json_encode($productDetails));
                    // echo "<pre>";
                    // print_r($productDetail);
                    // die;
                    return view('products.details')->with(compact('productDetails','categories','imageDetails','total_stock','relatedProducts'));
                }
            
                
                public function getproductprice(Request $request){
                $data=$request->all();
                  $proArr=explode("-",$data['idSize']);
                $proAttr= Productsattribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
                echo $proAttr->price;
                echo "#";
                echo $proAttr->stock;
        
                        
                }

        public function productss($url =null){

            $categoryDetails=Category::where(['url'=>$url])->first();

     // this code is used form main category select default itme
                if($categoryDetails->parent_id==0){
                      $subCategories=Category::where(['parent_id'=>$categoryDetails->id])->get();
                        foreach($subCategories as $subcat){
                                   $cat_ids[]=$subcat->id;
                                }
                    
                      // $productsAll=Product::whereIn('category_id',$cat_ids)->get();
                     $productsAll=Product::whereIn('category_id',$cat_ids)->get();
                    //  echo $productsAll->product_name;
                     $productsAll=json_decode(json_encode( $productsAll));
                     echo "<pre>";
                     print_r($productsAll);
                    
                    }
                        }




            public function addcart(Request $request){

                Session::forget('couponamount');
            Session::forget('couponcode');
                $data=$request->all();
                // if(empty($data['session_id'])){
                //     $data['session_id']='';
                // }
                if(empty($data['user_email'])){
                    $data['user_email']='';
                }

                $session_id=Session::get('session_id');
                if(empty($session_id)){
                    $session_id = Str::random(40);
                    Session::put('session_id',$session_id);
                }
            
                
                $prosize=explode("-",$data['size']);
                $countProducts=DB::table('carts')->where(['product_id'=>$data['product_id'],
                'product_color'=>$data['product_color'],'size'=>$prosize[1],'session_id'=>$session_id])->count();
                if($countProducts>0){
                    return redirect()->back()->with('flash_message_error','product already  exist in cart');
                }
                else{
                   $getSKU= Productsattribute::select('sku')->where(['product_id'=>$data['product_id'],'size'=>$prosize[1]])->first();
                
                
                    DB::table('carts')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],
            'product_color'=>$data['product_color'],'product_code'=> $getSKU->sku,
            'price'=>$data['price'],'size'=>$prosize[1],'quantity'=>$data['quantity'],'user_email'=>$data['user_email'],'session_id'=>$session_id]);

                }

                       return redirect('cart')->with('flash_message_suceess','product has been added in cart');
        }



        
         public function cart(){
            
            
                $session_id=Session::get('session_id');
                $userCart=DB::table('carts')->where(['session_id'=>$session_id])->get();    
              
             foreach($userCart as $key=>$product){
                 $productDetails=Product::where('id',$product->product_id)->first();
                 $userCart[$key]->image=$productDetails->image;
             }
            return view('products.cart')->with(compact('userCart'));


         }

        public function deletecartproduct($id=null){
            Session::forget('couponamount');
            Session::forget('couponcode');
            DB::table('carts')->where('id',$id)->delete();
            return redirect('cart');
        


        }

        public function upadatecartquantity($id=null,$quantity=null){
            Session::forget('couponamount');
            Session::forget('couponcode');
            $getcartdetails=DB::table('carts')->where('id',$id)->first();
            $getattributestock=Productsattribute::where('sku',$getcartdetails->product_code)->first();
            $updatequantity= $getcartdetails->quantity+$quantity;
            echo $getattributestock->stock;
            if($getattributestock->stock>=$updatequantity){

           DB::table('carts')->where('id',$id)->increment('quantity',$quantity);
            return redirect('cart')->with('flash_message_success','product quantity update successfully');
            }
            else
            {
                
                return redirect('cart')->with('flash_message_error',' required product quantity is not avilable');
            }

        }


        public function applycoupon(Request $request){
            Session::forget('couponamount');
            Session::forget('couponcode');
            $data=$request->all();
            $couponcount=coupon::where('coupon_code',$data['coupon_code'])->count();
            if($couponcount==0){
                return redirect()->back()->with('flash_message_error','Coupon is not valid');
            }
            else{

            $coupondetails=coupon::where('coupon_code',$data['coupon_code'])->first();
                if($coupondetails->status==0){
                return redirect()->back()->with('flash_message_error','Coupon is  not active');
                }

                 $expiry_date=$coupondetails->expiry_date;
                
                 $current_date=date('Y-m-d');
                if($expiry_date<$current_date){

                    return redirect()->back()->with('flash_message_error','coupon already expired');
                }
                $session_id=Session::get('session_id');
                $usercart=DB::table('carts')->where(['session_id'=>$session_id])->get();
                $total_amount=0;
                foreach($usercart as $item){
                    $total_amount=$total_amount+($item->price *$item->quantity);
                }

                if($coupondetails->amount_type=="fixed"){
                    $couponamount=$coupondetails->amount;

                }else
                {
                    $couponamount=$total_amount*($coupondetails->amount/100);
                }
                Session::put('couponamount',$couponamount);
                Session::put('couponcode',$data['coupon_code']);
                return redirect()->back()->with('flash_message_success','you have get coupon');
        
            }
        }




        public function checkout(Request $request){
            $user_id=Auth::user()->id;
            $user_email=Auth::user()->email;
            $userDetails=user::find($user_id);
            $country=country::get();
            $shippingcount=delivery_address::where('user_id',$user_id)->count();
            if($shippingcount>0){

                $shippingDetails=delivery_address::where('user_id',$user_id)->first();
            }
            // this code is used for input email in user table
            $session_id=Session::get('session_id');
            DB::table('carts')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);

            if(empty($shippingDetails)){
                $shippingDetails='';
            }

            if($request->isMethod('post')){
                $data=$request->all();
                if(empty($data['billing_name'])||empty($data['billing_address']) ||empty($data['billing_city'])
                ||empty($data['billing_state'])||empty($data['billing_country'])||empty($data['billing_pincode'])||empty($data['billing_mobile'])||
                empty($data['shipping_name'])||empty($data['shipping_address'])||empty($data['shipping_city'])||empty($data['shipping_state'])
                ||empty($data['shipping_country'])||empty($data['shipping_pincode'])||empty($data['shipping_mobile'])){
                    return redirect()->back()->with('flash_message_error','details is not complete');
                }
               user::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],
               'city'=>$data['billing_city'],'state'=>$data['billing_state'],'country'=>$data['billing_country'],'pincode'=>$data['billing_pincode'],'mobile'=>$data['billing_mobile']]);
            if($shippingcount>0){
                delivery_address::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],
                'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],'pincode'=>$data['shipping_pincode'],'mobile'=>$data['shipping_mobile']]);
                    }
            else{

                $shipping=new delivery_address;
                $shipping->user_id=$user_id;
                $shipping->user_email=$user_email;
                $shipping->name=$data['shipping_name'];
                $shipping->address=$data['shipping_address'];
                $shipping->city=$data['shipping_city'];
                $shipping->state=$data['shipping_state'];
                $shipping->country=$data['shipping_country'];
                $shipping->pincode=$data['shipping_pincode'];
                $shipping->mobile=$data['shipping_mobile'];
                $shipping->save();
            }
        return redirect('/order-review');
            }
            
            return view('products.checkout')->with(compact('userDetails','country','shippingDetails'));

        }
        public function orderReview(){
            $user_id=Auth::user()->id;
            $user_email=Auth::user()->email;
            $userDetails=User::where('id',$user_id)->first();
            $shippingDetails=delivery_address::where('user_id',$user_id)->first();
            $userDetails=json_decode(json_encode($userDetails));
            $shippingDetails=json_decode(json_encode($shippingDetails));
            echo $userDetails->country;
            $userCart=DB::table('carts')->where(['user_email'=>$user_email])->get();
            foreach($userCart as $key=>$product){
                $productDetails=Product::where('id',$product->product_id)->first();
                $userCart[$key]->image=$productDetails->image;
            }
           
            return view('products.order_review')->with(compact('userDetails','shippingDetails','userCart'));
        }


         public function placeorder(Request $request){
             if($request->isMethod('post')){
                 $data=$request->all();
                 $user_id=Auth::user()->id;
                 $user_email=Auth::user()->email;
                 $shippingDetails=delivery_address::where(['user_email'=>$user_email])->first();
                 if(empty($data['coupon_amount'])){
                    $data['coupon_amount']=0;
                }
                 if(empty($data['coupon_code'])){
                     $data['coupon_code']=" ";
                 }
                
                $order=new Order;
                $order->user_id=$user_id;
                $order->user_email=$user_email;
                $order->name=$shippingDetails->name;
                $order->address=$shippingDetails->address;
                $order->city=$shippingDetails->city;
                $order->state=$shippingDetails->state;
                $order->coupon_amount=$data['coupon_amount'];
                $order->country=$shippingDetails->country;
                $order->mobile=$shippingDetails->mobile;
                $order->pincode=$shippingDetails->pincode;
                
                $order->coupon_code=$data['coupon_code'];
                
                $order->order_status="new";
                
                $order->payment_method=$data['payment_method'];
                $order->grand_total=$data['grand_total'];
                $order->save();
                 $order_id=DB::getPdo()->lastInsertId();
                $cartProducts=DB::table('carts')->where(['user_email'=>$user_email])->get();
                foreach($cartProducts as $pro){
                    $cartPro=new OrdersProduct;
                    $cartPro->order_id=$order_id;
                    $cartPro->user_id=$user_id;
                    $cartPro->product_id=$pro->product_id;
                    $cartPro->product_code=$pro->product_code;
                    $cartPro->product_name=$pro->product_name;
                    $cartPro->product_color=$pro->product_color;
                    $cartPro->product_size=$pro->size;
                    $cartPro->product_price=$pro->price;
                    $cartPro->product_qty=$pro->quantity;
                    $cartPro->save();

                }
                Session::put('order_id',$order_id);
                Session::put('grand_total',$data['grand_total']);
                if($data['payment_method']=="cod")
                {

                    $productDetails=Order::with('orders')->where('id',$order_id)->first();
                    $productDetails=json_decode(json_encode($productDetails));
                      
                        

                    $userDetails= User::where('id',$user_id)->first();
                    $userDetails=json_decode(json_encode($userDetails));
                   
                    $image = env('APP_URL')."/images/frontend_images/home/himanshu2.jpg";
                     // code for order email start
                        $email=$user_email;
                        $messageData=[
                            'email'=>$email,
                            'name'=>$shippingDetails->name,
                            'image'=>$image,
                            'order_id'=>$order_id,
                            'productDetails'=>$productDetails,
                            'userDetails'=>$userDetails


                        ];
                        // Mail::send('email.order',$messageData,function($message) use ($email){
                        // $message->to($email)->subject('order placed-ecommerce website');
                        // });

                         // code for order email ends
                return redirect('/thanks');
                }
                else{
                    return redirect('/paypal');
                }
            }




         }      

         public function thanks(){
             $user_email=Auth::user()->email;
             DB::table('carts')->where('user_email',$user_email)->delete();
             return view('products.thanks');
         }
         public function userorders(){
             $user_id=Auth::user()->id;
             $orders=Order::with('orders')->where('user_id',$user_id)->get();
             $orders=json_decode(json_encode($orders));
            //  echo "<pre>";
            //  print_r($orders);
            //  die;
                return view('products.user_orders')->with(compact('orders'));

         }

         public function userordersdetails($order_id){
            $user_id=Auth::user()->id;
            $ordersDetails=Order::with('orders')->where('id',$order_id)->first();
            // $orders=json_decode(json_encode($orders));
             return view('products.user_order_details')->with(compact('ordersDetails'));

         }
         public function paypal(){
             return view('orders.paypal');
         }

         public function vieworders(){
             $orders=Order::with('orders')->orderBy('id','desc')->get();
             $orders=json_decode(json_encode($orders));
            //  echo "<pre>";
            //  print_r($orders);
            //  die;
            return view('admin.orders.view_orders')->with(compact('orders'));
             }
             public function vieworderdetails($order_id){
                 $orderDetails=Order::with('orders')->where('id',$order_id)->first();
                 $orderDetails=json_decode(json_encode($orderDetails));
                 $user_id=$orderDetails->user_id;
                 $userDetails=User::where('id',$user_id)->first();
                //  echo "<pre>";
                //  print_r($orderDetails);
                //  die;
                return view('admin.orders.order_details')->with(compact('orderDetails','userDetails'));



             }
             public function vieworderinvoice($order_id){
                $orderDetails=Order::with('orders')->where('id',$order_id)->first();
                $orderDetails=json_decode(json_encode($orderDetails));
                $user_id=$orderDetails->user_id;
                $userDetails=User::where('id',$user_id)->first();
                // echo "<pre>";
                // print_r($orderDetails);
                // die;
               return view('admin.orders.invoice_details')->with(compact('orderDetails','userDetails'));



            }
             public function updateorderstatus(Request $request){
                 if($request->isMethod('post')){
                     $data=$request->all();
                    Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
                    return redirect()->back()->with('flash_message_success','order status update has been successfully');
                 }



             }


             public function searchproducts(Request $request){
                if($request->isMethod('post')){

                    $data=$request->all();
                    $categories=Category::with('categories')->where(['parent_id'=>0])->get();
                    $search_product=$data['product'];
                    $productsAll=Product::where('product_name','like','%'.$search_product.'%')->orwhere('product_code',$search_product)->get();
                    return view('products.listing')->with(compact('productsAll','search_product','categories'));
                }




             }



        }


