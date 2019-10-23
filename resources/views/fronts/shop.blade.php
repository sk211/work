@include('fronts.incl.header')
<!-- banner -->
<div class="inner_page-banner one-img">
</div>
<!--//banner -->
<!-- short -->
<div class="using-border py-3">
   <div class="inner_breadcrumb  ml-4">
      <ul class="short_ls">
         <li>
            <a href="index.php">Home</a>
            <span>/ </span>
         </li>
         <li>Products</li>
      </ul>
   </div>
</div>
<!-- //short-->
<!--show Now-->
<section class="contact py-lg-4 py-md-3 py-sm-3 py-3" id="products">
   <div class="container py-lg-5 py-md-4 py-sm-4 py-3" id="product_cart">
      <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3"> Shop</h3>

      <h4 class="bg-warning">All Product</h4>
      <div class="row">

         <div class="left-ads-display col-lg-12" id="product_id">
            <div class="row">
               @foreach($allProduct-> take(30) as $v_allProduct)
               <!-- product sesion start -->
               <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}">

               <div class=" col product-men women_two">
                  <div class="product-toys-info">
                     <div class="men-pro-item">
                        <div class="men-thumb-item">

                           <img src="{{ asset('upload/product') }}/{{  $v_allProduct->image }}" class="img-thumbnail " alt="">
                           <div class="men-cart-pro">
                              <div class="inner-men-cart-pro">
                                 <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}" style="text-decoration: none;" href="single.php" class="link-product-add-cart">Quick View</a>
                              </div>
                           </div>

                        </div>
                        <div class="item-info-product">
                           <div class="info-product-price">
                              <div class="grid_meta">
                                 <div class="grid-price mt-2">
                                    <span class="money text-center ">৳ {{  $v_allProduct->price }}</span>
                                 </div>
                                 <div class="product_price">
                                    <h4>
                                       <a href="{{ url('prductView') }}/{{ $v_allProduct->slug }}"> {{ str_limit($v_allProduct->product_name, 10)   }} </a>

                                    </h4>

                                 </div>

                              </div>
                              {{-- <div class="toys single-item hvr-outline-out">
                                 <form action="#" method="post">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="toys_item" value="toys(barbie)">
                                    <input type="hidden" name="amount" value="575.00">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                       <button onclick="window.location.href='single.php'" class="btn btn-warning btn-small">order</button>
                                       <button type="submit" class="toys-cart ptoys-cart btn btn-warning">
                                          Add to cart
                                       </button>

                                    </div>


                                 </form>
                              </div> --}}
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- product sesion end -->
               @endforeach
            </div>
            {{-- <div class="row">
               @foreach($allProduct-> take(30) as $v_allProduct)
                           
               @if($v_categoryProduct->status == 1)
               <div class="card col-xs-2  " style="padding: 5px;height:251px; width:182px;">
                       <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                          
                       
                       <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}" style="display: block;padding: 0px;height: 160px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="#" id="209">
                               <img class="img-responsive zoomEffect w-100" style="margin: 0 auto;padding:5px"  src="{{ asset('upload/product') }}/{{ $v_categoryProduct->image  }}">
                           </a>
   
   
                            <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                           <span id="productName209" class="col-sm-12 text-center" style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;"> {{ str_limit( $v_categoryProduct->product_name, 20) }}</span>
   
                            <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">{{ $v_categoryProduct->offer_price }} <del style="color:red"> {{ $v_categoryProduct->price }}</del>                                             </span>
                           
                             <span class="col-sm-6  col-xs-6 text-center" style="padding: 0;display: block;height: 30px;line-height:28px;font-size: 12px;font-weight: bold;background: #ff6a00; float: right;">
                         
                          
                          <form action="" method="post">
                                   <input type="hidden" value="209" name="product_id">
                                    <input type="hidden" value="1490" name="product_price">
                                   <input id="product_buy_item_quantity-value209" type="hidden" name="product_buy_item" value="1">
                                   <input type="submit" value="Order " style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                               </form>
                               
                          
                           </span>
                           
                            <span onclick="ProductAddTwoCart(209)" class="product-fly  col-sm-6  col-xs-6 text-center" style="cursor:pointer;padding: 0;display: block;height: 30px;line-height:28px;color: #fff;font-size: 12px;font-weight: bold;background: #FF9400;">
                       Add To Cart
                           </span>
                               </div>
                           
                           
                       </div>
                   </div>
                   @endif
                   @endforeach
          
   </div> --}}
         </div>
      </div>
   </div>
</section>
<!-- //show Now-->


<!-- Page Praganation-->

   <div class="container " id="praganation">
      <div class="row">
         <nav aria-label="...">
            <ul class="pagination ">
               <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
               </li>
               <li class="page-item active"><a class="page-link" href="#">1</a></li>
               <li class="page-item ">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
               </li>
               <li class="page-item"><a class="page-link" href="#">3</a></li>
               <li class="page-item">
                  <a class="page-link" href="#">Next</a>
               </li>
            </ul>
         </nav>
      </div>
   </div>



<!-- Page Praganation end-->



@include('fronts.incl.footer')