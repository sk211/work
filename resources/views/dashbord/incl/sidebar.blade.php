<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mb-4">
        <div class="pull-left image">
          <img src="/uploads/images/{{Auth::user()->image}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="    margin-top: -7px;">
          <p> {{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form ">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth::user()->roll_id == 1)
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="{{url ('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="{{url ('/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('/all-seller')}}">
            <i class="fa fa-comments"></i> <span>Seller Information</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red" style="padding: 5px 6px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    line-height: 10px;">3</small>
            </span>
          </a>
        </li>

         <li>
          <a href="{{url('/all-customer')}}">
            <i class="fa fa-comments"></i> <span>Customer</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red" style="padding: 5px 6px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    line-height: 10px;">3</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{url('/indexEditor')}}">
            <i class="fa fa-comments"></i> <span>User </span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red" style="padding: 5px 6px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    line-height: 10px;">3</small>
            </span>
          </a>
      </li>
      @endif
        <li class="treeview">
          <a href="{{url('/addCates')}}#">
          <i class="fa fa-list"></i>
            <span>Product Menagement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/product')}}"><i class="fa fa-circle-o"></i> Add Product</a></li>
            <li><a href="{{url('/productIndex')}}"><i class="fa fa-circle-o"></i> View Product</a></li>
            <li><a href="{{url('/allcates')}}"><i class="fa fa-circle-o"></i> Category</a></li>
            <li>
               <span class="pull-right-container">
                <?php
                $productCount = App\product::where('status', 0)->count();
                ?>
              <small class="label pull-right bg-red" style="padding: 5px 6px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    line-height: 10px;">{{ $productCount }}</small>
            </span>
              <a href="{{url('/approveProduct')}}"><i class="fa fa-circle-o"></i>Approve Product</a>
            </li>
          </ul>
        </li>

 

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Order Menagement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/order')}}"><i class="fa fa-product"></i> Order List</a></li>
            
          </ul>
        </li>
 @if(Auth::user()->roll_id == 1)
        <li>
          <a href="{{url('/coupon')}}">
            <i class="fa fa-comments"></i> <span>Coupon</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red" style="padding: 5px 6px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    line-height: 10px;">3</small>
            </span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="{{url('/addCates')}}#">
          <i class="fa fa-list"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/dailySell')}}"><i class="fa fa-circle-o"></i>Daily Sells</a></li>
            <li><a href="{{url('/monthlySell')}}"><i class="fa fa-circle-o"></i> Monthly Sells</a></li>
            <li><a href="{{url('/allcates')}}"><i class="fa fa-circle-o"></i>Pandding Order</a></li>
            <li><a href="{{url('/brand')}}"><i class="fa fa-circle-o"></i>Brand</a></li>
          </ul>
        </li>
        @endif
        @if(Auth::user()->roll_id == 6 || Auth::user()->roll_id == 1)
        <li class="treeview">
          <a href="#">
             <i class="fa fa-cog" aria-hidden="true"></i><span>Site Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    
          <ul class="treeview-menu">
            <li><a href="{{url('/logo')}}"><i class="fa fa-circle-o"></i> Logo</a></li>
            <li><a href="{{url('/add-banner')}}"><i class="fa fa-circle-o"></i>Slider</a></li>
          </ul>
        </li>
      @endif
      </ul>
      
    
    </section>
    <!-- /.sidebar -->
  </aside>