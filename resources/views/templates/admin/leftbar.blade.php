 <!-- /. NAV TOP  -->
 <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
        {{-- {{ dd(Route::currentRouteName()) }} --}}
            <li class="{{ Route::currentRouteName()=='admin.index.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.index.index')}}" ><i class="fa fa-desktop "></i>Dashboard</a>
            </li>
            <li class="{{ Route::currentRouteName()=='admin.brand.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.brand.index')}}" ><i class="fa fa-delicious "></i>Brands</a>
            </li>
            <li class="{{ Route::currentRouteName()=='admin.category.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.category.index')}}" ><i class="fa fa-cube "></i>Categories</a>
            </li>
               <li class="{{ Route::currentRouteName()=='admin.user.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.user.index')}}" ><i class="fa fa-group"></i>Users</a>
            </li>
            <li>
                <a class="collapseproduct" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-mobile-phone "></i>Products <span class="glyphicon" style="float:right;padding-top:8px;padding-right:10px"></span></a>
                <div id="collapseOne" class="panel-collapse collapse {{ Route::currentRouteName()=='admin.product.index' ? 'in' : ''}}">
                  <a href="{{ route('admin.product.index') }}" class="{{ Route::currentRouteName()=='admin.product.index' ? 'active-link' : ''}}"><span class="glyphicon glyphicon glyphicon-th-list"></span>  All Product</a>
                  @foreach ($catList as $item) 
                    <a href="{{ route('admin.category.show',['id'=>$item->id]) }}" class="secondlevelnav {{ (Request::url()==URL::to('/').'/admincp/category/'.$item->id?'active-link':'') }}"><span class="glyphicon glyphicon glyphicon-eye-open"></span> {{ $item->cat_name }}</a>
                  @endforeach
          </div>
            </li>
             <li class="{{ Route::currentRouteName()=='admin.order.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.order.index')}}" ><i class="fa fa-file-o "></i>Orders <span class="badge">{{ App\Order::count() }}</span></a>
            </li>
            @if(Auth::user()->level==1)
            <li class="{{ Route::currentRouteName()=='admin.payment.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.payment.index')}}" ><i class="fa fa-credit-card "></i>Payments</a>
            </li>
              <li class="{{ Route::currentRouteName()=='admin.themeoption.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.themeoption.index')}}" ><i class="fa fa-gear "></i>Theme Option</a>
            </li>
            @endif
            <li class="{{ Route::currentRouteName()=='admin.contact.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.contact.index')}}"><i class="fa fa-envelope"></i>Contacts</a>
            </li>
            <li class="{{ Route::currentRouteName()=='admin.advertisement.index' ? 'active-link' : ''}}">
                <a href="{{ route('admin.advertisement.index')}}" ><i class="fa fa-money "></i>Advertisements</a>
            </li>
            
    </ul>
</div>

</nav>
        <!-- /. NAV SIDE  -->