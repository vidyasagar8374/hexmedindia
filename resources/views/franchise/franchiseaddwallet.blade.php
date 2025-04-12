@include('layouts.css')

@include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Your Wallet</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">franchise</li>
          <li class="breadcrumb-item active">wallet</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
          
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Wallet Balance</button>
                </li>
          
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#deposit-edit">Deposit</button>
                </li>
          
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#transaction-history">Recent Transaction History</button>
                </li>
          
              </ul>
              <div class="tab-content pt-2">
          
                <div style="background-color: rgb(188, 215, 255);" class="tab-pane fade show active profile-overview p-4" id="profile-overview">

                  <div class="row bg-light ps-3 align-items-center">
                    <div class="col-lg-11 col-md-10 label ">
                      <h5 class="card-title ">Available Balance &nbsp;<span style="font-weight: 600; font-size: 18px; text-decoration: underline; color:rgb(1, 66, 128)">14000 &#x20B9; </span></h5>
                    </div>
                    <div class="col-lg-1 col-md-2"><a href="#deposit-edit" data-toggle="tab"><i  class="ri-add-circle-line fs-4 text-primary rounded" data-bs-toggle="tab" data-bs-target="#deposit-edit"></i></a></div>
                  </div>
          
                  <div class="row ps-3">
                    <div class="col-lg-3 col-md-4 label text-dark">Full Name</div>
                    <div class="col-lg-9 col-md-8 text-dark">Kevin Anderson</div>
                  </div>
          
                  <div class="row ps-3">
                    <div class="col-lg-3 col-md-4 label text-dark">Location</div>
                    <div class="col-lg-9 col-md-8 text-dark">A108 Adam Street, New York, NY 535022</div>
                  </div>
          
                  <div class="row ps-3">
                    <div class="col-lg-3 col-md-4 label text-dark">Phone</div>
                    <div class="col-lg-9 col-md-8 text-dark">(436) 486-3538 x29071</div>
                  </div>
          
                  <div class="row ps-3">
                    <div class="col-lg-3 col-md-4 label text-dark">Email</div>
                    <div class="col-lg-9 col-md-8 text-dark">k.anderson@example.com</div>
                  </div>
                </div>
          
                <div class="tab-pane fade profile-edit pt-3 p-5" id="deposit-edit">
                  <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Enter Deposit Amount</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="number" class="form-control" id="fullName" value="2000">
                        <div class="alert alert-dark alert-dismissible fade show" role="alert" id="alert" style="display: none;">
                          <i class="bi bi-folder me-1"></i>
                          The entered amount is below 2000!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeAlert()"></button>
                        </div>
                      </div>
                    </div>
          
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Enter Mobile Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobilenum" placeholder="Enter Your Mobile Number" type="number" class="form-control" id="mobnum" value="">
                      </div>
                    </div>
          
                    <div class="text-center">
                      <button type="submit" class="btn btn-success rounded-0 btn-sm w-100"><b>Click Here To Proceed For Recharge<b> <span><i class="ri-arrow-right-s-fill"></i></span></button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>
          
                <div class="tab-pane fade" id="transaction-history">
                  <!-- Transaction History Content -->
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Recent Transaction History</h5>
                      <!-- Bordered Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Transaction Date</th>
              <th scope="col">Transaction Time</th>
              <th scope="col">Transaction Type</th>              
              <th scope="col">Amount</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>02/09/2023</td>
              <td>02:00PM</td>
              <td>bank transfer</td>
              <td>14500 &#x20B9;</td>
              <td><span class="badge bg-primary">Pending</span></td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>02/09/2023</td>
              <td>02:00PM</td>
              <td>bank transfer</td>
              <td>14500 &#x20B9;</td>
              <td><span class="badge bg-success">Success</span></td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>02/09/2023</td>
              <td>02:00PM</td>
              <td>bank transfer</td>
              <td>14500 &#x20B9;</td>
              <td><span class="badge bg-danger">Rejected</span></td>
            </tr>

          </tbody>
        </table>
                      <!-- End Bordered Table -->
        
                      <!-- End Primary Color Bordered Table -->
        
                    </div>
                  </div>
                  <!-- Add your Transaction History content here -->
                </div>
          
              </div><!-- End Bordered Tabs -->
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