<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Author</title>
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
        <p class="page-tittle">مكتبة اقرأ / <span> تعديل بيانات المؤلف</span></p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($author as $au)
                    <form method="post" enctype="multipart/form-data" action="{{url('author/update/'.$au->id)}}">
                        @csrf

                        <div class="mb-4 col-12">
                            <label for="exampleInputEmail1" class="form-label">اسم المؤلف</label>
                            <input type="text" class="form-control" name="name" value="{{$au->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @foreach($errors->get('name') as $error)
                                <p class="error">{{$error}}</p>
                            @endforeach
                        </div>
                        <div class="mb-4  col-12">
                                <label for="exampleInputPassword1" class="form-label">معلومات المؤلف</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="info"  id="floatingTextarea2" style="height: 100px">{{$au->info}}</textarea>
                            </div>
                                @foreach($errors->get('info') as $error)
                                    <p class="error">{{$error}}</p>
                                @endforeach
                        </div>
                        <div class="mb-4 row col-12">
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary col-12">تحديث معلومات المؤلف</button>
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
