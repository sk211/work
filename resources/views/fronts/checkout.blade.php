@extends('fronts.master')
@section('content')




         <!-- banner -->
         <div class="inner_page-banner one-img">
         </div>
         <!-- short -->
         
         <!-- //short-->
         <!--Checkout-->  
         <!-- //banner -->
         <!-- top Products -->
         <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
              <div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Hey Customer if you Have Coupon first Use then Do other things</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
   @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

              @if (count($errors) > 0)
                 <div class = "alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                 </div>
              @endif
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Chec<span>kout</span></h3>
                     <form id="updateCartForm" method="POST">
                        @csrf
                     <div class="checkout-right">
                        <h4>Your shopping cart contains: <span>3 Products</span></h4>
                        <table class="table table-bordered">
                           <thead class="thead-dark">
                              <tr>
                                 <th>SL No.</th>
                                 <th>Product</th>
                                 <th>Product Name</th>
                                 <th>Quality</th>
                                 <th>Price</th>
                                 <th>Remove</th>
                              </tr>
                           </thead>
                           <tbody class="productContainer">
                             <?php
                                 $total = 0;
                             ?>
                              @foreach($cartProduct as $key=> $v_cartProduct)
                              <tr class="rem1">
                                 <td class="invert">{{ $key+1 }}</td>
                              <td class="invert-image">
                                 <a href="single.php">
                                    <img src="{{ asset('upload/product') }}/{{  $v_cartProduct->product->image}}" alt=" " class="img-responsive"></a>
                                 </td>
                     <td class="invert">{{ $v_cartProduct->product->product_name }}</td>

                                 <td class="invert">
                                   <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>

                           <input type="number" id="number" name="quantity[]" class="qtyProduct" value="{{ $v_cartProduct->quantity }}" />
                           <input type="hidden" name="product_id[]" value="{{ $v_cartProduct->product_id }}">
                           <input type="hidden" name="cart_id[]" value="{{ $v_cartProduct->id }}">

                                  
                                       <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                              
                                 </td>
                           <td class="invert productPrice"> {{ $v_cartProduct->product->price }}</td>
                                             <td class="invert">
                                                <div class="rem">
                                                   <button type="button" data-id="{{ $v_cartProduct->product_id }}" class="itemDelete btn btn-danger">
                                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                                   </button>
                                                </div>
                                             </td>
                                          </tr>
                                          <?php
                                    $qty = $v_cartProduct->quantity;
                                $price = $v_cartProduct->product->price;
                                $total = $total+($qty* $price)
                              ?>
                              @endforeach
                           </tbody>
                        </table>
                   
                     <div class="updateForm text-center m-4">
                           <button class="btn btn-info">Update Product</button> 
                     </div>  
                     </div>
                     </form>
                     <div class="container">
                        <div class="row">
                           
                     
                     <div class="couponBtn col-md-6 col-sm-12 mt-4">
                          <div class="form-group">
                            <input type="text" id="couponValue" class="form-control" name="coupon"  placeholder="Coupon Name">
                          </div>
                          <button id="coupon" class="btn btn-primary">Submit</button>
                      
                     </div>
                     <div class="checkout-left col-md-6 col-sm-12">
                        <div class="checkout-left-basket ">
                           <h4>Continue to basket</h4>
                           <ul>
                              <li>Subtotal <i>-</i> <span class="subTotal">৳ {{ $total }} </span></li>
                              <li>Coupon Discount <i>-</i> <span class="coupon_discount_amount"> {{ $coupon_discount_amount }} %</span></li>
                            
                              <li> <i>-</i> <span></span></li>
                              <li> <i>-</i> <span></span></li>
