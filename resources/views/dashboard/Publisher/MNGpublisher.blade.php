<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('Style.style')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <link href="{{asset('css/now-ui-dashboard.min.css')}}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/MNG.css')}}">
    <title>Manage Publisher</title>
</head>
<body>

<main>
    <div class="wrapper ">
        @include('dashboard.rightSlide')
        <div class="main-panel" id="main-panel">
    <div class="container first-container">
        <div class="row">
            @if(session()->has('status'))
                <p class="alert alert-success col-12 mb-5 text-right">تم تعديل بيانات الكتاب </p>
            @endif
                @if(session()->has('statusError'))
                    <p class="alert alert-danger col-12 mb-5 text-right">تم حذف الكتاب </p>
                @endif
            <div class="col-12">
                <div class="container-content">
                    <p>مكتبة اقرأ <span>/ ادارة دور النشر</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="message-Erro">
                </div>
                <table class="table table-bordered table-responsive w-100 table-dark table-hover">
                    <thead class="w-100">
                    <tr>
                        <th>الرقم</th>
                        <th>اسم دار النشر</th>
                        <th>معلومات دار النشر</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="w-100">
                    @foreach($publish as $pub)
                        <tr>
                            <td>{{$pub->id}}</td>
                            <td>{{$pub->name}}</td>
                            <td>{{$pub->info}}</td>
                            <td>
                                <div class="action" style="display: flex">
                                    <form method="get" action="{{url('publisher/show/'.$pub->id)}}">
                                        @csrf
                                        <button class="btn active-btn btn-primary mb-2"><i class="fas fa-edit"></i></button>
                                    </form>
                                    <form method="get" action="{{url('publisher/delete/'.$pub->id)}}" class="mr-2">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('هل متأكد من أنك تريد حذف {{$pub->name}}'   +' ؟ ')" value="{{$pub->name}}" class="delete-btn btn active-btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-2 pagination text-center justify-content-center">
                    <p>{{$publish->links()}}</p>
                </div>
            </div>
        </div>
    </div>
        </div></div>
</main>
@include('javaScript.js')
<script src="{{asset('js/dashboard.js')}}"></script>
</body>
</html>
