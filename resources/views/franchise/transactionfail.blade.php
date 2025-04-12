@include('layouts.css')

@include('layouts.sidebar')


  <main id="main" class="main">

    <div class=" d-flex justify-content-center align-items-center p-5">
        <div class="col-md-12">
            <div class="border border-3 border-danger"></div>
            <div class="card  bg-white shadow p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="75" height="75"
                        fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path
                            d="M8 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1zm0 13a6 6 0 1 0 0-12 6 6 0 0 0 0 12zm1.354-8.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 1 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708L8 7.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h3>Transaction failed !</h3>
                    <p>Your payment has failed. Something went wrong.</p>
                </div>
            </div>
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