<?php

namespace App\Http\Controllers;

use App\author;
use App\book;
use App\publisher;
use Illuminate\Http\Request;
use App\Http\Requests\authorRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;


class authorController extends Controller
{
    public function returnAuthor(){
        $message="";
        $message1="";
       return view('dashboard.author.addAuthor')->with('msg',$message)->with('msg1',$message1);
    }
    public function create(authorRequest $request){
        $message="";
        $message1="";
        $name=$request['name'];
        $info=$request['info'];
        //to check if name book exit or not
        $author=DB::table('authors')->where('name',$name)->get();
        if($author->isEmpty()){
            $auth=new author();
            $auth->name=$name;
            $auth->info=$info;
            $auth->save();
            $message="تم الاضافة بنجاح !";
        }else{
            $message1='هذا التصنيف موجود مسبقا !';
        }
        return redirect()->back()->withErrors(['msg'=>$message,'msg1'=>$message1]);
    }
    public function manage(){
        $num=15;
        $author=DB::table('authors')->paginate($num);
        Cookie::queue(Cookie::forget('name'));
        return view('dashboard.author.MNGauthor')->with('auth',$author);
    }
    public function show($id){
            $author = DB::table('authors')->where('id', $id)->get();
            return view('dashboard.author.updateAuthor')->with('author', $author);
    }
    public function update(authorRequest $request,$id){
        $authorName=$request['name'];
        $info=$request['info'];
//        $author=DB::table('authors')->where('id',$id)->update(['name'=>$authorName,'info'=>$info]);
        $author=author::with('book')->where('id',$id)->first();
        $author->name=$authorName;
        $author->info=$info;
        $status=$author->save();
        return redirect('author/manage')->with('status',$status);
    }
    public function destroy($id){
        $author=DB::table('authors')->where('id',$id)->delete();
        return redirect('author/manage')->with('statusError',$author);
    }
}
