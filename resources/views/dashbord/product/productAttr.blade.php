
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
  <div class="col-12">
    <div class="row">
      <div class="col-6">
        <button data-toggle="modal" data-target="#addproductattr" class="btn btn-primary">Add Size In Product</button>
         <button data-toggle="modal" data-target="#addsize" class="btn btn-primary">Add Size</button>
      </div>
      <!-- Button trigger modal -->


<!-- Modal add size -->
<div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Size Name :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ url('/sizeName') }}" method="POST">
          @csrf
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleInputEmail1">Add Size</label>
    <input type="text" name="sizeName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Size">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- end --}}
<!-- Modal add size -->
<div class="modal fade" id="addproductattr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product Attribute :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ url('productAttrSave') }}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Attribute :</label>
    <select name="sizeName" class="form-control" id="exampleFormControlSelect1">

      <option selected="--Product Attribute--" disabled="disabled">--Product Attribute--</option>
      @foreach($allSize as $v_allSize)   
      <option value="{{ $v_allSize->id }}">{{ $v_allSize->sizeName }}</option>
     @endforeach
    </select>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
      <thead class="thead-dark ">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Size</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
        <tbody>
        @foreach($productAttr as $key=> $v_productAttr)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $v_productAttr->sizeName }}</td>
          <td>
             <button data-id="{{ $v_productAttr->id }}" class="itemDelete btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
              </button>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
</div>
  
    
  
 
  
@endsection
@push('js')
<script>
      $(document).ready(function() {
        $("#txtEditor").Editor();
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

  