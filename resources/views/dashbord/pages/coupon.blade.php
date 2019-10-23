
@extends('dashbord.master')

@section('title')
   | All Category
@endsection
 @push('css')
 <link rel="stylesheet" href="{{asset('/')}}dashbord/editor.css">
 @endpush

@section('content')
   <!-- Left side column. contains the logo and sidebar -->
   @section('das_title')

@endsection
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
<div class="container" id="order_list">
  <div class="row">
      <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
      <thead class="thead-dark ">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Coupon Name</th>
          <th scope="col">Coupon Discount</th>
          <th scope="col">Valid Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
        <tbody>
          @foreach($allCoupon as $key => $v_coupon)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $v_coupon->coupon_name }}</td>
            <td>{{ $v_coupon->coupon_discount }} %</td>
            <td>{{ $v_coupon->valid_date }}</td>
            <td>
              <button class="btn btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
 
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <form action="{{ url('/couponSave') }}" method="POST">
              @csrf
               <div class="form-group">
    <label for="exampleInputEmail1">Coupon Name :</label>
    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Name" name="product_name" required="">
  
  </div> 
   <div class="form-group">
    <label for="exampleInputEmail1">Coupon Discount :</label>
    <input type="number" name="coupon_discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Discount" required>
 
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Valid Date :</label>
<div class="input-group date datepicker" data-provide="datepicker">
    <input type="text" name="valid_date" class="form-control" placeholder="Select Date" required>
    <div class="input-group-addon">
      
    </div>
</div>
 
  </div>
  <button type="submit" class="formsd btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
  
    
  
 
  
@endsection
@push('js')
<script>
   $('.datepicker').datepicker({
    format: 'yyyy/mm/dd',
    startDate: '-3d'
});
    </script>
<script src="{{asset('/')}}dashbord/editor.js"></script>


<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>



  <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
<script>
$( document ).ready(function() {

$(document).on('click', '.itemDelete', function(){
 // $(".itemDelete").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
         $.ajax(
            {
                url: "/thirdCategoryDelete/"+id,
                type: 'GET',
                data: {
                    "id": id,
                    "_token": token,
                },
                  success: function (response) {
                           Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                            )
               $('.table').load(location.href + ' .table');
                // location.reload();

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
@endpush

  