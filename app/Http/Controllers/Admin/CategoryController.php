<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{
   public function getCate(){
       $data['catelist'] = Category::all();
       return view('backend.category',$data);
   }
   public function postCate(AddCateRequest $request){
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category-> save();
        return back();
    }

   public function getEditCate( $cate_id){

        $data['cate'] = Category::find($cate_id);
        return view('backend.editcategory',$data);
    }
    public function postEditCate(EditCateRequest $request, $cate_id){
        $category = Category::find($cate_id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category-> save();
        return redirect()->intended('admin/Category');
      
    }


    public function getDeleteCate($id){
        Category::destroy($id);
        return back();
    }

}
