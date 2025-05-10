<?php
use App\Models\Notification;
$notifications = Notification::latest()->take(3)->get();
?>
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="{{route('home')}}" class="logo d-flex align-items-center">
    <img style="height:35px;" src="https://franchise-hexamed.com/public/assets/img/hexamedlogo.png" alt="">    
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<!-- <div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div> -->
<!-- End Search Bar -->
<?php
$cartcount = \DB::table('cart')->where('user_id', \Auth::user()->id)->count();
?>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
      
      
      
      
      <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->
    @if($cartcount != 0)
    <li class="nav-item d-block">
    <a class="nav-link nav-icon" href="{{ route('cartlist') }}" >
        <i class="bi bi-cart4"></i>
        <span class="badge bg-primary badge-number">{{$cartcount}}</span>
      </a>
    </li>
    @else
    <li class="nav-item d-block">
    <a class="nav-link nav-icon" onclick="NoCart()" >
        <i class="bi bi-cart4"></i>
        <span class="badge bg-primary badge-number">{{$cartcount}}</span>
      </a>
    </li>
    @endif
    
    
    
    

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a>End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

     {{-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><!-- End Messages Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="{{url('/allnotitification')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
      @foreach ($notifications as $notification)
        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>{{$notification->notification}}</h4>
              <p>{{$notification->message}}</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        @endforeach
        

        <li class="dropdown-footer">
          <a href="/allnotitification">Show all messages</a>
        </li>

      </ul> --}}
      
      <!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

        <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
        <span class="d-none d-md-block dropdown-toggle ps-2"><i class="bi bi-person-bounding-box"></i>&nbsp;&nbsp;{{\Auth::user()->name}}</span>
      </a><!-- End Profile Iamge Icon -->


      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{\Auth::user()->name}}</h6>
          <span>{{\Auth::user()->role == 1 ? "Admin" : (\Auth::user()->role == 2 ? "Franchise" : 'Boy')}}</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{route('franchiseprofile')}}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <!-- <li>
          <a class="dropdown-item d-flex align-items-center" href="{{route('franchiseprofile')}}">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li> -->
        <!-- <li>
          <hr class="dropdown-divider">
        </li> -->
<!-- 
        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li> -->
        <!-- <li>
          <hr class="dropdown-divider">
        </li> -->

        <li>

          <a class="dropdown-item d-flex align-items-center" href="{{route('userLogout')}}">

            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>


<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item" > 
    <a class="nav-link" href="{{url('home')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed"  href="franchisewallet.html">
      <i class="ri-wallet-2-line"></i><span>My Wallet</span></i>
    </a>
  </li> -->
  <!-- End Components Nav -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed"  href="addcustomer.html">
      <i class="ri-user-add-line"></i><span>Add Franchise</span></i>
    </a>
  </li> -->
  <!-- End Components Nav -->
  @if(\Auth::user()->role == 1)
  <li class="nav-item active">  
    <a class="nav-link collapsed"   href="{{route('franchiselist')}}">
    <i class="ri-admin-line"></i><span>Manage Franchise / SIS</span></i>
    </a>
  </li>
  <li class="nav-item">
  
    <a class="nav-link collapsed"  href="{{route('packagelist')}}">
    <i class="ri-admin-line"></i><span>Manage Package</span></i>
    </a>
  </li>

  <li class="nav-item">
  
    <a class="nav-link collapsed"  href="{{route('assignpackage')}}">
    <i class="ri-admin-line"></i><span>Assign Package</span></i>
    </a>
  </li>
  <li class="nav-item">
  
    <a class="nav-link collapsed"  href="{{route('bookinghistory')}}">
    <i class="ri-admin-line"></i><span>Booking Histroy</span></i>
    </a>
  </li>

  <!-- End Components Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('managetest')}}">
    <i class="ri-admin-line"></i><span>Manage Test</span></i>
    </a>
  </li>
  
    <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('listofwalletamount')}}">
    <i class="ri-24-hours-fill"></i><span>add Wallet</span></i>
    </a>
  </li>
  @endif
  @if(\Auth::user()->role == 2 && \Auth::user()->sis != 1)
  <li class="nav-item">
      <a class="nav-link collapsed"  href="{{route('franchisewallet')}}">
        <i class="ri-group-2-line"></i><span>Franchise Wallet</span></i>
      </a>
    </li>
    @endif
    @if(\Auth::user()->role == 2)
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('booktest')}}">
      <i class="ri-exchange-funds-line"></i><span>Book Test</span></i>
    </a>
  </li>
  @endif

  @if(\Auth::user()->role == 2)
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('bookinghistory')}}">
      <i class="ri-exchange-funds-line"></i><span>Booking History</span></i>
    </a>
  </li>
