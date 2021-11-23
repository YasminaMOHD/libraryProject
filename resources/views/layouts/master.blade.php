<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('Style.style')
    <style>
        .card-body{
            padding: 3px 10px;
            text-align: right;
            background: #000;
        }
        .card a{
            color: #fff;
        }
        .card a .card-title{
            font-size: 14px;
        }
        .intro{
            text-align: center;
            font-size: 18px;
            color: #6c6c6c;
        }
        .intro .tittle{
            font-size: 22px;
            font-weight: bold;
            color: #d81324;
        }
        .serarch-box input{
            border:2px #d81324 solid;
            border-radius: 5px;
            height: 55px;
            line-height: 55px;
            text-align: right;
        }
        .serarch-box input:focus{
            /*outline: none;*/
            box-shadow: 0px 0px 5px #d81324;
        }
        .serarch-box input::placeholder{
            text-align: right;
            font-size: 14px;
            font-weight: bold;
        }
        .serarch-box form{
            height: 60px;
        }
        /*appointment*/
        .appointment-content{
            background: #f6f6f6;
        }
        .appointment h3{
            font-size: 35px;
            line-height: 40px;
            margin-bottom: 25px;
            color: #d81324;
            font-family: Domine;
            font-weight: bold;
        }
        .form-appointment input,.form-appointment select{
            height: 50px;
            line-height: 50px;
        }
        .form-appointment input,.form-appointment textarea,.form-appointment select{
            font-weight: normal;
            padding-left: 15px;
            padding-right: 15px;
            background: #fff;
            outline-color: rgb(383,189,193);
            outline-width: thin;
            font-size: 16px;
            color: #000000;
            border: 1px solid #f6f6f6;
        }
        .send-btn input[type=submit]{
            background: #d81324;
            color: #fff;
            border-radius: 7px;
        }
        .send-btn input[type=submit]:hover{
            background: #0b2154;
        }
        footer{
            margin-top: 77px;
        }
    </style>
</head>
<body>

<header>
    @yield('headerContent')
</header>
<main>
    <!-- slider -->
    <div id="carouselExampleCaptions" class="carousel slide mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('/image/slider.jpg')}}" class="d-block w-100" alt="slider image">
                <div class="carousel-info">
                    <h5>!مكتبة اقرأ حيث العلم والمعرفة</h5>
                    <a href="#" class="mt-5">استكشف المزيد <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('/image/slider1.jpg')}}" class="d-block w-100" alt="slider image">
                <div class="carousel-info">
                    <h5 class="wide-carousel-info">الكتاب غذاء الروح</h5>
                    <a href="#" class="mt-5">استكشف المزيد <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('/image/slider2.jpg')}}" class="d-block w-100" alt="slider image">
                <div class="carousel-info">
                    <h5>إذا كنت تمتلك كتاب فأنت لست بوحيد !</h5>
                    <a href="#" class="mt-5">استكشف المزيد<i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /slider-->
    <!-- .Book-->
    <div class="container">
        @yield('intro')
        @yield('content')
        @yield('contact')
    </div>
    <!--/Book-->
</main>
<footer>
    @yield('footer')

</footer>

@include('javaScript.js')
@yield('script')
<script>
    /*animate scroll tags in header*/
    $('header a.animateLink').click(function (e) {
        e.preventDefault();
        var targerElemet = $(this).attr('href');
        var scrollValue = $(targerElemet).offset().top;
        $('body, html').animate({
            scrollTop: scrollValue
        }, 2000);
    })
</script>
</body>
</html>
