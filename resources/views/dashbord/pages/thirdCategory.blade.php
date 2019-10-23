
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
        <form action="{{ url('/thirdCategorySave') }}" method="post">
          @csrf

          <input type="hidden" name="category_id" value="{{ $allsubCategory->category_id }} ">
          <input type="hidden" name="sub_category_id" value="{{ $allsubCategory->id }} ">
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Category Name :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $allsubCategory->id }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Sub Category Name :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="subCategory_name" aria-describedby="emailHelp" value="{{ $allsubCategory->subCategory_name }}">
          
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Third Category Name :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="thirdCategoryName" aria-describedby="emailHelp" placeholder="Enter Category Name">
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
{{-- end modal --}}
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
                    <th scope="col">Sub Category Name</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allThirdCategory as $key => $v_allThirdCategory)
                  <tr>
                  <th scope="row">{{ $key+1}}</th>
                    <td>{{ $v_allThirdCategory->thirdCategoryName}}</td>
               
                    <td class="text-center">
                <button href="" type="submit" data-id="{{ $v_allThirdCategory->id }}" id="editCategory" data-toggle="modal" data-target="#editModal" class="btn btn-primary">Edit</button>

                      <button type="button" data-id="{{ $v_allThirdCategory->id }}" class="itemDelete btn btn-danger">Delete</button>
                    </td>
                  </tr>
                    @endforeach
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
            <label for="exampleInputEmail1">Edit Sub Category Name :</label>


            <input type="hidden" id="thirdcategory_id">
            <input type="hidden" name="categoryId" id="categoryId">
            <input type="hidden" name="sub_categoryId" id="sub_categoryId">
            <input type="text" class="form-control" id="thirdCategory_Name" name="thirdCategory_Name" aria-describedby="emailHelp" placeholder="Enter Category Name">
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
         $.get("/thirdCategoryEdit/"+id, function (data) {
        console.log(data)
         $('#thirdcategory_id').val(data.id);
         $('#categoryId').val(data.category_id);
         $('#sub_categoryId').val(data.sub_category_id);
         $('#thirdCategory_Name').val(data.thirdCategoryName);
         // $('#productNumber').val(data.product_number);
      });
   }); 
});

  $('#editForm').on('submit', function(){
     
        var id = $('#thirdcategory_id').val();
        // alert(id);
             $.ajax({
                    type:"PUT",
                    url:"/thirdCategoryUpdate/"+id,
                    data: $('#editForm').serialize(),
                    success: function (response) {
                      // alert(response);
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

  