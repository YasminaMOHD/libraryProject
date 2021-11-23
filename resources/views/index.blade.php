
@extends('layouts.master')
@section('intro')
    <div class="intro mt-4 mb-5">
        <div class="tittle mt-4 mb-3">
            الكتب المتاحة بالمكتبة
        </div>
        <div class="content pb-3">
            مكتبة اقرأ مكتبة عريقة تم تأسيسها عام 1997 ، في قطاع غزة المُحاصر الصامد الأبي المُنتصر بإذن الله
            <br>
            تحتوي المكتبة على أغلب أنواع الكتب العربية والغربية ( روايات ، قصص ، دواويين شعريه وكتب أطفال)
        </div>
    </div>
    @endsection
@section('headerContent')
<nav class="navbar navbar-expand-lg navbar-light seconed-nav">
        <a class="navbar-brand ml-sm-5 mr-5 logo-life" href="#"><img src="{{asset('/image/bookLogo.png')}}" alt="header image">
        </a>
        <button class="navbar-toggler mr-sm-5 my-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-5 right-menu w-100">
                <li class="nav-item active">
                    <a class="nav-link" href="#">الرئيسية <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animateLink" href="#book">الكتب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animateLink" href="#contact" tabindex="-1" aria-disabled="true">تواصل معنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('login')}}" tabindex="-1" aria-disabled="true">تسجيل الدخول</a>
                </li>
            </ul>

        </div>
    </nav>
@endsection

@section('content')
    <div class="filter_search row mb-5" id="book" style="box-shadow: 0px 19px 50px 0px rgba(21, 18 ,18 , .25)">
        <div class="col-sm-3">
        <form method="get">
            <div class="type-filter mt-3">
                <select name="table" class="selectpicker  form-control" id="typeSearch" data-live-search="true" aria-label="Disabled select example">
                    <option value="all" selected>All Book</option>
                    <option value="author">Authors</option>
                    <option value="category">Categories</option>
                    <option value="publisher">Publishers</option>
                </select>
            </div>
            <div class="type-filter mt-3 typeSearch">
                <select name="type" class="selectpicker  form-control" id="itemSearch" data-live-search="true" aria-label="Disabled select example">
                </select>
            </div>
            <div class="type-filter mt-4 mb-3">
                <button type="button" class="btn btn-info w-100 displayBook"><i class="fas fa-search"></i></button>
            </div>
        </form>
        </div>
        <div class="col-sm-9">
            <div class="serarch-box mt-3">
                <form method="get" >
                    <input type="search" name="input-search" class="form-control input-search" placeholder="ابحث عن كتاب عن طريق اسمه او اسم مؤلفه أو تصنيفه ">
                </form>
            </div>
            <div class="showBooks mt-3 mb-4">
                <div class="row" style="padding:0 15px;display: flex;">
                @if(@isset($books))
                 @foreach($books as $b)
                         <div class="book mr-1">
                             <div class="card" style="width: 150px;">
                                 <a href="#">
                                 <img @if(is_null($b->image))
                                     src="https://via.placeholder.com/150"
                                 @endif
                                 @if(!is_null($b->image))
                                     src="{{$b->image}}"
                                 @endif
                                      class="card-img-top" style="width: 100%;height: 150px" alt="image">
                                 <div class="card-body">
                                     <h5 class="card-title">{{$b->name}}</h5>
                                 </div>
                                 </a>
                             </div>
                         </div>
                     @endforeach
                     <div class="mt-2 pagination text-center justify-content-center">

                         <p>{{$books->links()}}</p>
                     </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
@section('contact')
            <div class="appointment pt-5 mx-auto mb-5" id="contact">
            <div class="appointment-content py-5 px-5 text-center">
                <h3>تواصل معنا</h3>
                <div class="form-appointment">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3">
                            <input class="w-100" type="text" name="name" placeholder="الاسم">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="w-100" type="email" name="email" placeholder="الايميل">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="w-100" type="text" name="phone" placeholder="رقم الهاتف">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="w-100" type="text" name="phone" placeholder="عنوان الرسالة">
                        </div>
                        <div class="col-md-12 mb-4">
                            <textarea class="w-100" name="area-message"   rows="5" placeholder="ما هي رسالتك لنا"></textarea>
                        </div>
                        <div class="send-btn">
                            <input type="submit" name="send" value="ارسل رسالة">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--./appointment-->
    @endsection