@endif



  @if(\Auth::user()->role == 2)
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('manageboys')}}">
    <i class="ri-admin-line"></i><span>Manage Boys</span></i>
    </a>
  </li>
@endif
@if(\Auth::user()->role == 2)
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('samplesrecived')}}">
    <i class="ri-admin-line"></i><span>Received samples</span></i>
    </a>
  </li>
@endif
@if(\Auth::user()->role == 2)
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('requestraised')}}">
    <i class="ri-admin-line"></i><span>Request Raised</span></i>
    </a>
  </li>
@endif
@if(\Auth::user()->role == 3)
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('manageslots')}}">
    <i class="ri-admin-line"></i><span>Manage Slots</span></i>
    </a>
  </li>
  @endif
  @if(\Auth::user()->role == 3)
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('collectiondata')}}">
    <i class="ri-admin-line"></i><span>Today Collection</span></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('collectiondatatommorow')}}">
    <i class="ri-admin-line"></i><span>Tommorow Collection</span></i>
    </a>
  </li>

  @endif
 
    @if(\Auth::user()->role == 1)
    <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('collectionrequests')}}">
      <i class="ri-exchange-funds-line"></i><span>Collection Requests</span></i>
    </a>
  </li>
  @endif
 
  
@if(\Auth::user()->role == 2)

  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('changeslot')}}">
      <i class="ri-exchange-funds-line"></i><span>Change Slot</span></i>
    </a>
  </li>
  @endif
@if(\Auth::user()->role == 2)
  
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('nonassignedslots')}}">
      <i class="ri-exchange-funds-line"></i><span>Non Assigned Slots</span></i>
    </a>
  </li>
  @endif
@if(\Auth::user()->role == 2)

  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('listcustomers')}}">
      <i class="ri-calendar-todo-fill"></i><span>Customers List</span></i>
      
    </a>
  </li>
  @endif
 @if(\Auth::user()->role == 2)

  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('productslist')}}">
      <i class="ri-exchange-funds-line"></i><span>Products</span></i>
    </a>
  </li>
  @endif
  @if(\Auth::user()->role == 1)
    <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('productsindex')}}">
      <i class="ri-exchange-funds-line"></i><span>Products</span></i>
    </a>
  </li>
    @endif
    @if(\Auth::user()->role == 1 || \Auth::user()->role == 2 )
    <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('orderedProduct')}}">
      <i class="ri-exchange-funds-line"></i><span>Ordered Products</span></i>
    </a>
  </li>
  
  @endif
  
@if(\Auth::user()->role == 1)
<li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('collectionsrecived')}}">
      <i class="ri-pantone-line"></i><span>Collection Received</span></i>
    </a>
 </li>
 <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('recivedsamples')}}">
      <i class="ri-pantone-line"></i><span>Received Samples</span></i>
    </a>
 </li>
 <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('collectionagents')}}">
      <i class="ri-pantone-line"></i><span>Collection Agents</span></i>
    </a>
 </li>
 <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('admin.sisreport')}}">
    <i class="ri-24-hours-fill"></i><span>SIS Report</span></i>
    </a>
  </li>
    @endif
    <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('transactiondetails')}}">
    <i class="ri-24-hours-fill"></i><span>list of transactions</span></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('getsupport')}}">
    <i class="ri-24-hours-fill"></i><span>Get Support</span></i>
    </a>
  </li>
@if(\Auth::user()->role == 2)

  <!-- <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('franchiseaddwallet')}}">
    <i class="ri-24-hours-fill"></i><span>Wallet</span></i>
    </a>
  </li> -->
  @endif
  <!-- <li class="nav-item">
    <a class="nav-link collapsed"  href="{{route('userLogout')}}">
    <i class="ri-24-hours-fill"></i><span>Logout</span></i>
    </a>
  </li> -->
</ul>

</aside>