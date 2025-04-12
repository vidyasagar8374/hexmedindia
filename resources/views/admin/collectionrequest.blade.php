@include('layouts.css')

@include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Requests</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Samples</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
          @endif

    <section class="section dashboard">
      <div class="row">
                    <!-- booking history -->
                    <div class="col-12">
                      <div class="card recent-sales overflow-auto">
        
                      <div class="card">
          <div class="card-body">
            <h5 class="card-title">Franchise Requests // Approve - Reject</h5>

            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Email</th>
                  <th scope="col">Requested</th>
               
                  <th scope="col">view more</th>
                </tr>
              </thead>
              <tbody>
                @foreach($franchise as $row)
                <tr>
                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->email}}</td>
                  <td>{{$row->requestdetails ? 'Requested' : 'NA' }}</td>
                
                  <td><a href="{{url('/admin/approverequests/' . encrypt($row->id))}}" class="btn btn-primary btn-sm">view More</a></td>
                </tr>
                @endforeach
                
              </tbody>
            </table>


            <!-- End Table with hoverable rows -->

          </div>
        </div>
      
                      </div>
                    </div><!-- End Recent Sales -->
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