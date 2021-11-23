<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
@include('style.style')
<!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <link href="{{asset('css/now-ui-dashboard.min.css')}}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/formStyle.css')}}">
</head>
<body>
<header>
</header>
<main>
    <div class="wrapper ">
        @include('dashboard.rightSlide')
        <div class="main-panel" id="main-panel">
        <div class="container tittle">
            <p class="page-tittle">مكتبة اقرأ / <span> إضافة كتاب</span></p>
        </div>

<div class="container">
    @if($errors->any())

        @if(!empty($errors->first('msg1')))
            <p class="w-100 alert alert-danger mb-4">
                {{$errors->first('msg1')}}</p>
        @endif
    @endif
    @if($errors->any())
        @if(!empty($errors->first('msg')))
            <p class="w-100 alert alert-success mb-4">{{$errors->first('msg')}}</p>
        @endif
    @endif
    <div class="row">
        <div class="col-12">
            <form method="post" enctype="multipart/form-data" action="{{url('book/store')}}">
                @csrf
                <div class="mb-4 col-12">
                    <label for="exampleInputEmail1" class="form-label">اسم الكتاب</label>
                    <input type="text" class="form-control" name="bookName" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @foreach($errors->get('bookName') as $error)
                        <p class="error">{{$error}}</p>
                    @endforeach
                </div>
                <div class="mb-4 row col-12">
                    <div class="col-md-6 w-100">
                        <label for="exampleInputPassword1" class="form-label">رقم الاصدار</label>
                        <input type="text" class="form-control" name="release_num" id="exampleInputPassword1">
                        @foreach($errors->get('release_num') as $error)
                            <p class="error">{{$error}}</p>
                        @endforeach
                    </div>
                    <div class="col-md-6 w-100">
                        <label for="exampleInputPassword1" class="form-label">تاريخ الاصدار</label>
                        <input type="date" class="form-control"  name="release_year" id="exampleInputPassword1">
                        @foreach($errors->get('release_year') as $error)
                            <p class="error">{{$error}}</p>
                        @endforeach
                    </div>

                </div>
                <div class="mb-4 row col-12">
                   <div class="col-md-6">
                       <p class="form-label">مؤلف الكتاب</p>
                       <select name="bookAuthor" class="selectpicker form-control" data-live-search="true"  aria-label="Default select example">
                           <option value=""  selected>اختر المؤلف</option>
                           @foreach($Author as $author)
                               <option name="bookAuthorOption[]" value="{{$author->id}}" class="options"><span>{{$author->name}}</span></option>
                            @endforeach
                       </select>
                       @foreach($errors->get('bookAuthor') as $error)
                           <p class="error">{{$error}}</p>
                       @endforeach
                   </div>
                    <div class="col-md-6">
                        <p class="form-label" >دار النشر</p>
                        <select name="bookPublisher" class="selectpicker bookPublisher form-control" data-live-search="true" aria-label="Disabled select example">
                            <option value="" selected>اختر دار النشر</option>
                            @foreach($Publisher as $publisher)
                                <option name="bookPubOption[]" value="{{$publisher->id}}" class="options"><span>{{$publisher->name}}</span></option>
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
                        <select name="bookCategory" class="selectpicker form-control w-100" data-live-search="true"  aria-label="Default select example">
                            <option value="" selected>اختر تصنيف الكتاب</option>
                            @foreach($Category as $category)
                                <option value="{{$category->id}}" name="bookCategoryOption[]" class="options"><span>{{$category->name}}</span></option>
                            @endforeach
                        </select>
                        @foreach($errors->get('bookCategory') as $error)
                            <p class="error">{{$error}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="mb-5 row col-12">
                    <div class="col-md-12">
                    <p>تحميل صورة لغلاف الكتاب</p>
                    <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="mb-4 row col-12">
                    <div class="col-md-12">
                <button type="submit" name="submit" class="btn btn-primary col-12">إضافة الكتاب</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

        </div>
    </div>
</main>
@include('javaScript.js')

<script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{asset('js/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/dashboard.js')}}"></script>
<script>

</script>
</body>
</html>
