<?php

namespace App\Http\Controllers;

use App\Http\Requests\authorRequest;
use Illuminate\Http\Request;
use App\category;
use App\Http\Requests\categoryRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function returnCat (){
        return view('dashboard.category.addCategory');
    }
    public function create(categoryRequest $request){
        $message="";
        $message1="";
     $name=$request['name'];
     $info=$request['info'];

        $category=DB::table('categories')->where('name',$name)->get();
     if($category->isEmpty()){
         $cat=new category();
         $cat->name=$name;
         $cat->info=$info;
         $cat->save();
         $message1='تم اضافة التصنيف!';
     }else{
         $message='هذا التصنيف موجود مسبقا !';
     }
        return redirect()->back()->withErrors(['msg'=>$message1,'msg1'=>$message]);
    }
    public function manage(){
        $num=15;
        $category=DB::table('categories')->paginate($num);
        return view('dashboard.category.MNGcategory')->with('categ',$category);
    }
    public function show($id){
            $category = DB::table('categories')->where('id', $id)->get();
            return view('dashboard.category.updateCategory')->with('category', $category);
    }
    public function update(categoryRequest $request,$id){
        $categoryName=$request['name'];
        $info=$request['info'];
//        $category=DB::table('categories')->where('id',$id)->update(['name'=>$categoryName,'info'=>$info]);
        $category=category::with('book')->where('id',$id)->first();
        $category->name=$categoryName;
        $category->info=$info;
        $status=$category->save();
        return redirect('category/manage')->with('status',$status);
    }
    public function destroy($id){
        $category=DB::table('categories')->where('id',$id)->delete();
        return redirect('category/manage')->with('statusError',$category);
    }
}
