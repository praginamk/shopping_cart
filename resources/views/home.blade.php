<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box-container {
  text-align:center;
  width:100%;
  border: 1px solid #999;
  margin: 25px 0; 
  margin-top: 50px;
  padding: 6px 15px 0; 
  .box-id {
    background-color: #eee; 
    display:block;
    padding:6px 15px;
    margin-top: 10px;
  }
  .box-img {
    margin-top: -35px;
    position: relative; 
  }
  .box-price {
    display:inline-block;
    background-color: #3498db;
    border-radius: 0px;
    padding:4px 10px;
    margin: 15px auto 0; 
    color:#fff;
    position:absolute;
    top:0;
    left:0;
    
  }
  .box-title {
    font-size: 14px;
    text-transform: uppercase;
    font-weight:bold;
  } 
  .box-heading {
    margin: 10px 0;
  }
  .btn {
    font-size: 13px;  
  }
  img { 
    display:block; 
    max-width:100%; 
  }
  
}
    </style>
</head>
<body>
<div class="container">
<li class="nav-item ">
          <a href="{{ route('viewMyCart')}}" 
          class="nav-link {{ request()->is('admin') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-star"></i>
              <p>
             Cart
              </p>
            </a>
          </li>
<div class="row">
    @foreach($products as  $product)
    <div class="col-sm-3">
    <div class="box-container"> 
      <div class="box-img"> 
        <img src="{{asset('uploads/product/images/'.$product->image )}}" />
        <div class="box-price">$ {{$product->price }} </div>
      </div>
      <h4 class="box-title">{{$product->name }} </h4>  
     
      <div class="box-btns">
        <a class="btn btn-primary text-uppercase" href="{{url('product-view/'.$product->id)}}">view</a>
      </div>

    </div>
  </div> 

    @endforeach
 
</div>
  </div>






</body>
</html>