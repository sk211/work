@extends('fronts.master')
@section('content')
@section('css')

@endsection


    <div class="container">

        <div class="row">
            <section id="tabs" class="my-5">
               
                    <div class="row">

                        <div class="col-xs-12 col-md-12  ">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">অর্ডার লিস্ট</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ট্র্যাক অর্ডার</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">আপনার তথ্য</a>
                                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">পাসওয়ার্ড পরিবর্তন</a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                    {{-- <div class="alert alert-success">
                                      <p>There Are No Order Yet GO Back And <a href="{{ url('/')  }}"><b>Shop</b></a></p>
                                    </div> --}}

                                   <table class="table table-striped">
                                          <thead class="thead-dark ">
                                          <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Invoice Number</th>
                                            <th scope="col">Grand Total</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Payment Type</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                          </thead>
                                            <tbody>
                                            @foreach($customerOrder as $key=> $v_customerOrder)
                                             <tr>
                                               <td>{{ $key+1 }}</td>
                                               <td>{{ $v_customerOrder->invoice }}</td>
                                               <td>{{ $v_customerOrder->grandTotal }}</td>
                                               <td>{{ $v_customerOrder->date }}</td>
                                               <td>
                                                                                   
                                                @if($v_customerOrder->status == 1)
                                                 <h5><span class="badge badge-primary">Payment Complate</span></h5>
                                                @elseif($v_customerOrder->status == 0)
                                                 <h5><span class="badge badge-danger">Pandding</span></h5>
                                                
                                                @endif

                                               </td>
                                               <td>
                                                  @if($v_customerOrder->payment == 1)
                                                  <h5><span class="badge badge-primary">Cash On Delivery</span></h5>
                                                  @elseif($v_customerOrder->payment == 2)
                                                   <h5><span class="badge badge-primary">Pay with Bkash</span></h5>
                                                  @endif
                                               </td>
                                               <td>
                                                 <a href="{{ url('invoice', $v_customerOrder->invoice) }}" class="btn btn-primary">
                  <i class="fa fa-eye"></i>
                </a>
                                               </td>
                                             </tr>
                                            @endforeach
                                            </tbody>
                                          </table>
                                        </div>

                                    </div>
                                </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" class="col-md-6 offset-2" aria-labelledby="nav-profile-tab">
                                    <p class=" text-center">ট্র্যাক অর্ডার</p>
                                   
                                        <div id="trackOrderInstruction" style="margin-bottom: 40px;">
                                            <p>১। পণ্যের ডেলিভারী আপডেট পেতে আপনার বুকিং কোড / POD নাম্বার দিয়ে অর্ডার ট্র্যাক করুন।</p>
                                            <p>২। আপনার অর্ডার করা পণ্যের ডেলিভারীর বর্তমান অবস্থা জানতে নিম্নের “টেক্সট বক্স” এ অর্ডারের বুকিং কোড / POD নাম্বার টি প্রদান করুন এবং “অর্ডার ট্র্যাক করুন” বাটনে ক্লিক করুন।</p>
                                        </div>

                                        <form action="#">
                                            <div class="form-group row text-center col-md-6 offset-3">
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="inputtext" placeholder="বুকিং কোড / POD নাম্বার">
                                                </div>
                                                <div class="col-sm-4">
                                                    <select class="form-control " id="sel1">
                                                        <option>বুকিং কোড</option>
                                                        <option>POD নাম্বার</option>
                                                        
                                                      </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="submit" class="form-control btn btn-danger" id="inputtext" placeholder="">
                                                </div>
                                              </div>
                                        </form>
                                    
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="pragrape col-md-7 offset-3">
                                        <p class=" text-center">আপনার তথ্য</p>
                                        <hr class="">
                                        <form>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">ইমেইল</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="inputtext" value="{{ Auth::user()->email }}">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">নাম</label>
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="inputPassword" value="{{ Auth::user()->name }}">
                                                </div>
                                              </div>
                              <?php
                              $personal_info = App\customer_info::where('user_id', Auth::user()->id)->first();
                              ?>

                                              <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">মোবাইল নাম্বার</label>
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="inputPassword" value="{{  $personal_info->number }}" >
                                                </div>
                                              </div> 
                                              <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">Address</label>
                                                <div class="col-sm-8">
                                                  <input type="text" class="form-control" id="inputPassword" value="{{  $personal_info->address }}" >
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">আমি একজন</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control " id="sel1" value="">
                                                        <option>পুরুষ</option>
                                                        <option>মহিলা</option>
                                                        <option>অন্যন্যা</option>
                                                      </select>
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">জেলা</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control " id="sel1">
                                                        <option>ঢাকা</option>
                                                        <option>ঢাকার বাহিরে</option>
                                                        <option>চট্টগ্রাম</option>
                                                      </select>
                                                </div>
                                              </div>
                                              
                                              <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">আমাদের সম্পর্কে জেনেছেন</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control " id="sel1">
                                                        <option>Bdjobs.com</option>
                                                        <option>Facebook.com</option>
                                                        <option>Fair and Event</option>
                                                        <option>Billboard</option>
                                                        <option>Email</option>
                                                        <option>From Friend</option>
                                                        <option>Other</option>
                                                      </select>
                                                </div>
                                              </div>
                                             
                                              <div>
                                                
                                              </div>
                                            <div class="text-right">
                                            <button type="submit" class="btn btn-primary">পরিবর্তন করুন</button>

                                            </div>
                                          </form>
                                     
                                     
                                      </div>
                                </div>
                                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <div class="pragrape col-md-7 offset-3">
                                              @if (session('status'))
                                  <div class="alert alert-success">
                                      {{ session('status') }}
                                  </div>
                              @endif
                                        <p class=" text-center">পাসওয়ার্ড পরিবর্তন করুন</p>
                                        <hr class="">
                                        <form  method="post" action="{{url('/updatePassword')}}" class="form-horizontal">
                                          @csrf
                                          @method('PUT')
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">পুরাতন পাসওয়ার্ডটি লিখুন</label>
                                                <div class="col-sm-8">
                                                 <input type="password" name="old_password"  id="old_password" class="form-control" placeholder="Enter your Old Password">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">নতুন পাসওয়ার্ডটি লিখুন</label>
                                                <div class="col-sm-8">
                                                 <input type="password" name="password"  id="password" class="form-control" placeholder="Enter your New Password">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">আরেকবার পাসওয়ার্ডটি লিখুন</label>
                                                <div class="col-sm-8">
                                                   <input type="password" name="password_confirmation"  id="password_confirmation" class="form-control" placeholder="Enter your Old Password">
                                                </div>
                                              </div>
                                            <div class="text-right">
                                            <button type="submit" class="btn btn-primary">পরিবর্তন করুন</button>

                                            </div>
                                          </form>
                                     
                                     
                                      </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                
            </section>
        </div>
    </div>

	{{ $ami }}
@endsection
@section('js')
<script>
var ami = encodeURIComponent('ami');
console.log(ami);
</script>



@endsection









      
