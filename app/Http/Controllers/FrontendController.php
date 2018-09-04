<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Comment;

class FrontendController extends Controller
{
    public function getHome()
    {
        $data['product'] = Product::orderBy('prod_id')->paginate(9);
        $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->get(); //dong nay la lay rieng san pham dac biet
        return view('frontend.index',$data);
    }
    public function getDetail($prod_id){
        $data['item'] = Product::find($prod_id);

        //phan nay lay ra binh luan sanpham 
        $data['comment'] = Comment::where('com_product',$prod_id)->orderBy('com_id','desc')->get();
        return view('frontend.details',$data);
    } 
    public function getCategory($cate_id)
    {
        $data['catename'] = Category::find($cate_id);
        $data['itemDanhMuc'] = Product::where('prod_cate',$cate_id)->get();
        return view('frontend.detailDanhMuc',$data);

    }
    public function postComment(Request $request, $prod_id){
        $comment = new Comment;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product=$prod_id;
        $comment->save();
        return back();
        
    }
    public function getSearch(Request $request){
        $result = $request->result;
        
        $result = str_replace(' ','% ',$result);
        $data['keyword'] = $result;
        $data['item'] = Product::where('prod_name','like','%'.$result.'%')->get();

        return view('frontend.search',$data);
    }
}
