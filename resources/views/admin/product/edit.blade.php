  @extends('templates.admin.master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="title">Edit: {{ $product->pname }}</h2>
        <div class="form-group">
            <label>Rating: {{ $product->rating }}|| View: {{ $product->view }}</label>
        </div>
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary btn-xs pull-left" style="display: block"><b> Back to Management Page</a> 
    </div>
</div>           
              <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <form action="{{ route('admin.product.update',['id'=>$product->id]) }}" method="post"  enctype='multipart/form-data'>
                                {{ csrf_field() }}{{ method_field('PUT') }}
                                 @if (count($errors) > 0)
                                 <div class="row">
                                 <div class="col-md-12">
                                            @foreach ($errors->all() as $error)
                                                <p class="category danger alert alert-danger">{{ $error }}</p>
                                            @endforeach
                                    </div>
                                    </div>
                                @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Product Name" value="{{ $product->pname }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Product Price</label>
                                                <div class="input-group">
                                                    <input type="text" name="price" class="form-control" placeholder="Product Price" value="{{ $product->price }}">
                                                    <span class="input-group-addon">VNĐ</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <div class="input-group">
                                                    <input type="text" name="discount" class="form-control border-input" placeholder="Discount" value="{{ $product->discount*100 }}">
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product's Tags</label>
                                                <input type="text" name="tags" id="tags" class="form-control border-input" placeholder="Enter product's tags here, separated by comma" value="{{ $product->tags }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category" class="category form-control border-input">
                                                    <option value="0">Choose product's category</option>
                                                    @foreach($catList as $item)
                                                        <option value="{{ $item->id }}" {{ ($item->id == $product->cat_id ? 'selected':'') }}>{{ $item->cat_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <select name="brand" class="brand form-control border-input">
                                                    <option value="0">Choose product's brand</option>
                                                    @foreach($brandList as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id==$product->brand_id?'selected':'' }}>{{ $item->brand_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                     <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Thumbnail Image</label>
                                                <img src="/storage/app/public/{{ $product->image }}" alt="" class="form-control border-input" style="width:auto;height:250px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Thumbnail Image <small style="display: block">(Suggest Dimension: 16:9 Vertical Ratio, JPG is favourable)</small></label>
                                                <input type="file" name="picture" class="form-control border-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                     <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Current Image List</label>
                                                @php
                                                    $imageList = App\ImageList::where('product_id',$product->id)->get();
                                                    if($imageList->count()==0){
                                                        $imageList = false;
                                                    }
                                                @endphp
                                                @if($imageList)
                                                <div class="form-control border-input" style="height:auto">
                                                @foreach($imageList as $image)
                                                {{-- {{ dd($image) }} --}}
                                                <img src="/storage/app/public/{{ $image->picture }}" alt="" class="" style="width:32%;height:auto">
                                                @endforeach
                                                </div>
                                                @else
                                                <br><small class="form-control">This product dont have an image list yet. Please add one.</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>New Image List<small style="display: block">(Should be 3 images, Suggest Dimension: 16:9 Vertical Ratio, JPG is favourable)</small></label>
                                                <input type="file" name="pictureList[]" class="form-control border-input" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Description</label>
                                                <textarea name="desc" rows="4" class="form-control border-input" placeholder="Product Description">{{ $product->preview }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Detail</label>
                                                <textarea name="detail" rows="4" class="form-control border-input" placeholder="Product Detail">{{ $product->detail }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Spec</label>
                                                <textarea name="spec" rows="4" class="form-control border-input" placeholder="Product Spec">{{ $product->spec }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Save" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@stop