<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class vendorsController extends Controller
{
    public function  GoToHome(){
        return view('dashboard.index');
    }
    public function index(){
        $num=50;
        $book=book::with('author')->with('publisher')->with('category')->paginate($num);
        $this->imagePath($book);
        return view('index')->with('books',$book);
    }
    public function showType(){
        $bookInfo=book::with('category')->with('author')->with('publisher')->get();
        return view('layout.displayBook')->with('bookInfo',$bookInfo);
    }
    public function findTypeSearch(Request $request){
        $category=DB::table('categories')->select('id','name')->get();
        $author=DB::table('authors')->select('id','name')->get();
        $publisher=DB::table('publishers')->select('id','name')->get();
         $type=  $request->input('id');

         $check=null;
         if($type === 'Categories'){
             $check=$category;
         }
         if ($type === 'Publishers'){
             $check=$publisher;
         }
         if($type === 'Authors'){
             $check=$author;
         }
         return $check;
    }
    public function displayBook(Request $request){
         $table=$request['table'];
         $type=$request['type'];
         $number_book=50;
        $book=book::with('category')->with('publisher')->with('author')->paginate($number_book)->items();
         $check=null;
         $counter=0;
        if($table === "all"){
            $check=$book;
        }else {
            foreach ($book as $bo) {
                if ($bo->$table->name === $type) {
                    $check[$counter] = $bo;
                }
                $counter += 1;
            }
        }
        $this->imagePath($check);
        return $check;
         }
    public function searchAndDisplay(Request $request){
        $key=$request['search'];
        $number_book=50;
        $check=null;
        $counter=0;
        $book=book::with('category')->with('publisher')->with('author')->paginate($number_book)->items();
        foreach ($book as $bo){
            if(($bo->name === $key) OR ($bo->author->name === $key) OR ($bo->category->name === $key)){
                $check[$counter]=$bo;
            }
            $counter+=1;
        }
        $this->imagePath($check);
        return $check;
         }
    public function imagePath($obj){
        foreach ($obj as $b){
//            dd($b);
            if(!is_null($b->image)){
                $image_link=Storage::url($b->image);
                $b->image=$image_link;
            }
        }
    }
}
