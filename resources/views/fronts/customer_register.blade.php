@extends('fronts.master')


@section('content')



<div class="container mt-5" id="register">
   <div class="row">
      
<div class="col-md-6">
        <div class="container">
             
                <h6 class="text-center font-weight-bold py-2 text-success" style="background: #FFE7C7;"><i class="fas fa-user"></i> User Inpormation</h6>
 
                   <div id="user_from">
 
                   
                   <form >
                         <div class="form-group">
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type Your Name">
                         </div>
                         <div class="form-group">
                           <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Type your Phone Number">
                         </div>
                         <div class="form-group">
                               <select class="custom-select">
                                     <option selected>Select your Area</option>
                                     <option value="1">ঢাকা </option>
                                     <option value="2">ঢাকার বাহিরে</option>
                                   </select>
                         </div>
                         <div class="form-group">
                           <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Type your Address">
                         </div>
                         
                         <button type="submit" class="btn btn-block btn-small" style="background: #FF8E27;
                         color: #fff;">Confirm order</button>
                       </form>
             
          </div>
       </div>
</div>
                                   
       <div class="col-md-6 register-right" id="customer_id">
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
  
          
      
           <div class="tab-content" id="myTabContent">
                   <h6 class="text-center font-weight-bold py-2 text-success" style="background: #FFE7C7;">Registation</h6>
                      <form action="{{ url('/customerSaveForm') }}" method="POST">
                   <div class=" register-form">
                          @csrf
                      
                        {{-- form start --}}
                        <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Type Your Name">
                              </div>
                           <div class="form-group">
                               <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                           </div>
               
                    
                           <div class="form-group">
                               <input type="email" name="email" class="form-control" placeholder="Type Your Email *" value="" />
                           </div> 
                           <div class="form-group">
                               <input type="text" name="number" class="form-control" placeholder="Type Your Number *" value="" />
                           </div> 
                           <div class="form-group">
                               <input type="text" name="address" class="form-control" placeholder="Type Your Address *" value="" />
                           </div>
                            <div class="form-group">
                              <label for="">Gender Select :</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                  Male
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                                <label class="form-check-label" for="exampleRadios2">
                                  Female
                                </label>
                              </div> 
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="other">
                                <label class="form-check-label" for="exampleRadios2">
                                  Other
                                </label>
                              </div>
                            </div>    
                           <button type="submit" class="btn btn-block btn-small" style="background: #FF8E27;
                           color: #fff;" >Register </button>
                       
                   </div>
                    </form>
               <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                   <h3  class="register-heading">Login
                   </h3>
                       @if($errors->all())
                                    <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                @endif
                      <form method="POST" action="{{ route('login') }}" class="form-horizontal m-t-20" id="loginform">
                         @csrf
                   <div class="row register-form">
                       <div class="col-md-9 offset-2">

                           <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" name="email" placeholder="Email Address here" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                         <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg" name="password" value="12345678" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                           <input type="submit" class="btnRegister"  value="Login"/>
                       </div>
                   </div>
                      </form>
               </div>
           </div>
       </div>
   </div>

</div>


<div class="clear"></div>

@endsection

