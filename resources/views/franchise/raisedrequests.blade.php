@include('layouts.css')

@include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Booking</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Samples</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
          @endif

    <section class="section dashboard">
      <div class="row">
                    <!-- booking history -->
                    <div class="col-12">
                      <div class="card recent-sales overflow-auto">
        
                        <!-- <div class="filter">
                          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                              <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            <li><a class="dropdown-item" href="#">Total</a></li>

                          </ul>
                        </div> -->
        <form method="post" action="{{route('raiserequest')}}">
            @csrf
                        <div class="card-body">
                          <h5 class="card-title">Collection Pending From Hexmade <span></span></h5>
                          @if($samples->count() == 0)
No data found
                          @else
                            @foreach($samples as $sample)        
                            <div>
                          
                            <label> Id : {{$sample->id}} || Custumer Name : {{$sample->name}} || Mobile : {{$sample->mobile}} || TestDetails : @foreach($sample->testdetails as $test) {{$test->name->name ?? ''}},  @endforeach <label>
</div>
                                @endforeach
                                <br>
                       @endif
                            </div>
</form>
        
                      </div>
                    </div><!-- End Recent Sales -->
      </div>

    </section>

  </main><!-- End #main -->

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Hexamed Healthcare Services LLP</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://Mindhuntz.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://Mindhuntz.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed And Developed by <a href="https://Mindhuntz.com/">Mindhuntz</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @extends('layouts.script')