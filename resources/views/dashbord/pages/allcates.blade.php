
@extends('dashbord.master')

@section('title')
   | All Category
@endsection


@section('content')
   <!-- Left side column. contains the logo and sidebar -->
   @section('das_title')
    All Categories
@endsection
 

    <!-- Main content -->

    <div class="container" id="order_list">
     
          <div class="row">
            <div class="col-md-10 offset-1  ">
              <div class="addCatBtn">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ url('/categorySave') }}" method="post">
          @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Category Name :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" aria-describedby="emailHelp" placeholder="Enter Category Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
    </div>
  </div>
</div>



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
              <table class="table">
                <thead style="background:#FC4A9E; color:aliceblue;">
                  <tr>
                    <th scope="col">sl no</th>
                    <th scope="col">Category Name</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allCategory as $key=> $v_allCategory)
                      
                 
                  <tr>
                  <th scope="row">{{ $key+1}}</th>
                    <td>{{ $v_allCategory->category_name}}</td>
               
                    <td class="text-center">
                    <a href="{{ url('/subCategory')}}/{{ $v_allCategory->id }}" type="submit" class="btn btn-info">Add Sub Category </a>
<button href="" type="submit" data-id="{{ $v_allCategory->id }}" id="editCategory" data-toggle="modal" data-target="#editModal" class="btn btn-primary">Edit</button>
                      <button type="button" class="itemDelete btn btn-danger" data-id="{{ $v_allCategory->id }}">Delete</button>

                    </td>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm"  method="PUT">
          @csrf
          @method('PUT')
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Edit Category Name :</label>
            <input type="hidden" id="category_id">
            <input type="text" class="form-control" id="categoryName" name="categoryName" aria-describedby="emailHelp" placeholder="Enter Category Name">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="updateCategory" class="btn btn-primary">Update</button>
      </div>
        </form>
    </div>
  </div>
</div>                 
                  </tr>
                    @endforeach
                  {{-- @foreach($posts as $post)
                  {{ $post->yourColumnName }}
                @endforeach --}}
                 
                
  
  
                </tbody>
              </table>
            </div>
          </div>
        </div>
  
@endsection

@push('js')
  <script src="{{asset('/')}}dashbord/sweetalert2.js"></script>
    <script>
 $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   $('body').on('click', '#editCategory', function () {
    var id = $(this).data("id");
         $.get("categoryEdit/"+id, function (data) {
        // console.log(data)
         $('#category_id').val(data.id);
         $('#categoryName').val(data.category_name);
         // $('#productCategory').val(data.category_id);
         // $('#productPrice').val(data.product_price);
         // $('#productNumber').val(data.product_number);
      });
   }); 
});

  $('#editForm').on('submit', function(){
     
        var id = $('#category_id').val();
             $.ajax({
                    type:"PUT",
                    url:"/categoryUpdate/"+id,
                    data: $('#editForm').serialize(),
                    success: function (response) {
                      alert(response);
                     
                   //   $('#editModal').modal('hide');
                   // $('.table').load(location.href + ' .table');
                    },
                    error: function (error) {
                        console.log(error);
              
                    }
            });
   });
 </script>
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
                url: "categoryDelete/"+id,
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

  