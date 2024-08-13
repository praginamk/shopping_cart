@extends('layout')

@section('content')
<div class="main-content">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!--<h1 class="m-0 text-dark"> Pooja </h1>-->
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin')}}"> Home </a></li>
                            <li class="breadcrumb-item active"> product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="row">
            <div class="col-md-10 offset-md-2">
                @if(session()->has('message'))

                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><strong>Well done!</strong> {{ session()->get('message')  }}.</p>
                    </div>

                @endif
                @if(session()->has('err_message'))

                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><strong>Oh Snap!</strong> {{ session()->get('err_message')  }}.</p>
                    </div>

                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 style="float:left;">Edit Product</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ url('products_update/'.$product->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name*</label>
                                            <input required type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Name" value="{{ old('name',$product->name) }}" />
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price*</label>
                                            <input required type="number" class="form-control" id="price" name="price"
                                                placeholder="Enter Price" value="{{ old('price',$product->price) }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Quantity</label>
                                            <input required type="number" class="form-control" id="quantity"
                                                name="quantity" placeholder="Enter quantity"
                                                value="{{ old('quantity',$product->quantity) }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Image</label>
                                            <input  type="file" class="form-control" id="file" name="image" />
                                        </div><br>
                                        <img src="{{asset('uploads/product/images/'.$product->image )}}" style="height:50px ;width:50px">  
                                        <div class="form-group">
                                            <label >Status</label><br>
                                      <input type="radio"  name="status" value="1" >
                                       <label for="html">Available</label><br>
                                          <input  type="radio"name="status" value="0">
                                        <label for="css">Not Available</label><br>
                                    </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection