  @extends('templates.admin.master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="title">Add Product</h2>
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary btn-xs pull-left" style="display: block"><b> Back to Product Page</a> 
    </div>
</div>           
              <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <form action="" method="post"  enctype='multipart/form-data'>
                                {{ csrf_field() }}
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Tên bạn bè" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Short Description</label>
                                                <textarea name="desc" rows="4" class="form-control border-input" placeholder="Mô tả ngắn gọn bạn bè">{{ old('desc') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Product Detail</label>
                                                <textarea name="detail" rows="4" class="form-control border-input" placeholder="Chi tiết bạn bè">{{ old('detail') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Picture</label>
                                                <input type="file" name="picture" class="form-control" placeholder="Chọn ảnh" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Product Category</label>
                                                <select name="friendlist" class="form-control border-input">
                                                    <option value="">434</option>
                                                    <option value="">434</option>
                                                    <option value="">434</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Add Product" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@stop