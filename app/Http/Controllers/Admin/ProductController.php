<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Model\Product;
use App\Model\Category;
use DB;


class ProductController extends Controller
{
    public function getProduct(){
        $data['productlist'] = DB::table('products')
        ->join('categories','products.prod_cate','=','categories.cate_id')
        ->orderBy('prod_id')->get();
        return view('backend.product',$data);
    }
    public function getAddProduct(){
        $data['catelist'] = Category::all();
        return view('backend.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request){
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->prod_name= $request->name;
        $product->prod_slug= str_slug($request->name);
        $product->prod_price= $request->price;
        $product->prod_img= $filename;
        $product->prod_status= $request->status;
        $product->prod_description= $request->description;
        $product->prod_cate= $request->cate;
        $product->prod_featured= $request->featured;
        $product->save();
        $request->img->storeAs('img',$filename);
        return back();

    }
    public function getEditProduct($prod_id){
        $data['product'] = Product::find($prod_id);
        $data['cate'] = Category::all();
        return view('backend.editproduct',$data);
    }
    public function postEditProduct(Request $request, $prod_id){
        $product = new Product;

        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] = str_slug($request->name);
        $arr['prod_price'] = $request->price;
       
        $arr['prod_status'] = $request->status;
        $arr['prod_description'] = $request->description;
        $arr['prod_cate'] = $request->cate;
        $arr['prod_featured'] = $request->featured;
        

        //hasFile kiểm tra giá trị ảnh trong input đã tồn tại chưa
        //nếu như người dùng không sửa ảnh thì nhận lại ảnh cũ
        if($request->hasFile('img')){
            $img = $request->img->getclientOriginalName();// lấy về cái tên file ảnh
            $arr['prod_img'] = $img;//truyền vào mảng
            $request->img->storeAs('img',$img); // lưu vào trong file có tên img
        }

        $product::where('prod_id',$prod_id)->update($arr);
        return redirect('admin/Product');

    }
    public function getDeleteProduct($prod_id){
        Product::destroy($prod_id);
        return back();
    }

}