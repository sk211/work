@include('fronts.incl.header')

<!-- product order header top -->
@push('css')
<style>

</style>
@endpush
<div class="container" id="product_location">
    <div class="row">
        <div class="col-md-7">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb font-weight-bold">
                    <li class="breadcrumb-item"><a href="#">Bed sheet </a></li>
                    <li class="breadcrumb-item "><a href="#">4 ps </a></li>
                    <li class="breadcrumb-item active" aria-current="page">3 ps</li>
                </ol>
            </nav>

        </div>
        <div class="col-md-5">

        </div>
    </div>

</div>

<!-- product order header top -->

<!-- product image and title -->

<!-- product page header -->
<div class="container" id="product_dec">
    <div class="row">
        <h4 class=" col-md-12 py-2 text-white">
            টি-শার্ট
        </h4>
    </div>
</div>




<div class="container" id="product_zoom">
    <div class="row">
        <div class="col-md-6">
                 
                  <div class="exzoom" id="exzoom">
                    <!-- Images -->
                    <div class="exzoom_img_box">
                        
                      <ul class='exzoom_img_ul'>
                      @if($images)
               @foreach($images as $img)
                        <li>
                            <img src="{{ asset('upload/ami') }}/{{ $img }}" xoriginal="./images/three-pcs/threepic.jpg"/>
                        </li>
             @endforeach
                    @endif
                      </ul>
                    </div>
                    <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                    <div class="exzoom_nav"></div>
                    <!-- Nav Buttons -->
                    <p class="exzoom_btn">
                        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                    </p>
                  </div>
                  </div>
     
        <div class="col-md-6" id="order_content">
            <div class="row">
                <div class="col-md-6">
                    <h4> Product Price:৳  {{ $singleProduct->price }}</h4>
                    <p>Product Code : {{ $singleProduct->product_code }} </p>

                    <p>Select Quantity : {{ $singleProduct->quantity }}</p>
                    <div class="center">

                        <div class="input-group input-group-prepend" role="group" aria-label="Basic example" id="input_count">
                            <span class="input-group-btn">
                                <button type="button" id="subtract" class="btn btn-danger btn-number">
                                    <span class="glyphicon glyphicon-minus">-</span>
                                </button>
                            </span>
                            <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100" id="counter">
                            <span class="input-group-btn">
                                <button type="button" id="add" class="btn btn-success btn-number">
                                    <span class="glyphicon glyphicon-plus">+</span>
                                </button>
                            </span>
                        </div>
                        <p></p>
                    </div>
                </div>

            {{-- <form action="{{ url('cartSave') }}" method="POST"> --}}
            <form id="addForm" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $singleProduct->id }}">
                    <input type="hidden" name="promote" value="{{ request()->reff }}">

                <div class="col-md-6">
                    
                    <button class="itemDelete btn btn-danger">Add to cart</button>
 

            <a href="{{ url('/cart') }}" class="btn btn-warning" style="width: 231px; margin-top: 10px;">Order Now</a> <br>
                </div>
            </form>

            </div>
            <div class="row" id="prodcut_p_contant">
                <div id="product_img">
                    <img src="{{asset('/')}}front/./images/call-now (1).gif" alt="">

                </div>
                <div id="contract">
                    <h4>01797587488</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product image and title end -->



<!-- produt desctiption and review start -->

<div class="container" id="product_dec">
    <div class="row">
        <div class="col-md-6 padding_0">
            <h4 class=" text-light py-2">
                <i class="fas fa-chart-bar" style="color: #fff"></i>
                Product Details
            </h4>
            <ul class="padding_0">
                <li><i class="fas fa-chevron-right"></i>{{ $singleProduct->details }} </li>
              
            </ul>
        </div>
        <div class="col-md-6 padding_0" id="review">
            <h4 class="bg-warning text-light py-2">
                <i class="fas fa-chart-bar" style="color: #fff"></i>
                <span class="a-icon-alt">5 stars</span>
                Review
            </h4>
            
        </div>
    </div>
</div>

<!-- produt desctiption and review end -->

<!-- produt desctiption and review start -->

