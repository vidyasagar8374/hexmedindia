<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hexamed - @if(isset($sis))SIS @else Franchise @endif Registration</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================

  * License: https://Mindhuntz.com/license/
  ======================================================== -->

</head>

<body>

  <section class="section m-5">
    <div class="row align-items-center">

      <div class="col-lg-12">

        <div class="card">
          <div class="container-fluid bg-secondary mb-4 text-center">
            <h5 class="card-title text-white">@if(isset($sis)) SIS Registration | Apply For Hexamed Technologies SIS Registration @else Franchise Registration | Apply For Hexamed Technologies Franchise Registration @endif </h5>
          </div>
          <div class="card-body ">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
          @endif


            <!-- General Form Elements -->
            <form id="regform" action="{{route('franchisesubmitregistration')}}"  method="post" enctype='multipart/form-data'>
            @csrf  
            <input type="hidden" name="is_sis" value="{{$sis ?? ''}}">
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Proprietor Name <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="text" name="fullname" value="{{old('fullname')}}" id="fullname" class="form-control" required>
                </div>
              </div>
              
                
               <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Trade Name <span style="color:red">@if(!isset($sis))* @endif</span></label>
                <div class="col-sm-10">
                  <input type="text" name="tradename" value="{{old('tradename')}}" id="fullname" class="form-control" @if(!isset($sis)) required @endif>
                </div>
              </div>
              
              
              
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email Address <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Enter Mobile Number <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="number" value="{{old('mobile')}}" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" name="mobile" id="mobile" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Proprietor Aadhar <span style="color:red">@if(!isset($sis))* @endif</span></label>
                <div class="col-sm-10">
                  <input class="form-control" @if(!isset($sis)) required  @endif name="aadhar" id="formFileone" type="file"  onchange="previewPDFone()">
                  <iframe id="pdfPreviewone" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;display:none"></iframe>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Proprietor Pan Card <span style="color:red">@if(!isset($sis)) * @endif</span></label>
                <div class="col-sm-10">
                  <input class="form-control" @if(!isset($sis)) required @endif name="pan" type="file" accept="application/pdf" id="formFiletwo" onchange="previewPDFtwo()">
                  <iframe id="pdfPreviewtwo" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;display:none"></iframe>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" name="licience" class="col-sm-2 col-form-label">Clinical Establishment license <span style="color:red">@if(!isset($sis))* @endif</span></label>
                <div class="col-sm-10">
                  <input class="form-control" @if(!isset($sis)) required @endif name="licience" accept="application/pdf"  type="file" id="formFilethree" onchange="previewPDFthree()">
                  <iframe id="pdfPreviewthree" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;display:none"></iframe>

                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" name="licience" class="col-sm-2 col-form-label">Biomedical Waste Certificate <span style="color:red">@if(!isset($sis))* @endif</span></label>
                <div class="col-sm-10">
                  <input class="form-control" name="bio" accept="application/pdf" @if(!isset($sis)) required @endif  type="file" id="formFilefour" onchange="previewPDFfour()">
                  <iframe id="pdfPreviewfour" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;display:none"></iframe>

                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" name="licience" class="col-sm-2 col-form-label">Rental Agreement / Property paper option <span style="color:red">@if(!isset($sis))* @endif</span></label>
                <div class="col-sm-10">
                  <input class="form-control" name="rental" accept="application/pdf" @if(!isset($sis)) required @endif type="file" id="formFilefive" onchange="previewPDFfive()">
                  <iframe id="pdfPreviewfive" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;display:none"></iframe>

                </div>
              </div>

              <!--<div class="row mb-3">-->
              <!--  <label for="inputNumber" name="licience" class="col-sm-2 col-form-label">Toilet And Space  Images <span style="color:red">*</span></label>-->
              <!--  <div class="col-sm-10">-->
              <!--     <input class="form-control" name="toilet" required  type="file" id="formFilesix" onchange="previewPDFsix()">-->
              <!--    <iframe id="pdfPreviewsix" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;display:none"></iframe>-->
              <!--  </div>-->
              <!--</div>-->
              
               <div class="row mb-3">
                <label for="inputNumber" name="licience" class="col-sm-2 col-form-label">Toilet And Space Images <span style="color:red">@if(!isset($sis))*@endif</span></label>
                <div class="col-sm-10">
                  <input class="form-control" name="toilets[]" @if(!isset($sis)) required @endif multiple type="file" id="formFilesix" onchange="previewPDFsix()">
                  <div id="pdfPreviewsContainer" class="row mt-3"></div>
                </div>
              </div>
              
              
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Labour  Certificate <span style="color:red">@if(!isset($sis))*@endif</span></label>
                <div class="col-sm-10">
                  <input class="form-control" name="labour" id="labour" accept="application/pdf" @if(!isset($sis)) required @endif type="file" id="formFileSeven" onchange="previewPDFSeven()">
                  <iframe id="pdfPreviewSeven" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;display:none"></iframe>

                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Collection center Images <span style="color:red">@if(!isset($sis))* @endif</span></label>
                <div class="col-sm-10">
                <input type="file" class="form-control" id="fileUpload" @if(!isset($sis)) required @endif  name="collection[]" multiple>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="date" value="{{old('dob')}}"  name="dob" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0"> Select Gender <span style="color:red">*</span></legend>
                <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input"  type="radio" name="gender" value="1" required>
                    <label class="form-check-label">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="2" required>
                    <label class="form-check-label">Female</label>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Select State <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <select id="stateSelect" name="state" class="form-select" aria-label="Select State" required>
                    <option selected value="" disabled>Select a State</option>
                    @foreach($states as $state)
                     <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">City <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="text" name="city" value="{{old('city')}}" class="form-control" required>
                </div>
              </div>
              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Pincode <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="text" name="pincode" value="{{old('pincode')}}" class="form-control" required>
                </div>
              </div>
              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Address <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="text" name="address" value="{{old('address')}}"  class="form-control" required>
                </div>
              </div>

              

              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="password" name="confirmpassword" value="{{old('confirmpassword')}}"  id="confirmpassword" class="form-control" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Explain About Your Organization <span style="color:red">@if(!isset($sis))*@endif</span></label>
                <div class="col-sm-10">
                  <input type="text" name="about" value="{{old('about')}}" class="form-control" @if(!isset($sis)) required @endif>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Request  @if(isset($sis)) SIS @else Franchise @endif</label>
                <div class="col-sm-10">
                  <button type="submit" onclick="validatePasswords()" class="btn btn-primary btn-sm">Submit Form</button>
                </div>
              </div>

            </form>

          </div>
        </div>

      </div>


    </div>
  </section>


  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('assets/js/iframe.js')}}"></script>
  
<script>
function validatePasswords() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;

  if (password !== confirmPassword) {
    alert("Password and Confirm Password must match!");
  } else {
    document.getElementById("regform").submit(); // Submit the form if passwords match
  }
}
</script>

</body>

</html>