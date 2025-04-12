@include('layouts.css')

@include('layouts.sidebar')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Add wallet Amount</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Add</li>
      <li class="breadcrumb-item active">wallet</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row align-items-center">

    <div class="col-lg-12">

      <div class="card">
        <div class="container-fluid bg-secondary mb-4 text-center">
          <h5 class="card-title text-white">Add Wallet amount </h5>
        </div>
        <div class="card-body ">

          <!-- General Form Elements -->
          <form method="post" action="{{ route('addamountwallet') }}" onsubmit="return confirmSubmission()">
            @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Amount</label>
              <div class="col-sm-10">
                <input type="text" name="amount" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Reference Id</label>
              <div class="col-sm-10">
                <input type="text" name="reference" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Franchise</label>
              <div class="col-sm-10">
                <select id="stateSelect" class="form-select" name="franchise" aria-label="Payment Type">
                  <option></option>
                  @foreach($franchiselist as $franchise)
                <option value="{{$franchise->id}}">{{$franchise->name}}</option>
                @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Payment Type</label>
              <div class="col-sm-10">
                <select id="stateSelect" class="form-select" name="cashtype" aria-label="Payment Type">
                  <option value="">select</option>
                  <option value="cheque">cheque</option>
                  <option value="Cash">Cash</option>
                  <option value="bank">Bank</option>
                  <option value="UPI">UPI</option>
                  <option value="NEFT">NEFT</option>
                  <option value="Other">Other</option>
                </select>
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

  <script>
    function confirmSubmission() {
        return confirm("Are you sure you want to submit?");
    }
</script>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @extends('layouts.script')