<li>Total <i>-</i> <span class="grandTotal">{{ $total-($total*$coupon_discount_amount/100) }}</span></li>
                           </ul>
                        </div>
                        
                     </div>
                  </div>




                        
                        <div class="clearfix"></div>
                        <form action="{{ url('/checkoutValue') }}" method="POST">
                   
                          @csrf
                         
                          <div class="checkOut text-right">
                            <input type="hidden" id="input" name="grandTotal" value="{{ $total-($total*$coupon_discount_amount/100) }}">

                          <button type="submit" id="checkout" class="readyToGo btn btn-primary">CheckOut</button>

                        </div>
                        </form>
                     </div>
                  </div>
               </div>
               <!-- //top products -->
            </div>
      </section>

@endsection
@section('js')


<script src="{{asset('/')}}dashbord/sweetalert2.js"></script>

 <script>
  $(document).on('click', '#coupon', function(){
     var couponValue = $('#couponValue').val();
     window.location.href="{{ url('/cart') }}"+"/"+couponValue;

  }); 

 </script>


 <script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 /////add datat
    $('#updateCartForm').on('submit', function(e){
        e.preventDefault();

            $.ajax({
                    type:"POST",
                    url:"/cartUpdate",
                    data: $('#updateCartForm').serialize(),
                    success: function (response) {
                          alert("Cart Update SuccessFully !");

                     // $('.table').load(location.href + ' .table');

                    },
                    error: function (error) {
                        console.log(error);

                    }
            });
    }); 
 </script>


<script>
   function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
    updateCartTotal();
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
    updateCartTotal();
}
</script>
<script>
$( document ).ready(function() {

$(document).on('click', '.itemDelete', function(){
 // $(".itemDelete").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be Delete this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
         $.ajax(
            {
                url: "/cartDelete/"+id,
                type: 'GET',
                data: {
                    "id": id,
                    "_token": token,
                },
                  success: function (response) {
                           Swal.fire(
                              'Deleted!',
                              'Your Product has been deleted.',
                              'success'
                            )
               $('.table').load(location.href + ' .table');
                // location.reload();
                 updateCartTotal();

                    },
                    error: function (response) {
                      Swal.fire(
                              'oops..!',
                              'Something want wrong !.',
                              'info'
                            )
                    }
            });
         }
      });
    });
});

</script>


<script>
   ///shiping



   ////quantity Element
   var quntityInput = document.getElementsByClassName('qtyProduct')
for (var i = 0; i < quntityInput.length; i++){
  var input = quntityInput[i]
  input.addEventListener('change', quantityChange)

}

function quantityChange(event){
    var input = event.target
    if(isNaN(input.value) || input.value <= 0){
       input.value = 1
      
    }
  updateCartTotal();
  }

function updateCartTotal() {
     var cartContainer = document.getElementsByClassName('productContainer')[0]
    var cartRows = cartContainer.getElementsByClassName('rem1')
      var total = 0;
      var granTotal = 0;
    var cartRow;
    for (var i = 0; i < cartRows.length; i++) {
      var cartRow = cartRows[i]
      var priceElement =cartRow.getElementsByClassName('productPrice')[0]
      var qtyElement =cartRow.getElementsByClassName('qtyProduct')[0]
      var price = priceElement.innerText
      var qauntity = qtyElement.value
      var total = total +(price*qauntity)
      // console.log(total);
    }

    
    // document.getElementById("tumi").value = qauntity;

    document.getElementsByClassName('subTotal')[0].innerText = "৳"+total
    var primaryTotal = document.getElementsByClassName('grandTotal')[0]
    var couponPrice = document.getElementsByClassName('coupon_discount_amount')[0]
    var ggTotal = primaryTotal.innerText;
    var coupon= couponPrice.innerText.replace('%', '');

    var innerText = total-(total*coupon/100);


    // document.getElementById('hidden_field_id').value
   var totalSubTotal = Number(total);
   var coupon_discount = document.getElementsByClassName('coupon_discount_amount')[0].value; 

    // $('#grand_total').html(parseFloat(final_grand_total).toFixed(2));
    document.getElementsByClassName('grandTotal')[0].innerText = innerText;
console.log(grandTotal);


}

</script>


@endsection

