@include('layouts.css')

@include('layouts.sidebar')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<body>




  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Customer - Book A Test</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add New</li>
          <li class="breadcrumb-item active">Test Booking</li>
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
              <h5  class="card-title text-center bg-light">Book A Test</h5>

              <!-- General Form Elements -->
              <div class="p-1 pt-3">

          <form action="{{route('booknewtest')}}" method="post" id="myForm">
                  @csrf
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" placeholder="Name of the customer" name="name" id="name" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="email" class="form-control" placeholder="Email address"name="email" id="email" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" id="mobile" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"  placeholder="Enter Mobile Number" name="number" required>
                    </div>
                  </div>

<div class="row mb-3">
                    <div class="col-sm-12">
                        DOB:
                      <input type="date" class="form-control" id="dateofbirth" placeholder="select dob" name="dateofbirth" required>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" id="age" placeholder="Enter Age" name="age" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <textarea class="form-control" type="text" id="formFile" name="address" placeholder="Enter H-no" required></textarea>
                    </div>
                  </div>
                 
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="city" placeholder="city" required>
                    </div>
                  </div>
                
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="pincode" placeholder="Pincode" required>
                    </div>
                  </div>
                  
                   <div class="row mb-3">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="ref_doctor" placeholder="Referred by">
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <select onchange="handleSelectChange(this)"  class="form-control" name="testtype" required>
                        <option value="1">Home Pickup</option>
                        <option value="2">In center</option>

                      </select>
                      
                    </div>
                  </div>


                  <div class="row mb-3" id="hidewhenincenter">
                    <div class="col-sm-12">
                      <input type="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" onchange="dateslots(event)"  name="date" placeholder="choose sample pickup date" id="dateselected" >
                    </div>
                  </div>
                  <div class="row mb-3" id="hidewhenincenter1">
                  <div class="col-sm-12">
                        <select name="time" class="form-select" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state" >
                            <option selected value="">Choose Time</option>
                            
                            <option value="06:00 AM - 07:00 AM">06:00 AM - 07:00 AM</option>
                            <option value="07:00 AM - 08:00 AM">07:00 AM - 08:00 AM</option>
                            <option value="08:00 AM - 09:00 AM">08:00 AM - 09:00 AM</option>
                            <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                            <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                            <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                            <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                            <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                            <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                            <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                            <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                            <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                          </select>
                    </div>
                  </div>
  

                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" required>
                        <label class="form-check-label" for="gridRadios1">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female" required>
                        <label class="form-check-label" for="gridRadios2">Female</label>
                      </div>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <div class="col-sm-12">
                      Payment Type
                      <select  class="form-control" name="cashtype"  required>
                      <option value=""></option>
                        <option value="Cash">Cash</option>
                        <option value="Card">Card</option>
                        <option value="UPI">UPI</option>
                      </select>
                      
                    </div>
                    </div>
                    
                    
                    
                      <div class="row mb-3">
                    <div class="col-sm-12">
                      Depertment
                      <select  class="form-control" name="dep"  required>
                           <option value="">Select one</option>
                        <option value="Lab">Lab</option>
                        <option value="Radiology">Radiology</option>
                      </select>
                      
                    </div>
                    </div>
                  
                  
                  <!-- new code -->




                  <!-- new code end -->
                  
                  <div class="form-row mb-12">
             
                        <div class="form-group col-lg-3 col-sm-12"> 
                        <label>Test</label>
                              <select style="width:200px !important" id="select" class="form-control" multiple data-live-search="true" name="tests[]" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state">
                                  @foreach($tests as $test)
                                  <option onClick="testDetailsInfo();"  value="{{$test->id}},{{$test->price}},{{$test->name}},{{$test->total_price}},">{{$test->name}}({{$test->price}})</option>
                                  @endforeach
                                </select>
                               
                     </div>

                 
                   
                    <div class="form-group col-lg-3 col-sm-12">
                    <label>Packages</label>
                        <select id="select1" class="form-control" multiple data-live-search="true" name="packages[]" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state">
                            @foreach($packages as $package)
                            <option  value="{{$package->id}},{{$package->price}},{{$package->package}},{{$package->cut_price}}">{{$package->package}}({{$package->price}})</option>
                            @endforeach
                          </select>
                    </div>

                  </div>
                  <!--<div class="row mb-3">-->
                  <!--  Selected Tests: <p id="testsinfo"> </p>-->
                  <!--  </div>-->
               
                    
                    
            


                    
           

                <!-- <div class="row mb-3">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" placeholder="Price of the service" required>
                  </div>
                </div> -->
 
                  <div class=" mb-3">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary btn-sm w-100">Book Now</button>
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

<script>
  function testtype()
  {
    alert(!111)
  }
   
      $(document).ready(function() {
       
        $('#myForm').submit(function(event) {
            // Your form validation logic goes here
            var name = $('#name').val();
            var email = $('#email').val();
            var mobile = $('#mobile').val();

           

           
            if (name.trim() === '') {
                alert('Please enter your name.');
                event.preventDefault(); 
                return false;
            }

           
            if (!isValidEmail(email)) {
                alert('Please enter a valid email address.');
                event.preventDefault(); // Prevent form submission
                return false;
            }

            
            return true;
        });

       
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });



























    $('#select').selectpicker();
    $('#select1').selectpicker();
function testDetailsInfo()
{
    alert("name")
}

 function handleSelectChange(selectElement) {
      var selectedValue = selectElement.value;
      var divToHide = document.getElementById("hidewhenincenter");
      var divToHide1 = document.getElementById("hidewhenincenter1");

      // Check if the selected value is 2
      if (selectedValue === "2") {
        divToHide.style.display = "none"; // Hide the div
        divToHide1.style.display = "none";
      } else {
        divToHide.style.display = "block"; // Show the div for other options
        divToHide1.style.display = "block";
      }
    }
    </script>
   