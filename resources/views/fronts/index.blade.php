@extends('fronts.master')


@section('content')



{{-- side baar start --}}

@include('fronts.incl.nav')



<?php
            $promoteSubCategory = \App\subCategory::where('status', 1)->get();
        ?> 
      

<!-- product contant start -->
<!-- product-item-1-start -->
@foreach($promoteSubCategory as $v_promoteCategory)
<div class="container" id="product_item" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-2 col-sm-12 " id="product_menu">
            <ul class="nav flex-column">
                
                 <li class="nav-item">
                    <a class="nav-link active" href="">{{ $v_promoteCategory->subCategory_name }}</a>
                </li>
                @foreach($v_promoteCategory->thirdCategory as $v_subCategory)

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('category-view-product') }}/{{ $v_subCategory->id }}"> {{ $v_subCategory->thirdCategoryName }}</a> 

                </li>
                @endforeach

                {{-- @endforeach --}}
               
            </ul>


        </div>
            <?php
            $oneCategory = $v_promoteCategory->products;


        ?>
  

        {{-- <div class="col-md-4 col-sm-12  " id="product_slider">

            <!-- slider start -->

            <div class="card" width="300px" heighr="480px">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <!-- + -->
    
                

                    <div class="carousel-inner">
                         @php
                            $subID = $v_promoteCategory->id;
                            $photo = App\photo::where('promote_id', $subID)->get();
                        @endphp 
                      
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('/')}}front/images/t-shart-1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item ">
                            <img class="d-block w-100" src="{{asset('/')}}front/images/t-shart-1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item ">
                            <img class="d-block w-100" src="{{asset('/')}}front/images/t-shart-1.jpg" alt="First slide">
                        </div>

                    </div>
                    
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- pdocut slider start -->

        </div> --}}
        <div class="clear"></div>
        <div class="col-md-10 col-sm-12" id="product_items">
            <div class="container">
               {{-- <div class="row">

                  @foreach($oneCategory->take(6) as $v_categoryProduct)
                        
                 @if($v_categoryProduct->status == 1)
                
                 <div class="card  padding-zero product-hover-effect" style="height:251px; width:182px; ">
                <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}">

                        <img class="card-img-top" src="{{ asset('upload/product') }}/{{ $v_categoryProduct->image  }}" alt="Card image cap"> 
                        <div class="card-body text-center">
                 
                            {{-- <p class="card-text text-center text-primary font-weight-bold">৳ {{ $v_categoryProduct->price }}
                            </p> --}}
                             {{-- <div class="btn-group product_details" role="group" aria-label="Basic example" style="">
                             <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}" style=" color: #f15b2c;
    font-weight: 700;
    text-decoration: none;">
                              {{ str_limit( $v_categoryProduct->product_name, 30) }} 
                              <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">{{ $v_categoryProduct->price }} <del style="color:red"> 1790</del>                                             </span>
                        
                              <span class="col-sm-6  col-xs-6 text-center" style="padding: 0;display: block;height: 30px;line-height:28px;font-size: 12px;font-weight: bold;background: #ff6a00; float: right;">
                          
                           
                           <form action="" method="post">
                                    <input type="hidden" value="209" name="product_id">
                                     <input type="hidden" value="1490" name="product_price">
                                    <input id="product_buy_item_quantity-value209" type="hidden" name="product_buy_item" value="1">
                                    <input type="submit" value="Order Now" style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">
                                </form>
                                
                           
                            </span>
                            
                             <span onclick="ProductAddTwoCart(209)" class="product-fly  col-sm-6  col-xs-6 text-center" style="cursor:pointer;padding: 0;display: block;height: 30px;line-height:28px;color: #fff;font-size: 12px;font-weight: bold;background: #FF9400;">
                        Add To Cart
                            </span>
                                </a>
                            </div>
                        </div> 
                        
                    </div>
                </a>

                  @endif
                  @endforeach
                  </div>
--}}
                    {{-- new card --}}
                    <div class="row">
                        @foreach($oneCategory->take(10) as $v_categoryProduct)
                                    
                        @if($v_categoryProduct->status == 1)
                        <div class="card col-xs-2  " style="padding: 5px;height:251px; width:182px;">
                                <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                                   
                                
                                <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}" style="display: block;padding: 0px;height: 160px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="#" id="209">
                                        <img class="responsive zoomEffect" style="margin: 0 auto;padding:5px ;    width: 168px;"  src="{{ asset('upload/product') }}/{{ $v_categoryProduct->image  }}">
                                    </a>
            
            
                                     <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                                    <span id="productName209" class="col-sm-12 text-center" style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;"> {{ str_limit( $v_categoryProduct->product_name, 20) }}</span>
            
                                     <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">{{ $v_categoryProduct->offer_price }} <del style="color:red"> {{ $v_categoryProduct->price }}</del>                                             </span>
                                    
                                      <span class="col-sm-6  col-xs-2 text-center" style="padding: 0;display: block;height: 30px;line-height:28px;font-size: 12px;font-weight: bold;background: #ff6a00; float: right;">
                                  
                                   
                                
                                      <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}"  style="background:none;border: none;margin: 0;padding: 0;font-weight:bold;color:#fff">Order </a>
                                   
                                        
                                   
                                    </span>
                                    
                                     <span onclick="ProductAddTwoCart(209)" class="product-fly  col-sm-6  col-xs-2 text-center" style="cursor:pointer;padding: 0;display: block;height: 30px;line-height:28px;color: #fff;font-size: 12px;font-weight: bold;background: #FF9400;">
                                Add To Cart
                                    </span>
                                        </div>
                                    
                                    
                                </div>
                            </div>
                            @endif
                            @endforeach
                   
            </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- <div class="container">
    <div class="row">
            @foreach($oneCategory->take(6) as $v_categoryProduct)
                        
            @if($v_categoryProduct->status == 1)
            <div class="card col-xs-2  " style="padding: 5px;height:251px; width:182px;">
                    <div class="col-sm-12 col-xs-12 padding-zero product-hover-effect" style="background-color: #fff;padding: 0px;border: 1px solid #c6c6c6;">
                       
                    
                    <a href="{{ url('prductView') }}/{{ $v_categoryProduct->slug }}" style="display: block;padding: 0px;height: 160px;overflow: hidden;" class="img-hover col-sm-12 padding-zero" href="#" id="209">
                            <img class="img-responsive zoomEffect w-100" style="margin: 0 auto;padding:5px"  src="{{ asset('upload/product') }}/{{ $v_categoryProduct->image  }}">
                        </a>


                         <div class="col-sm-12 col-xs-12" style="padding:0;background: cornsilk;">
                        <span id="productName209" class="col-sm-12 text-center" style="padding: 2px;overflow: hidden;height: 20px;font-size: 12px;display: block;color:#525252;font-weight: bold;"> {{ str_limit( $v_categoryProduct->product_name, 30) }}</span>

                         <span id="productPrice209" class="col-sm-12  col-xs-12 text-center" style="padding: 0;display: block;height: 23px;line-height:28px;color: #355088;font-size: 14px;font-weight: bold">{{ $v_categoryProduct->price }} <del style="color:red"> 1790</del>                                             </span>
                        
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

<!-- product-item-1-end-->
<div class="clear"></div>


    
@endsection

