<div class="col-md-3 product-bottom">
  <!--categories-->
  {{-- {{ Route::currentRouteName() }} --}}
  <div class=" rsidebar span_1_of_left">
   <section  class="sky-form">
   {{ csrf_field() }}
    <h4 class="cate">Sort by</h4>
    <div class="row row1 scroll-pane">
     <div class="col col-4">
      <label class="checkbox discountcheck"><input type="checkbox" name="checkbox" class="discountinput"><i></i> Discounts</label>
      <select name="pricecheck" class="pricecheck form-control border-input">
        <option value="lowtohigh">Price Low to High</option>
        <option value="hightolow">Price High to Low</option>
      </select>
    </div>
  </div>
</section>                  


<!---->
@if(!isset($cat))
<section  class="sky-form">
  <h4 class="cate">Category</h4>
  <div class="row row1 scroll-pane">
    <div class="col col-4">
          <label class="checkbox"><input type="radio" name="cat" class="catcheck ajaxtrigger active" checked value=""><i></i> All</label>
      @foreach($catList as $cat)
      <label class="checkbox"><input type="radio" name="cat" class="catcheck ajaxtrigger" value="{{ $cat->id }}"><i></i>{{ $cat->cat_name }}</label>
      @endforeach
    </div>
  </div>
</section>
@endif
@if(!isset($brand))
<section  class="sky-form">
  <h4 class="cate">Brand</h4>
  <div class="row row1 scroll-pane">
    <div class="col col-4">
          <label class="checkbox"><input type="radio" name="brand" class="brandcheck ajaxtrigger" checked value=""><i></i> All</label>
      @foreach($brandList as $brand)
      <label class="checkbox"><input type="radio" name="brand" class="brandcheck ajaxtrigger" value="{{ $brand->id }}"><i></i>{{ $brand->brand_name }}</label>
      @endforeach
    </div>
  </div>
</section>   
@endif
<section  class="sky-form">
  <h4 class="cate">Price Between</h4>
  <div class="row row1 scroll-pane">
   <div class="col col-2">
   <div class="input-group">
    <input type="number" name="pricefrom" class="form-control border-input ajaxpricetrigger" placeholder="Price From...">
    <span class="input-group-addon" style="font-size: 0.7em;">VNĐ</span>
    </div>
  </div>
  <div class="col col-2">
     <div class="input-group">
  <input type="number" name="priceto" class="form-control border-input ajaxpricetrigger" placeholder="To...">
  <span class="input-group-addon" style="font-size: 0.7em;">VNĐ</span>
      </div>

  </div>
</div>
</section>
</div>
<div class="clearfix"></div>
</div>