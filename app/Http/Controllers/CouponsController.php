<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coupon;
class CouponsController extends Controller
{
    public function addcoupon(Request $request){
        if($request->isMethod('post')){

            
            $data=$request->all();
            if(empty($data['status'])){
                $status=0;
            }
            else{
                $status=1;
            }
            $coupon=new coupon;
            $coupon->coupon_code=$data['coupon_code'];
            $coupon->amount=$data['amount'];
            $coupon->amount_type=$data['amount_type'];
            $coupon->expiry_date=$data['expiry_date'];
            $coupon->status=$status;
            $coupon->save();
        }
        return view('admin.coupon.add_coupon');
    }
    public function viewcoupon(){
        $coupon=coupon::get();

        return view('admin.coupon.view_coupon')->with(compact('coupon'));




    }
     public function editcoupon(Request $request, $id =null){
         $coupondata=coupon::where('id',$id)->first();
        if($request->isMethod('post')){
            $data=$request->all();
            if(empty($data['status'])){
                $status=0;
            }    
            else{
                $status=1;
            }
            coupon::where(['id'=>$id])->update(['coupon_code'=>$data['coupon_code'],
            'amount'=>$data['amount'],'amount_type'=>$data['amount_type'],'expiry_date'=>$data['expiry_date']
            ,'status'=>$status]);

        return redirect('/admin/view-coupon')->with('flash_message_success','coupon update successfully');
        }
         
        return view('admin.coupon.edit_coupon')->with(compact('coupondata'));

     }
}
