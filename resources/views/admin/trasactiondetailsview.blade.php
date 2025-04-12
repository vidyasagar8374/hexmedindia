@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Coupons</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Transcation</li>
          <li class="breadcrumb-item active">Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Trasactions</h5>

            <!-- Table with hoverable rows -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Transcation id</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Details</th>
                </tr>
              </thead>
              <tbody id="items-container">
                <tr>
                  <td>1111111</td>
                  <td>1111111</td>
                   <td>
                      qwqwqww
                </tr>
                
              </tbody>
             
            </table>
            <!-- E  nd Table with hoverable rows -->
            <div class="ajax-load-gif text-center" style="display:none">
                    <p><img src="{{ asset('assets/img/loadinggif.gif') }}"></p>
                </div>
            
            </div>  
            </div>
            </div>
    </section>
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Hexamed Technologies</span></strong>. All Rights Reserved
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

  <!-- Vendor JS Files -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

  <!-- Modal for viewing details -->


  @extends('layouts.script')

</body>

</html>