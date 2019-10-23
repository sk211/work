@include('fronts.incl.header')
<!-- banner -->
<div class="inner_page-banner one-img">
</div>
<!--//banner -->
<!--show Now-->
<section class="contact py-lg-4 py-md-3 py-sm-3 py-3" id="products">
   <div class="container py-lg-5 py-md-4 py-sm-4 py-3" id="product_cart">
      <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3"> Shop</h3>

      <h4 class="bg-warning">Search Result</h4>
      <p>{{ $searchProduct->count() }}s result for </p>
      <div class="row">

         <div class="left-ads-display col-lg-12" id="product_id">
            <div class="row">
            @foreach($searchProduct as $v_allProduct)
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

                           <span class="product-new-top">New</span>
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
                              <div class="toys single-item hvr-outline-out">
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
                              </div>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
            </div>
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