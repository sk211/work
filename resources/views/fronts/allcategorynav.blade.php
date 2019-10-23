@extends('fronts.master')


@section('content')

<div class="container">
    <div class="row">
            <div class="all-cat-text" style="display: block;">
                <span ><img src="https://static.ajkerdeal.com/images/all-cat-icon.svg"></span> সকল ক্যাটাগরি </div>


                {{-- <table class="table table-striped">
                  @foreach($allcategory as $v_allcategory)
                        <tbody>
                          <tr>
                            <td><a href="#"><span>{{ $v_allcategory->category_name }}</span></a></td>
                            
                          </tr>
                         
                        </tbody>
                        @endforeach
                      </table> --}}
                      
                    
                      
                      <nav class="navbar navbar-light bg-light">
                          @foreach($allcategory as $v_allcategory)
                        <form class="form-inline">
                          <button data-toggle="modal" data-target="#basicModal" class="btn btn-sm btn-outline-secondary" type="button">{{ $v_allcategory->category_name }}</button>
                          
                        </form>
                        @endforeach
                      </nav>
                  
                    
                    {{-- <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <div class="sub-wrapper-vfx">
                                          <div class="sub-con">
                                            <div class="sub-hol">
                                          @foreach($v_allcategory->subCategory as $value)
                                              <div class="sub-l">
                        <h3><a href="{{ url('/sub-category') }}/{{ $value->id }}">{{ $value->subCategory_name }}</a></h3>
                                                
                                              @foreach($value->thirdCategory as $my )
                                                <ul>
                                    <li><a href="{{ url('/sub-category-last') }}/{{ $my->id }}">{{ $my->thirdCategoryName }}</a></li>
                                                </ul>
                                                @endforeach
                                              </div>
                                            @endforeach
                                            
                                            </div>
                                          </div>
                                        </div>
                                         </li>	
                                        </ul>	
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                    
     </div>
    </div>
    
{{-- <div class="controler">
  <div class="row">
   
    <div id="vfx">
      <ul class="using">
          
        <li class="pad" style="border-bottom: 1px solid #fff"><a href="#"><span>{{ $v_allcategory->category_name }}</span></a>
          <ul>
          <div class="sub-wrapper-vfx">
            <div class="sub-con">
              <div class="sub-hol">
            @foreach($v_allcategory->subCategory as $value)
                <div class="sub-l">
<h3><a href="{{ url('/sub-category') }}/{{ $value->id }}">{{ $value->subCategory_name }}</a></h3>
                  
                @foreach($value->thirdCategory as $my )
                  <ul>
      <li><a href="{{ url('/sub-category-last') }}/{{ $my->id }}">{{ $my->thirdCategoryName }}</a></li>
                  </ul>
                  @endforeach
                </div>
             
              
              </div>
            </div>
          </div>
           </li>	
          </ul>	
    </div>
  </div>
</div> --}}






@endsection

