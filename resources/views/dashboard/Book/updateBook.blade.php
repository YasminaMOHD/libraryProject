<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Book</title>
    @include('Style/style')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <link href="{{asset('css/now-ui-dashboard.min.css')}}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/formStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/formStyle.css')}}">
</head>
<body>

<main>
    <div class="wrapper ">
        @include('dashboard.rightSlide')
        <div class="main-panel" id="main-panel">
    <div class="container tittle">
        <p class="page-tittle">مكتبة اقرأ / <span> تعديل بيانات الكتاب</span></p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($b as $book)
                <form method="post" enctype="multipart/form-data" action="{{url('book/update/'.$book->id)}}">
                    @csrf

                    <div class="mb-4 col-12">
                        <label for="exampleInputEmail1" class="form-label">اسم الكتاب</label>
                        <input type="text" class="form-control" name="bookName" value="{{$book->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @foreach($errors->get('bookName') as $error)
                            <p class="error">{{$error}}</p>
                        @endforeach
                    </div>
                    <div class="mb-4 row col-12">
                        <div class="col-md-6 w-100">
                            <label for="exampleInputPassword1" class="form-label">رقم الاصدار</label>
                            <input type="text" class="form-control" value="{{$book->release_num}}" name="release_num" id="exampleInputPassword1">
                            @foreach($errors->get('release_num') as $error)
                                <p class="error">{{$error}}</p>
                            @endforeach
                        </div>
                        <div class="col-md-6 w-100">
                            <label for="exampleInputPassword1" class="form-label">تاريخ الاصدار</label>
                            <input type="date" class="form-control"  value="{{$book->release_year}}" name="release_year" id="exampleInputPassword1">
                            @foreach($errors->get('release_year') as $error)
                                <p class="error">{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4 row col-12">
                        <div class="col-md-6">
                            <p class="form-label">مؤلف الكتاب</p>
                            <select name="bookAuthor" class="selectpicker form-control" data-live-search="true" aria-label="Default select example">
                                <option value="{{$book->author->id}}" selected>{{$book->author->name}}</option>
                                @foreach($author as $a)
                                    <option name="bookAuthorOption[]" value="{{$a->id}}" class="options"><span>{{$a->name}}</span></option>
                                @endforeach
                            </select>
                            @foreach($errors->get('bookAuthor') as $error)
                                <p class="error">{{$error}}</p>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <p class="form-label" >دار النشر</p>
                            <select name="bookPublisher" class="selectpicker bookPublisher form-control" data-live-search="true" aria-label="Disabled select example">
                                <option value="{{$book->publisher->id}}"  selected>{{$book->publisher->name}}</option>
                                @foreach($publisher as $p)
                                    <option name="bookPubOption[]" value="{{$p->id}}" class="options"><span>{{$p->name}}</span></option>
                                @endforeach
                            </select>
                            @foreach($errors->get('bookPublisher') as $error)
                                <p class="error">{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4 row col-12">
                        <div class="col-md-12">
                            <p class="form-label">تصنيف الكتاب</p>
                            <select name="bookCategory" class="selectpicker form-control w-100" data-live-search="true" aria-label="Default select example">
                                <option value="{{$book->category->id}}" selected>{{$book->category->name}}</option>
                                @foreach($category as $c)
                                    <option value="{{$c->id}}" name="bookCategoryOption[]" class="options"><span>{{$c->name}}</span></option>
                                @endforeach
                            </select>
                            @foreach($errors->get('bookCategory') as $error)
                                <p class="error">{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-5 row col-12">
                        <div class="col-md-6">
                            <img @if(is_null($book->image))
                                 src="https://via.placeholder.com/150"
                                 @endif
                                 @if(!is_null($book->image))
                                 src="{{$book->image}}"
                                 @endif
                                 alt="image" style="width: 60px;height: 60px">
                            <p>تحميل صورة لغلاف الكتاب</p>
                            <input type="file"  name="image" class="form-control">
                        </div>
                    </div>
                    <div class="mb-4 row col-12">
                        <div class="col-md-12">
                            <button type="submit" name="submit" class="btn btn-primary col-12">تحديث معلومات الكتاب</button>
                        </div>
                    </div>
                </form>
                @endforeach

                <div class="col-12 message-Erro">
                    @if($errors->any())
                        @if(!empty($errors->first('msg1')))
                            <p class="w-100 alert alert-danger">
                                {{$errors->first('msg1')}}</p>
                        @endif
                    @endif
                    @if($errors->any())
                        @if(!empty($errors->first('msgUpdate')))
                            <p class="w-100 alert alert-success">{{$errors->first('msgUpdate')}}</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</main>
@include('javaScript/js')
<script src="{{asset('js/dashboard.js')}}"></script>

</body>
</html>
