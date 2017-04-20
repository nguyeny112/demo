        @include('templates.admin.header')
        @include('templates.admin.leftbar')
        <div class="content" id="app">

        </div>
        <div id="page-wrapper" >
            <div id="page-inner">
            @yield('main-content')  

            <!-- /. ROW  -->           
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
@include('templates.admin.footer')