
    <!-- ======= Mobile nav toggle button ======= -->
    <div class="mobile-nav-toggle">
        <i class="fas fa-bars"></i>
    </div>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <h1 class="text-light"></h1>
            </div>

            <nav  class="nav-menu">
                <ul>
                    <li class="mt-5 dashboard" style="background: #fff;border-radius: 16px" ><a href="{{url('admin')}}" class="nav-link scrollto active"><i class="fas fa-home"></i> <span>الرئيسية</span></a></li>
                    <li class="mt-4"><a href="#about" class="nav-link scrollto external_link"><i class=" fas fa-address-book"></i> <span>إدارة الكتب</span><i class="fas fa-angle-right right_arrow right"></i> <i class="fas fa-angle-down right_arrow down"></i></a>
                        <ul class="internal-link">
                            <li><a href="{{url('book/create')}}"><i class="fab fa-staylinked"></i><span>إضافة كتاب</span></a></li>
                            <li><a href="{{url('book/manage')}}"><i class="fab fa-staylinked"></i>عرض وادارة الكتب</a></li>
                        </ul>
                    </li>
                    <li class="mt-4"><a href="#resume" class="nav-link scrollto external_link"><i class="fas fa-smile"></i><span>إدارة المؤلفين</span><i class="fas fa-angle-right right_arrow right"></i> <i class="fas fa-angle-down right_arrow down"></i></a>
                        <ul class="internal-link">
                            <li><a href="{{url('author/create')}}"><i class="fab fa-staylinked"></i><span>إضافة مؤلف</span></a></li>
                            <li><a href="{{url('author/manage')}}"><i class="fab fa-staylinked"></i>عرض وادارة المؤلفين</a></li>
                        </ul>
                    </li >
                    <li class="mt-4"><a href="#portfolio" class="nav-link scrollto external_link"><i class="fas fa-hotel"></i> <span>إدارة دور النشر</span><i class="fas fa-angle-right right_arrow right"></i> <i class="fas fa-angle-down right_arrow down"></i></a>
                        <ul class="internal-link">
                            <li><a href="{{url('publisher/create')}}"><i class="fab fa-staylinked"></i><span>إضافة دار نشر</span></a></li>
                            <li><a href="{{url('publisher/manage')}}"><i class="fab fa-staylinked"></i>عرض وادارة دور النشر</a></li>
                        </ul>
                    </li>
                    <li class="mt-4"><a href="#portfolio" class="nav-link scrollto external_link"><i class="fas fa-hotel"></i> <span>إدارة التصنيفات</span><i class="fas fa-angle-right right_arrow right"></i> <i class="fas fa-angle-down right_arrow down"></i></a>
                        <ul class="internal-link">
                            <li><a href="{{url('category/create')}}"><i class="fab fa-staylinked"></i><span>إضافة تصنيف</span></a></li>
                            <li><a href="{{url('category/manage')}}"><i class="fab fa-staylinked"></i>عرض التصنيفات</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact" class="nav-link scrollto"><i class="fas fa-user"></i> <span>إدارة المستخدمين</span></a></li>
                    <li><a href="#services" class="nav-link scrollto"><i class="far fa-file"></i> <span>التقارير</span></a></li>
                    <li><a href="#contact" class="nav-link scrollto"><i class="fas fa-cogs"></i><span>الإعدادات</span></a></li>
                    <li>
                        <a class="nav-link scrollto"  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i><span>تسجيل الخروج</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->
{{--    @endsection--}}
