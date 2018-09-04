<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Model\Product;
use Mail;
class CartController extends Controller
{
    public function getAddCart($prod_id){
        
        $product = Product::find($prod_id);
        Cart::add([
            ['id' => $prod_id,
             'name' => $product->prod_name, 
             'qty' => 1, 
             'price' => $product->prod_price, 
             'options' => ['img' => $product->prod_img]]
          ]);
          return redirect('cart/show');
          
    }
    public function getShowCart(){
        $data['total'] = Cart::total();
        $data['item'] = Cart::content();
        return view('frontend.cart',$data);
    }
    public function getDeleteCart($prod_id){
        if($prod_id=='all'){
            Cart::destroy();
        }else{
            Cart::remove($prod_id);
        }
        return back();
    }
    public function getUpdateCart(Request $request){
        Cart::update(
                        $request->rowId,
                        $request->qty
                    );
    }
    public function postComplete(Request $request)
    {
        $data['info'] = $request->all();
        $email = $request->email;//khởi tạo biết email để lấy về mail mà khách đã nhập vào ô input
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        
        Mail::send('frontend.email', $data, function ($message) use($email) {
            $message->from('shophoastore@gmail.com', 'Admin Nghĩa');
            
            $message->to($email, $email);
            $message->cc('shophoastore@gmail.com', 'Trung Nghĩa');
            
            $message->subject('Xác nhận hóa đơn mua hàng');
          
        });
        Cart::destroy();
       return redirect('complete');
    }
    public function getComplete(){
        return view('frontend.complete');
    }
}
