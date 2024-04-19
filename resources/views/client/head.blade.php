<!-- Main Wrapper Start -->
<!--Offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>

<!--Offcanvas menu area end-->

<!--header area start-->
<header class="header_area header_shop">
    <!--header top start-->
   
    <!--header middel start-->
    <div class="header_middel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-5">
                    <div class="logo">
                        <a href="/"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="search_bar">
{{--                        <form action="/search" method="post">--}}
{{--                            @csrf--}}
{{--                            <input placeholder="Tìm kiếm sản phẩm ..." type="text" name="key_word">--}}
{{--                            <button type="submit"><i class="ion-ios-search-strong"></i></button>--}}
{{--                        </form>--}}
                        <div class="search_bar">
                            <form action="/search" method="get">

                                <input placeholder="Tìm kiếm ở đây..." type="text" id="keyword" name="keyword" autocomplete="off">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @include('client.cart')
               
            </div>
        </div>
    </div>
    <!--header middel end-->

    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="header_static">
                        <div class="main_menu_inner">
                            <div class="main_menu">
                                <nav>
                                    <ul>
                                        <li><a href="/">Trang chủ</a></li>
                                        <li class="mega_items"><a href="/shop">Danh mục <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                @php
                                                    $categories = \Illuminate\Support\Facades\DB::table('categories')->get();
                                                @endphp
                                                @foreach($categories as $category)
                                                <li><a href="c-{{ $category->id }}-{{ Str::slug($category->name, '-') }}"> {{ $category->name }} </a></li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="/carts">Giỏ hàng</a></li>
                                        <li><a href="/checkout">Thanh toán</a></li>
                                        <li><a href="/">Về chúng tôi </a></li>
                                        <li><a href="/">Liên lạc</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="contact_phone">
                            <p>Gọi hỗ trợ miễn phí: <a href="tel:01234567890">01234567890</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header bottom end-->
</header>
<!--header area end-->

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        @if(isset($name))
                        <li><a href="/">Trang chủ</a></li>
                        <li>/</li>
                        <li>{{ $name }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
