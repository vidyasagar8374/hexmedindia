@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Franchise Requests</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Approve</li>
          <li class="breadcrumb-item active">Franchise</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Franchise Requests // Approve - Reject</h5>

            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Frachise Name</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">city</th>
                  <th scope="col">Type</th>
                  <th scope="col">Reg Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">view more</th>
                </tr>
              </thead>
              <tbody>
                @foreach($franchise as $row)
                <tr>
                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->name}}</td>
                  <td>{{ $row->franchisedetails->tradename ?? '' }}</td>
                  <td>{{$row->mobile}}</td>
                  <td>{{$row->franchisedetails->city ?? ''}}</td>
                  <td>{{$row->sis == 1 ? 'SIS' :  'Franchise'}}</td>
                  <td>{{$row->created_at ?? ''}}</td>
                  <td>{{$row->is_verified == 1 ? 'Active' : ($row->is_verified == 2 ? 'Rejected' : 'Pending')}}</td>
                  <td><a href="{{url('/admin/franchisedetails/' . encrypt($row->id))}}" class="btn btn-primary btn-sm">view More</a></td>
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

  <!-- Vendor JS Files -->
@extends('layouts.script')

  <!-- Modal for viewing details -->




</body>

</html>