<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\book;
use App\category;
use  App\author;
use App\publisher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class bookController extends Controller
{
    public  function  returnCatPubAut(){
        $category=DB::table('categories')->select('*')->get();
        $author=DB::table('authors')->select('*')->get();
        $message="";
        $publisher=DB::table('publishers')->select('*')->get();
        return view('dashboard.Book.addBook')->with('Category',$category)->with('Author',$author)->with('Publisher',$publisher)->with('msg',$message);
    }
    public function create(BookRequest $request){
        $message="";
        $status="";
        $message1="";
        $bookName=$request['bookName'];
        $release_year=$request['release_year'];
        $publisher=$request->get('bookPublisher');
        $author=$request['bookAuthor'];
        $category=$request['bookCategory'];
        $release_num=$request['release_num'];
        $image=$request['image'];
        //to return book (to make check if what add is exxit or not)
        $book=book::with('category')->with('publisher')->with('author')->where('name',$bookName)
            ->where('release_num',$release_num)->get();
        if($book->isEmpty()){
           $bookOBJ=new book();
           $bookOBJ->name=$bookName;
           $bookOBJ->release_num=$release_num;
           $bookOBJ->release_year=$release_year;
           $bookOBJ->author_id=$author;
           $bookOBJ->publisher_id=$publisher;
           $bookOBJ->category_id=$category;
            $this->uploadImg($image,$bookOBJ,$request);

           $bookOBJ->save();
            $message1='تم اضافة الكتاب للمكتبة';
        }else{
            $message='(لا يمكن أن تضيف كتاب من نفس الاصدار مرة اخرى )هذا الكتاب موجود مسبقا في المكتبة';
        }
        return redirect()->back()->withErrors(['msg'=>$message1,'msg1'=>$message]);
    }
    public function manage(){
        $num=10;
        $book=book::with('category')->with('publisher')->with('author')->paginate($num);
        $authorName=author::with('book')->select('id')->select('name')->get();
        $pubName=publisher::with('book')->select('id')->select('name')->get();
         $this->imagePath($book);
        return view('dashboard.book.MNGbook')->with('bo',$book)->with('author',$authorName)->with('publisher',$pubName);
    }
    public function destroy($id){
       $book=DB::table('books')->where('id',$id)->delete();
        return redirect('book/manage')->with('statusError',$book);
    }
    public function show($id){

        $book=book::with('category')->with('publisher')->with('author')->where('id',$id)->get();
        $category=DB::table('categories')->select('*')->get();
        $author=DB::table('authors')->select('*')->get();
        $publisher=DB::table('publishers')->select('*')->get();
        $this->imagePath($book);
        return view('dashboard.Book.updateBook')->with('b',$book)->with('author',$author)->with('category',$category)->with('publisher',$publisher);

        }
    public function update(BookRequest $request ,$id){
        $bookName=$request['bookName'];
        $release_year=$request['release_year'];
        $publisher=$request->get('bookPublisher');
        $author=$request['bookAuthor'];
        $category=$request['bookCategory'];
        $release_num=$request['release_num'];
        $image=$request['image'];
        $status=null;
        $book=book::with('category')->with('publisher')->with('author')->where('id',$id)
           ->first();
        if(!is_null($book)){
            $book->name=$bookName;
            $book->release_num=$release_num;
            $book->release_year=$release_year;
            $book->author_id=$author;
            $book->publisher_id=$publisher;
            $book->category_id=$category;
            if(!is_null($image)) {
                $this->uploadImg($image, $book, $request);
            }
            $status=$book->save();
        }
           return redirect('book/manage')->with('status',$status);
    }
    public function uploadImg($image,$obj,$request){
        if(is_null($image)) {
            $obj->image=$image;
        }else{
            $img = $request->file('image');
            $path = "uploads/Images/";
            $name = time() + rand(1, 100000) . '.' .$img->getClientOriginalExtension();
            $check=Storage::disk('local')->put($path.$name, file_get_contents($img));
            if ($check == true) {
                $status = 'تم رفع صورة غلاف الكتاب بنجاح';
            }
            $obj->image = $path . $name;
        }
    }
    public function imagePath($obj){
        foreach ($obj as $b){
            if(!is_null($b->image)){
                $image_link=Storage::url($b->image);
                $b->image=$image_link;
            }
        }
    }

}

