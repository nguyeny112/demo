        @include('templates.public.header')
        <div class="content">
        <div class="container">
		 <div class="content-grids">
        	@yield('main-content')  
        	</div>
        	</div>
        </div>
        @include('templates.public.footer')