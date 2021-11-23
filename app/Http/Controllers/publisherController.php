<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\authorRequest;
use App\Http\Requests\publisherRequest;
use App\publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class publisherController extends Controller
{
    public  function returnPublisher(){
        return view('dashboard.Publisher.addPublisher');
    }
    public  function  create(publisherRequest $request){
        $message="";
        $message1="";
        $name=$request['name'];
        $info=$request['info'];
        $publisher=DB::table('publishers')->where('name',$name)->get();
        if($publisher->isEmpty()){
            $pub=new publisher();
            $pub->name=$name;
            $pub->info=$info;
            $pub->save();
            $message1='تم اضافة دار النشر !';
        }else{
            $message='دار النشر هذه موجود مسبقا !';
        }
        return redirect()->back()->withErrors(['msg'=>$message1,'msg1'=>$message]);
    }
    public function manage(){
        $num=15;
        $publisher=DB::table('publishers')->paginate($num);
        Cookie::queue(Cookie::forget('name'));
        return view('dashboard.publisher.MNGpublisher')->with('publish',$publisher);
    }
    public function show($id){
            $publisher = DB::table('publishers')->where('id', $id)->get();
            return view('dashboard.publisher.updatePublisher')->with('publisher', $publisher);
    }
    public function update(publisherRequest $request,$id){
        $publisherName=$request['name'];
        $info=$request['info'];
//        $publisher=DB::table('publishers')->where('id',$id)->update(['name'=>$publisherName,'info'=>$info]);
        $publisher=publisher::with('book')->where('id',$id)->first();
        $publisher->name=$publisherName;
        $publisher->info=$info;
        $status=$publisher->save();
        return redirect('publisher/manage')->with('status',$status);
    }
    public function destroy($id){
        $pub=DB::table('publishers')->where('id',$id)->delete();
        return redirect('publisher/manage')->with('statusError',$pub);
    }
}
