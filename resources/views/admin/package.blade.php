@include('layouts.css')

@include('layouts.sidebar')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Packages</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Packages</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
            
          <div class="card">
            <div class="card-body pt-3">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
          @endif

            <div class="row align-items-center">

        <div class="col-lg-9 col-md-9 justify-content-around">
        <h5 class="card-title">Packages List</h5>
        </div>
        <div class="col-lg-3 col-md-3  justify-content-center">
            <button class="btn btn-primary btn-sm "><i class="ri-user-add-line">&nbsp;<a style="color:white;" href="{{route('createpackage')}}">Create Package</a></i></button>
        </div>

        </div>
                
             
             
              <table class="table datatable table-striped">
                <thead>
                  <tr>
                    <th scope="col">Package</th>
                    <th scope="col">Price</th>
                    <th scope="col">Franchise Price</th>

                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                  <tr>
                    <th scope="row">{{$package->package}}</th>
                    <th scope="row">{{$package->price}}</th>
                    <th scope="row">{{$package->cut_price}}</th>

                    <td>{{$package->is_active == 'Active' ? 'Active' : 'In active'}}</td>
                    <td><a href={{ url('admin/editpackagelist/' . $package->id) }}
><button type="button" class="btn btn-outline-primary btn-sm">Edit</button></a></td>
      
                    
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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