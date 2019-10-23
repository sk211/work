@extends('dashbord.master')
 @push('css')
  <link rel="stylesheet" href="{{asset('/')}}dashbord/dataTables.bootstrap4.css">
  {{-- <link rel="stylesheet" href="{{asset('/')}}dashbord/adminlte.min.css"> --}}
 @endpush

@section('content')

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
  <div class="col-12">
    <div class="card">
            <div class="card-header">
              <h4 class="card-title text-center">All Order Information</h4>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
               <th scope="col">#</th>
          <th scope="col">Invoice Name</th>
          <th scope="col">Grand Total</th>
          <th scope="col">TrxID Number</th>
          <th scope="col">Payment Type</th>
          <th scope="col">Payment Status</th>
          <th scope="col">Shiping Status</th>
          <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
              <tbody>
            @foreach($allorder as $key=> $v_allorder)
      
              <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $v_allorder->invoice }}</td>
              <td>{{ $v_allorder->grandTotal }}</td>
              <td>{{ $v_allorder->trxID }}</td>
              <td>
              @if($v_allorder->payment == 1)
               <h5><span class="badge badge-primary">Cash On Delivery</span></h5>
              @elseif($v_allorder->payment == 2)
               <span class="badge badge-primary">Pay with Bkash</span>
              
              @endif

              </td>
              <td>

              @if($v_allorder->status == 1)
               <h5><span class="badge badge-primary">Order Complate</span></h5>
              @elseif($v_allorder->status == 0)
               <h5><span class="badge badge-danger">Pandding</span></h5>
              
              @endif


              </td>
              <td>
                <div class="d-inline">


              

                <h5><span class="badge badge-info">{{ $v_allorder->trackingProduct }}</span></h5>
  
              </td>
              <td>

                @if($v_allorder->status == 1)
                      <form action="{{ url('/orderDown') }}" method="POST" style="display: inline-block;">

                          @csrf
                           <input type="hidden" name="status" value="0">
                           <input type="hidden" name="order_id" value="{{ $v_allorder->id }}">
                        <button type="submit" class="btn btn-primary ">
                          <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </button>
                      </form>
                @elseif($v_allorder->status == 0)  
                <form action="{{ url('/orderUp') }}" method="POST" style="display: inline-block;">
                          @csrf
                           <input type="hidden" name="status" value="1">
                           <input type="hidden" name="order_id" value="{{ $v_allorder->id }}">
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                        </button>
                    </form>
                @endif  

            
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i>

                </button>

                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('trackingPoduct') }}/{{ $v_allorder->id }}" method="POST">
                          @csrf
                        <div class="modal-body">
                        <div class="form-group">
                      <label for="exampleFormControlSelect1">Example select</label>
                      <select name="trackingProduct" class="form-control" id="exampleFormControlSelect1">
                        <option value="Going for Delivery">Going for Delivery</option>
                        <option value="Ready For Shipping">Ready For Shipping</option>
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





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('trackingPoduct') }}/{{ $v_allorder->id }}" method="POST">
        @csrf
      <div class="modal-body">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select name="trackingProduct" class="form-control" id="exampleFormControlSelect1">
      <option value="Going for Delivery">Going for Delivery</option>
      <option value="Ready For Shipping">Ready For Shipping</option>
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
              <a href="{{ url('invoice', $v_allorder->invoice) }}" class="btn btn-primary">
                  <i class="fa fa-files-o" aria-hidden="true"></i>
                </a>
              </div>
              </td>
            </tr>
            @endforeach
        </tbody>
            
              </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
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
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
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
  text: "You want to be Deleted this product!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
         $.ajax(
            {
                url: "/productDelete/"+id,
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

  