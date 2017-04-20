  @extends('templates.admin.master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="title">Edit Payment</h2>
        <a href="{{ route('admin.payment.index') }}" class="btn btn-primary btn-xs pull-left" style="display: block"><b> Back to Product Page</a> 
    </div>
</div>           
              <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <form action="{{ route('admin.payment.update',['id'=>$payment->id]) }}" method="post"  enctype='multipart/form-data'>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Payment Name</label>
                                                <input type="text" name="name" class="form-control border-input" placeholder="Payment name" value="{{ $payment->payment_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Payment Short Description</label>
                                                <textarea name="desc" rows="4" class="form-control border-input" placeholder="Payment Description">{{ $payment->payment_info }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Edit Payment" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@stop