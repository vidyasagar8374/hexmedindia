@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Wallet list</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Wallet list</li>
          <li class="breadcrumb-item active">Wallet</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">
      
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Wallet list</h5>
            <a href="{{route('addwalletamount')}}"><button type="button" class="btn btn-outline-primary float-end">Add Wallet +</button></a><br /><br />

            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Reference</th>
                  <th scope="col">Date</th>
                  <th scope="col">Franchise</th>
                  <th scope="col">Deposited By</th>
                  <th scope="col">Payment Type</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($walletlists as $row)
                <tr>
                <th>{{ $row->id }}</th>
                <td>{{ $row->amount }}</td>  
                <td>{{ $row->reference }}</td>
                <td>{{ $row->created_at->format('d-m-Y') }}</td>
                <td>{{ $row->franchisedeatails->pluck('tradename')->implode(', ') }}</td>
                <td>{{ $row->created_users->name ?? '' }}</td>
                <td>{{ $row->cashtype }}</td>
              </tr>
                @endforeach
                
              </tbody>
            </table>


            <!-- End Table with hoverable rows -->

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
@extends('layouts.script')

  <!-- Modal for viewing details -->




</body>

</html>