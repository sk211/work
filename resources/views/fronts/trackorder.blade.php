@extends('fronts.master')


@section('content')



<div class=" register">
   <div class="row">
       
       <div class="col-md-8 offset-2 register-right" id="seller_it">

        <form action="/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="input-group">
              <input type="text" class="form-control" name="q"
                  placeholder="Search users"> <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">
                      <span class="glyphicon glyphicon-search">Trak Order</span>
                  </button>
              </span>
          </div>
      </form>
                            
     <p style="color:#333"> <strong> প্রোডাক্টের ডেলিভারি আপডেট পেতে আপনার বুকিং কোড / POD নাম্বার দিয়ে অর্ডার ট্র্যাক করুন।</strong></p>
           
     <div class="container">
      @if(isset($details))
          <p> The Search results for your query <b> {{ $query }} </b> are :</p>
      <h2>Sample User details</h2>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>User Id</th>
                  <th>Number</th>
                  <th>Address</th>
              </tr>
          </thead>
          <tbody>
              @foreach($details as $user)
              <tr>
                  <td>{{$user->user_id}}</td>
                  <td>{{$user->number}}</td>
                  <td>{{$user->address}}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
      @endif
  </div>
                          
                          </div>
                        
                     
                       </div>

                   </div>
               </div>
             
           </div>
     

</div>


<div class="clear"></div>

@endsection
{{-- @section('js')

 <script>
  $(document).on('click', '#trackingProduct', function(){
     var trackingProductValue = $('#trackingProductValue').val();
     window.location.href="{{ url('/tracking-product-value') }}"+"/"+trackingProductValue;
// alert(trackingProductValue);
  }); 

 </script>
@endsection --}}

