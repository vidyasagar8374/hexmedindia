@include('layouts.css')

@include('layouts.sidebar')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Add New Franchise</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Add</li>
      <li class="breadcrumb-item active">Franchise</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row align-items-center">

    <div class="col-lg-12">

      <div class="card">
        <div class="container-fluid bg-secondary mb-4 text-center">
          <h5 class="card-title text-white">Register A Franchise | Hexamed Technologies Franchise Registration </h5>
        </div>
        <div class="card-body ">

          <!-- General Form Elements -->
          <form>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Full Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email Address</label>
              <div class="col-sm-10">
                <input type="email" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Mobile Number</label>
              <div class="col-sm-10">
                <input type="number" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Upload Your Aadhar</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Upload Pan Card</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>


            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Date Of Birth</label>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0"> Select Gender</legend>
              <div class="col-sm-10">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                  <label class="form-check-label" for="gridRadios1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                  <label class="form-check-label" for="gridRadios2">Female</label>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Select State</label>
              <div class="col-sm-10">
                <select id="stateSelect" class="form-select" aria-label="Select State">
                  <option selected disabled>Select a State</option>
                  
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">City</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Pincode</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>

            

            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Submit</label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary btn-sm w-100">Submit Registration</button>
              </div>
            </div>

          </form>

        </div>
      </div>

    </div>


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