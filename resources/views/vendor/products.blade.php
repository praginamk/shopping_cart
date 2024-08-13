@extends('layout')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
              
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('products-create')}}">Add</a></li>
             
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
                        <p style="text-align: center;margin-bottom: 0;"><strong></strong> {{ session()->get('message')  }}.</p>
                    </div>
                @endif
                @if(session()->has('err_message'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="text-align: center;margin-bottom: 0;"><strong></strong> {{ session()->get('err_message')  }}.</p>
                    </div>
                 @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif
            </div>
        </div>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">       
          
           <div class="card">
                
                <div class="card-body">
                     <table id="example" class="table table-striped table table-bordered" style="width:100%" >
                     
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td> <img src="{{asset('uploads/product/images/'.$product->image )}}" style="height:50px ;width:50px">  </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>

    </div>

    </div>
    
  </section>
<br><br>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
   
@endsection
