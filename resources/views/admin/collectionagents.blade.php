@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Collection Agents</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Agents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="col-lg-3 col-md-3  justify-content-center">
            <button class="btn btn-primary btn-sm "><i class="ri-user-add-line">&nbsp;<a style="color:white; align:right" href="{{route('addcollectionagent')}}">Add</a></i></button>
        </div>
      <div class="col-lg-12">


        <div class="card">
            
          <div class="card-body">
            
            <h5 class="card-title">Agents</h5>
          
            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">Address</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
               @foreach($boys as $boy)
                <tr>
                  <th scope="row">{{$boy->id}}</th>
                  <td>{{$boy->name}}</td>
                  <td>{{$boy->mobile}}</td>
                  <td>{{$boy->address}}</td>
                  <td>{{$boy->status == 1 ? 'Active' : 'Inactive'}}</td>
                  
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