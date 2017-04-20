    <!--brand-->
    <div class="brand">
        @foreach(App\Advertisement::all() as $ads)
        <div class="col-md-4 branditem">
            <a href="{{ $ads->ads_link }}">
                <img src="/storage/app/public/{{ $ads->ads_image }}" class="img-responsive" alt="">
            </a>
        </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
    <!--//brand-->
</div>

</div>
<!--//content-->
<!--//footer-->
<div class="footer">
    <div class="footer-middle">
        <div class="container">
            <a href="{{ route('public.order.cart') }}" class="ajaxcartmessage"></a>
            <div class="col-md-3 footer-middle-in">
                <a href="index.html"><img style="width:50px;margin-right:-10px" src="{{ $publicURL }}/images/favicon.png" alt=""><img src="{{ $publicURL }}/images/log.png" alt=""></a>
                <p>Điện thoại đẹp nhất! Không thể tin nổi!<br/>
                    Âm thanh tốt nhất! Không thể tin nổi!<br/>
                    Truyền dữ liệu nhanh nhất!<br/>
                    Tất cả đều đúng!</p>
                </div>

                <div class="col-md-3 footer-middle-in">
                    <h6>Information</h6>
                    <ul class=" in">
                        <li><a href="{{ route('public.index.about') }}">About</a></li>
                        <li><a href="{{ route('public.index.contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('public.index.search') }}">Search</a></li>
                    </ul>
                    <ul class="in in1">
                        <li><a href="{{ route('public.order.cart') }}">Your Cart</a></li>
                        @if(!Auth::user())
                        <li><a href="{{ route('global.auth.reg') }}">Register</a></li>
                        <li><a href="{{ route('global.auth.login') }}">Login</a></li>
                        @else
                        <li><a href="{{ route('public.profile.index') }}">Profile</a></li>
                        @endif
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 footer-middle-in">
                    <div class="loading"><img src="{{ $publicURL }}/images/loading.gif" alt="loading"></div>
                    <h6>Tags</h6>
                    <ul class="tag-in">
                        @foreach($brandList as $brand)
                            <li><a href="{{ route('public.index.tag',['slug'=>$brand->brand_name]) }}">{{ $brand->brand_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3 footer-middle-in">
                    <h6>Newsletter</h6>
                    <span>Sign up for News Letter</span>
                    <form>
                        <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                        <input type="submit" value="Subscribe"> 
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <ul class="footer-bottom-top social" style="color:#fff">
                    &copy; 2017 Smartphone LV Shop.
                </ul>
                <p class="footer-class">eCommerce Website Project - Coded by <a href="http://facebook.com/levienthuong" target="_blank">Thuong Le</a></p>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--//footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{-- <script src="{{ $publicURL }}/js/simpleCart.min.js"> </script> --}}
    <!-- slide -->
    <script src="{{ $publicURL }}/js/bootstrap.min.js"></script>
    <!--light-box-files -->
    <script src="{{ $publicURL }}/js/jquery.chocolat.js"></script>
    <link rel="stylesheet" href="{{ $publicURL }}/css/chocolat.css" type="text/css" media="screen" charset="utf-8">
    <!--light-box-files -->
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('a.picture').Chocolat();
        });
    </script>
    <script type="text/javascript" src="{{ $publicURL }}/js/slick.min.js"></script>
    <script type="text/javascript" src="{{ $publicURL }}/js/number_format.js"></script>
    <script src="{{ $publicURL }}/js/script.js"></script>

</body>

</html>