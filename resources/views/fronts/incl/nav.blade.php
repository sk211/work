
		
		
			
			 <!-- slider_sidbaar start -->
		<section id="slider_sidbar " class="padding_0 container">
			<div class="slider_sidbar">
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-12  padding_0" id="sidebar_nav">
						<!-- start sidebar start -->
						
			
			
			{{-- side baar start --}}
			
			
			
			<div id="wrapper">
				<div id="holder">
				
				
					
				
					@foreach($allcategory as $v_allcategory)
					<div id="vfx">
						<ul class="using">
								
							<li class="pad" style="border-bottom: 1px solid #fff"><a href="#"><span >{{ $v_allcategory->category_name }}</span></a>
								<ul>
								<div class="sub-wrapper-vfx">
									<div class="sub-con">
										<div class="sub-hol">
									@foreach($v_allcategory->subCategory as $value)
											<div class="sub-l">
<h3><a href="{{ url('/sub-category') }}/{{ $value->id }}">{{ $value->subCategory_name }}</a></h3>
												
											@foreach($value->thirdCategory as $my )
												<ul>
						<li><a href="{{ url('/sub-category-last') }}/{{ $my->id }}">{{ $my->thirdCategoryName }}</a></li>
												</ul>
												@endforeach
											</div>
										@endforeach
										
										</div>
									</div>
								</div>
							   </li>	
							  </ul>	
					</div>
					@endforeach
				
			
					<!-- sub-end -->
						<!-- sub menu -->
	<div id="ghihosozza">
			<ul class="using">
				<li class="pad" style="border-bottom: 1px solid #fff">
					<a href="{{ url('/allcategorynav') }}"><span onMouseOver="this.style.color='#333'"
						onMouseOut="this.style.color='#fff'">সকল শপিং ক্যাটাগরি <i class="fas fa-angle-double-right"></i></span></a>
					<ul>
				   </li>	
				  </ul>	
			</ul>
		</div>
				
							<!-- sub-end -->
						
					
				
					
				</div>
			</div>
				 {{-- side bar end --}}
			
			
						<!-- start sidebar end -->
				 </div>
					
			
			
			
			
		
					<!-- start sidebar end -->
		
				<div class="col-md-10 col-sm-10 col-xs-12 padding_0" id="slider" style="background:#FFEFCF">
					<!-- slider start -->
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						
							@foreach($allbanner as $key => $value)
							<li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
							@endforeach
							
							
						</ol>
						<div class="carousel-inner">
							@foreach($allbanner as $key => $v_value)
							<div class="carousel-item{{ $key == 1 ? ' active' : '' }}">
			<img class="d-block w-100" src="{{ asset('upload/banner') }}/{{ $v_value->image }}" alt="First slide">
							</div>
							@endforeach
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

		
					<!-- pdocut slider start -->
		
					
		
					<div class="container-fluid padding-0" id="hot_deal">
		
		
						<div class="row">
		
		
		
							<div class="owl-carousel owl-theme" >
							@foreach($promotedProduct as $v_promotedProduct)
								<div class="item">
									<div class="card" >
										<a href="#" >
										<a href="#">
		<img src="{{ asset('upload/product') }}/{{ $v_promotedProduct->image }}" alt="card image" class="card-img-top">
										<div class="card-body text-center">
											<a href="{{ url('prductView') }}/{{ $v_promotedProduct->slug }}"><span class="text-center font-weight-bold"> {{ str_limit($v_promotedProduct->product_name, 20) }}</span></a>
											<p class="card-text text-center text-primary font-weight-bold">৳ {{ $v_promotedProduct->price }}
											</p>
											</a>
											</a>
										  
										</div>
									</div>
								</div>
							@endforeach
							</div>
					 </div>
					</div>
					<!-- Item slider end-->
					<!-- pdocut slider end -->
				</div>
				</div>
		
		</section>
		
		
			 {{-- end slider --}}
		