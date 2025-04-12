@include('layouts.css')

@include('layouts.sidebar')
<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>View Test</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">View</li>
          <li class="breadcrumb-item active">Test Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      

        <!-- for booking coloumn -->

        <div class="col-lg-12">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
          <div class="card">
            <div class="card-body">
              <h5  class="card-title text-center bg-light">View Test Details</h5>

              <!-- General Form Elements -->
              <div class="p-1 pt-3">

                <form action="{{route('updatetest')}}" method="post">
                  @csrf
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="hidden" value="{{$data->id}}" class="form-control" placeholder="Name of the customer" name="id" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="text" value="{{$data->name}}" class="form-control" placeholder="Name of the customer" name="name" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="email" class="form-control" value="{{$data->email}}" placeholder="Email address"name="email" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" value="{{$data->mobile}}" placeholder="Enter Mobile Number" name="number" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <textarea class="form-control" type="text" id="formFile" name="address" placeholder="Enter H-no">{{$data->address}}</textarea>
                    </div>
                  </div>
                 
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" value="{{$data->city}}" name="city" placeholder="city" required>
                    </div>
                  </div>
                
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" value="{{$data->pincode}}" name="pincode" placeholder="Pincode" required>
                    </div>
                  </div>                  
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="date" class="form-control" value="{{$data->date}}" onchange="dateslots(event)" required name="date" placeholder="choose sample pickup date" id="dateselected">
                    </div>
                  </div>
                  <?php
                    $slots = ['06:00 AM - 07:00 AM', '07:00 AM - 08:00 AM', '08:00 AM - 09:00 AM', '09:00 AM - 10:00 AM',
                     '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '12:00 PM - 01:00 PM', '01:00 PM - 02:00 PM', '02:00 PM - 03:00 PM',
                      '03:00 PM - 04:00 PM', '04:00 PM - 05:00 PM', '05:00 PM - 06:00 PM']
                  ?>
                  <div class="row mb-3">
                  <div class="col-sm-12">
                        <select name="time" class="form-select" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state" required>
                        @foreach($slots as $slot)    
                            <option value="{{$slot}}" @if($data->time == $slot) selected @else disabled @endif>{{$slot}}</option>
                        @endforeach
                          </select>
                    </div>
                  </div>
  

                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  @if($data->gender == 'male') checked @endif name="gender" id="gridRadios1" value="male" required>
                        <label class="form-check-label" for="gridRadios1">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" @if($data->gender == 'female') checked @endif name="gender" id="gridRadios2" value="female" required>
                        <label class="form-check-label" for="gridRadios2">Female</label>
                      </div>
                    </div>
                  </div>

                 <div class="row mb-3">
                    <div class="col-sm-12">
                        <select class="form-select" name="test" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state" required>
                            <option selected>Choose a Test</option>
                            @foreach($tests as $test)
                            <option value="{{$test->id}},{{$test->price}}" @if($data->test_id == $test->id) selected @endif>{{$test->name}}({{$test->price}})</option>
                            @endforeach
                          </select>
                    </div>
                    
                </div>

                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label>Assigned Boy : {{$data->boydetails->name ?? 'No Boy Assigned'}}</label>
                  </div>
                </div>
 
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary btn-sm w-100">Update</button>
                    </div>
                  </div>
  
              </form><!-- End General Form Elements -->

              </div>

            </div>
          </div>

        </div>

        <!-- booking end -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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
  <script>
    // function dateslots(e){
    //   var date = e.target.value
    //   $.ajax({
    //     headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //       },
    //       type: 'post',
    //       url : '/boy/',
    //       data : {
    //         'date' : date
    //       },
    //       success : function(result){
           
    //       }
    //   })
    // }
    </script>
</body>

</html>