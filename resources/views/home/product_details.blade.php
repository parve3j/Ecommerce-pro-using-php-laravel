<!DOCTYPE html>
<html>
    <head>
        <base href="/public">
    @include('home.head')
    </head>
   <body>
      <div class="hero_area">
          @include('home.header')
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px; " >
                  <div class="box">
                     <div class="option_container">
                 
                     </div>
                     <div class="img-box" >
                        <img height="300px" width="250px" src="productimage/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box" style="padding-top: 30px;">
                        <h5>
                        {{$product->title}}
                        </h5>
                        <h6>
                           ${{$product->price}}
                        </h6>
                        <h6>Product Category: {{$product->category}}</h6>
                        <h6>Product Details: {{$product->description}}</h6>
                        <h6>Product Quantity: {{$product->quantity}}</h6>

                        <a href="{{url('add_cart',$product->id )}}" class="btn btn-primary" >Add to cart</a>
                     </div>
                  </div>
               </div>
      @include('home.footer')
      @include('home.footer_end')
      @include('home.script')
   </body>
</html>