@extends('dashbord.master')
 @push('css')
  <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
  <link href="{{asset('/')}}dashbord/editor.css" type="text/css" rel="stylesheet"/>
 @endpush
@section('content')
<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> 
    </div>
    <div class="row">
      <div class="col-12">
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
        <div class="card">
          <div class="card-body">
                 <form action="{{ url('productUpdate', $singleProduct->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-8">

          {{-- <textarea name="bodrrry" id=""></textarea>  --}}
           <div class="form-group">
    <label for="exampleFormControlTextarea1">Product Details : </label>
    <textarea class="form-control" name="details" id="exampleFormControlTextarea1" style="height:400px !important;" rows="3" placeholder="Write Something About This product.." required="">
      {{ $singleProduct->details }}
    </textarea>
  </div>
                    </div>
                        <div class="col-md-4">
        <div class="card">
          <div class="card-body">
          

{{-- @foreach($category_list as $v_cat_list)
                    <option
                        @foreach($post_view->categories as $postCategory)
                            {{$postCategory->id == $v_cat_list->id ? 'selected' : '' }}
                        @endforeach
                     value="{{$v_cat_list->id}}"

                     >{{$v_cat_list->category_name}}

                   </option>
@endforeach --}}









  
   <div class="form-group">
    <label for="category_id">Category :</label>
    <select class="form-control" name="category_id" id="category_id">
      <option>--Select Category--</option>
      @foreach($allcategory as $v_allcategory)
      <option 

{{$singleProduct->category_id == $v_allcategory->id ? 'selected' : '' }}

      value="{{ $v_allcategory->id }}">
        {{ $v_allcategory->category_name }}
      </option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="subCategory_id">Sub Category :</label>
    <select class="form-control" name="subCategory_id" id="subCategory_id">
      <option>--Select SubCategory--</option>
      @foreach($allsubCategory as $v_allthirdCategory)
      <option 
{{$singleProduct->sub_category_id == $v_allthirdCategory->id ? 'selected' : '' }}
      value="{{ $v_allthirdCategory->id }}">
        {{ $v_allthirdCategory->subCategory_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="thirdCategory_id">SubCategory Category :</label>
    <select class="form-control" name="thirdCategory_id" id="thirdCategory_id">
      
     @foreach($allthirdCategory as $v_allthirdCategory)
      <option
{{$singleProduct->thirdCategory_id == $v_allthirdCategory->id ? 'selected' : '' }}
       value="{{ $v_allthirdCategory->id }}">
        {{ $v_allthirdCategory->thirdCategoryName }}
      </option>
      @endforeach
    </select>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Product Name :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $singleProduct->product_name }}"  name="product_name">
  
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Product Price :</label>
    <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $singleProduct->price }}">
 
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">offer Price :</label>
    <input type="number" name="offer_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $singleProduct->offer_price }}">
 
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Product Code :</label>
    <input type="text" name="product_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $singleProduct->product_code}}">
 
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Product Quantity :</label>
    <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $singleProduct->quantity }}">
 
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Product Image:</label>
    <input type="file" class="form-control" name="image" value="{{ $singleProduct->image }}">
  </div> 
  <button type="submit" class="formsd btn btn-primary">Submit</button>

          </div>
        </div>
     </div>
                    </div>
                  </form>
          </div>
        </div>
      </div>
    </div>
</div> 
@endsection

@push('js')

<script src="{{asset('/')}}dashbord/jquery.dataTables.js"></script>
<script src="{{asset('/')}}dashbord/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dashbord/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}dashbord/demo.js"></script>
<script src="{{asset('/')}}dashbord/editor.js"></script>
<!-- page script -->
<script>
      $(document).ready(function() {
        $("#txtEditor").Editor();

      });
    </script>






  <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
<script>
$(document).ready(function() {
    $('#category_id').change(function(){
      var category_id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   $.ajax({
        type:'POST',
        url:'/categorySellerTosub',
        data: {category_id:category_id},
        success: function (data) {
          $('#subCategory_id').html(data);
        }
      });
    });
});

$(document).ready(function() {
    $('#subCategory_id').change(function(){
      var subCategory_id = $(this).val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   $.ajax({
        type:'POST',
        url:'/subCategorySellerTothird',
        data: {subCategory_id:subCategory_id},
        success: function (data) {
          // alert(data);
          $('#thirdCategory_id').html(data);
        }
      });
    });
});


</script>
@endpush

