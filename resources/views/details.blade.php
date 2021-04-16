@extends('main')
@section("content")
<div class="container">
   <div class="row">
       <div class="col-sm-6">
       <img class="detail-img" src="{{$products['gallery']}}" alt="">
       </div>
       <div class="col-sm-6">
           <a href="/product">Go Back</a>
       <h2>{{$products['name']}}</h2>
       <h3>Price : {{$products['prise']}}</h3>
       <h4>Details: {{$products['discription']}}</h4>
       <h4>category: {{$products['category']}}</h4>
       <br><br>
       <form action="/add_to_cart" method="POST">
           @csrf
           <input type="hidden" name="product_id" value={{$products['id']}}>
       <button class="btn btn-primary">Add to Cart</button>
       </form>
       <br><br>
       <a href="/ordernow"><button class="btn btn-success">Buy Now</button></a>
       <br><br>
    </div>
   </div>
</div>
@endsection