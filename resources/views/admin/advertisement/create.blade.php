  @extends('templates.admin.master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="title">Add Advertisement</h2>
        <a href="{{ route('admin.advertisement.index') }}" class="btn btn-primary btn-xs pull-left" style="display: block"><b> Back to Management Page</a> 
    </div>
</div>           
              <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <form action="{{ route('admin.advertisement.store') }}" method="post"  enctype='multipart/form-data'>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Advertisement Title</label>
                                                <input type="text" name="title" class="form-control border-input" placeholder="Advertisement Title" value="{{ old('title') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Advertisement Link</label>
                                                <input type="text" name="link" class="form-control border-input" placeholder="Advertisement Link" value="{{ old('link') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Advertisement Short Description</label>
                                                <textarea name="desc" rows="4" class="form-control border-input" placeholder="Advertisement Description">{{ old('desc') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Advertisement Image</label>
                                                <input type="file" name="picture" class="form-control border-input">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Add Advertisement" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@stop