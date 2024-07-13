<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach ($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details', $product->id)}}" class="option1">
                           Product Details
                           </a>
                           <a href="" class="option2">
                            <form action="{{url('add_cart',$product->id )}}" method="POST">
                              @csrf
                              <div class="row" >
                                 <div class="" >
                                 <input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}">
                                 </div>
                                 <div class="" >
                                 <input type="submit" value="Add To Cart">
                                 </div>
                              </div>
                            </form>
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="productimage/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$product->title}}
                        </h5>
                        <h6>
                           ${{$product->price}}
                        </h6>
                     </div>
                  </div>
               </div>
               @endforeach
               <span style="padding-top: 20px;" >
                  {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
               </span>
            </div>
         </div>
      </section>