<div class="container" id="product_dec">
    <div class="row">
        <div class="col-md-6 padding_0">
            <h4 class=" text-light py-2">
                <i class="fa fa-bus" style="color: #fff"> </i>
                Delivery and Payment
            </h4>
            <ul class="padding_0">
                <h5> আপনি ঢাকা সিটির ভীতরে হলেঃ-</h5>
                <li><i class="fas fa-chevron-right"></i>ক্যাশ অন ডেলিভারি/হ্যান্ড টু হ্যান্ড ডেলিভারি।</li>
                <li><i class="fas fa-chevron-right"></i>ডেলিভারি চার্জ ৬০ টাকা।</li>
                <li><i class="fas fa-chevron-right"></i>পণ্যের টাকা ডেলিভারি ম্যানের কাছে প্রদান করবেন।</li>
                <li><i class="fas fa-chevron-right"></i>অর্ডার কনফার্ম করার ৪৮ ঘণ্টার ভিতর ডেলিভারি পাবেন।</li>
                <li><i class="fas fa-chevron-right"></i>বিঃদ্রঃ- ছবি এবং বর্ণনার সাথে পণ্যের মিল থাকা সত্যেও আপনি পণ্য গ্রহন করতে না চাইলে ডেলিভারি চার্জ ৬০ টাকা ডেলিভারি ম্যানকে প্রদান করতে বাধ্য থাকিবেন।</li>
            </ul>
        </div>
        <div class="col-md-6 padding_0" id="review">
            <h4 class=" text-light py-2">
                <i class="fas fa-chart-bar" style="color: #fff"></i>

            </h4>
            <ul class="padding_0">
                <h5> আপনি ঢাকা সিটির বাহিরে হলেঃ-</h5>
                <li><i class="fas fa-chevron-right"></i>কন্ডিশন বুকিং অন কুরিয়ার সার্ভিস (জননী কুরিয়ার অথবা এস এ পরিবহন কুরিয়ার সার্ভিস) এ নিতে হবে।</li>
                <li><i class="fas fa-chevron-right"></i>কুরিয়ার সার্ভিস চার্জ ১০০ টাকা বিকাশে অগ্রিম প্রদান করতে হবে।</li>
                <li><i class="fas fa-chevron-right"></i>পণ্যের টাকা ডেলিভারি ম্যানের কাছে প্রদান করবেন।</li>
                <li><i class="fas fa-chevron-right"></i>কুরিয়ার চার্জ ১০০ টাকা বিকাশ করার পর ৪৮ ঘন্টার ভিতর কুরিয়ার হতে পণ্য গ্রহন করতে হবে এবং পণ্যের টাকা কুরিয়ার অফিসে প্রদান করতে হবে।</li>
                <li><i class="fas fa-chevron-right"></i>বিঃদ্রঃ- ছবি এবং বর্ণনার সাথে পণ্যের মিল থাকা সত্যেও আপনি পণ্য গ্রহন করতে না চাইলে কুরিয়ার চার্জ ১০০ টাকা কুরিয়ার অফিসে প্রদান করে পণ্য আমাদের ঠিকানায় রিটার্ন করবেন। আমরা প্রয়োজনীয় ব্যবস্থা নিব।</li>

            </ul>
        </div>
    </div>
</div>

<!-- relate product -->

<div class="container" style="margin-bottom: 60px">
    <div class="row">
        <div class="col-md-12 padding_0 mt-3" id="product_items_1">
            <h4 class=" text-light py-2 mt-3">
                Related Product
            </h4>
        </div>
        <!-- product-item-2 -->
        <div class="col-md-12 padding_0" id="product_items_1">
 <?php
 $cat_third_id = $singleProduct->thirdCategory_id;
 $randomProduct = App\product::where('thirdCategory_id', $cat_third_id)->inRandomOrder()->take(6)->get();
 ?>

            <div class="container">
                <div class="row">
                    @foreach($randomProduct as $v_randomProduct)
                    <div class="card" style="height:276px; width:190px;">
                         <img class="xzoom" id="xzoom-default" src="{{ asset('upload/product') }}/{{ $v_randomProduct->image }}"height="170px">
                        <div class="card-body text-center">
                            <span class="text-center font-weight-bold">{{ $v_randomProduct->product_name }}</span>
                            <p class="card-text text-center text-primary font-weight-bold">
                                {{ $v_randomProduct->price }}
                            </p>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <button class="btn btn-warning btn-small">order</button>
                                <button class="btn btn-danger btn-small">Add to card</button> --}}

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

  


    

</div>
@push('js')


  <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>

<script>
var counter = 0
$("#add").click(function(){
  counter = counter + 1;
    $("#counter").val(counter);

});

//Subtract
$("#subtract").click(function(){
  counter = counter - 1;
  $("#counter").val(counter);
});


// // Reset
// $("#reset").click(function(){
//   counter = 0;
//   $("#counter").text(counter);
// });


</script>
<script>
$( document ).ready(function() {

  $('#addForm').on('submit', function(e){
        e.preventDefault();

            $.ajax({
                    type:"POST",
                    url:"/cartSave",
                    data: $('#addForm').serialize(),
                    success: function (response) {
                        // $(document).on('click', '.itemDelete', function(){
                        Swal.fire({
                          position: 'center',
                          type: 'success',
                          title: 'Product Add To Cart Successfully !',
                          showConfirmButton: false,
                          timer: 1500
                        })
                       // })
                    },
                    error: function (error) {
                        console.log(error);
                      alert("not Add Cart Successfully !")
                    }
            });
    }); 
});

</script>

<script type="text/javascript">
  
</script>


@endpush


@include('fronts.incl.footer')