@section('footer')
    <div class="footer-content mt-5 p-5" style="direction: rtl; background: #000; color: #fff">
        <div class="row">
            <div class="col-md-12 text-center">
                <p style="color: #d81324;font-size: 20px;font-weight: bold">مكتبة اقرأ</p>
                <p>نحن موجودون لبناء عقول منيرة بالعلم والمعرفة ، إذا كنت تمتلك كتاب فأنت لست بوحيد (أنت تمتلك العالم كله)</p>
            </div>
            <div class="col-md-12 text-center">
                <i class="fas fa-copyright"></i> مكتبة اقرأ
            </div>
        </div>
    </div>
    @endsection
@section('script')

    <script type="text/javascript">
        $(function () {
            $('#typeSearch').change(function(e) {
                e.preventDefault();
                var va=$(this).val();
                var content=$(this).find("option:selected").text();
                var op="";
                $.ajax({
                    type:'get',
                    dataType:"json",
                    data:{'id':content},
                    url:'{{route('findTypeSearch')}}',

                    success:function(data){
                        op+='<option selected disabled>selected '+content+'</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].name+'">'+data[i].name+'</option>';
                        }
                        $('#itemSearch').html("").selectpicker('refresh');
                        $('#itemSearch').append(op).selectpicker('refresh');
                    },
                    error:function(){
                        $('#itemSearch').html("").selectpicker('refresh');
                    }
                });

            })

            $('.displayBook').click(function (e) {
                e.preventDefault();
                var table=$('#typeSearch').val();
                var type=$('#itemSearch').val();
                var inf="";
                $.ajax({
                    type:'get',
                    data:{'table':table,'type':type},
                    url:"{{route('displayBook')}}",
                    success:function (data) {
                        // console.log(data)
                            for(var count in data){
                                $('.showBooks .row').html("");
                                inf+=" <div class=\"book mr-1 wow fadeInBottomRight\" data-wow-delay='.3s'>\n" +
                                    "                             <div class=\"card\" style=\"width: 150px;\">\n" +
                                    "                                 <a href=\"#\">\n" +
                                    "                                 <img class='w-100'";
                                if(data[count].image == null){
                                    inf+=" src=\"https://via.placeholder.com/150\" alt='image' "
                                }else{
                                    inf+="src= '"+data[count].image+"' alt='image' "
                                }
                                inf+="<div class=\"card-img-top\" style=\"width: 100%;height: 150px\" alt=\"image\">\n" +
                                    "                                 <div class=\"card-body\">\n" +
                                    "                                     <h5 class=\"card-title\">"+data[count].name+"</h5>\n" +
                                    "                                 </div>\n" +
                                    "                                 </a>\n" +
                                    "                             </div>\n" +
                                    "                         </div></div>";
                                $('.showBooks .row').append(inf);
                            }
                    },
                    error:function () {
                        alert('هذا الكتاب غير موجود بالمكتبة')
                    }
                })
            });
            $('.input-search').keypress(function (e) {
                if (e.keyCode === 13) {
                    e.preventDefault();
                    var search = $('.input-search').val();
                    var inf="";
                    $.ajax({
                        type: 'get',
                        data: {'search': search},
                        url: "{{route('searchAndDisplay')}}",
                        success:function (data) {
                            console.log(data)
                            for(var count in data){
                                $('.showBooks .row').html("");
                                inf+=" <div class=\"book mr-1 wow fadeInBottomRight\" data-wow-delay='.3s'>\n" +
                                    "                             <div class=\"card\" style=\"width: 150px;\">\n" +
                                    "                                 <a href=\"#\">\n" +
                                    "                                 <img class='w-100'";
                                if(data[count].image == null){
                                    inf+=" src=\"https://via.placeholder.com/150\" alt='image' "
                                }else{
                                    inf+="src= '"+data[count].image+"' alt='image' "
                                }
                                inf+="<div class=\"card-img-top\" style=\"width: 100%;height: 150px\" alt=\"image\">\n" +
                                    "                                 <div class=\"card-body\">\n" +
                                    "                                     <h5 class=\"card-title\">"+data[count].name+"</h5>\n" +
                                    "                                 </div>\n" +
                                    "                                 </a>\n" +
                                    "                             </div>\n" +
                                    "                         </div></div>";
                                $('.showBooks .row').append(inf);
                            }
                        },
                        error:function () {
                            alert('هذا الكتاب غير موجود بالمكتبة')
                        }
                    })
                }
            })
        });


    </script>


    @endsection
