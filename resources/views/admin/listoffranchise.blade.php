@include('layouts.css')

@include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Franchise</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Manage Franchise</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Franchise // Edit - View - Delete</h5>

            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">##</th>
                  <th scope="col">Name</th>
                  <th scope="col">Mobile Number</th>
                  <!-- <th scope="col">city</th> -->
                  <th scope="col">Reg Date</th>
                  <th scope="col">Take An Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($franchises as $k => $franchise)
                <tr>
                  <th scope="row">{{$k+1}}</th>
                  <td>{{$franchise->name}}</td>
                  <td>{{$franchise->mobile}}</td>
                  <!-- <td>siddipet</td> -->
                  <td>{{$franchise->created_at}}</td>
                  <td>uagw</td>
                  
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