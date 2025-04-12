@include('layouts.css')

@include('layouts.sidebar')

  <main id="main" class="main">

    <div class="card row">
      <div class="card-body col-lg-12 col-xl-12">
        <h5 class="card-title">Transaction History</h5>
        <!-- Bordered Table -->
        <table class="table table-bordered datatable table-light table-striped">
          <thead>
            <tr class="">
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
              <th scope="row">01</th>
              <td>02/09/2023</td>
              <td>02:00PM</td>
              <td>bank transfer</td>
              <td>14500 &#x20B9;</td>
              <td><span class="badge bg-primary">Pending</span></td>
            </tr>
            <tr>
              <th scope="row">02</th>
              <td>02/09/2023</td>
              <td>02:00PM</td>
              <td>bank transfer</td>
              <td>14500 &#x20B9;</td>
              <td><span class="badge bg-success">Success</span></td>
            </tr>
            <tr>
              <th scope="row">03</th>
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