@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Products/li>
          <li class="breadcrumb-item active">Product List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">
      
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Products</h5>
            @if(\Auth::user()->role == 1)
            <a href="{{route('products')}}"><button type="button" class="btn btn-outline-primary float-end">Add Products +</button></a><br /><br />
            @endif

            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                    <th scope="col">Dimensions</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $row)
                <tr>
                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->name}}</td>
                  <td>{{$row->description}}</td>
                  <td>{{$row->price}}</td>
                   <td>{{$row->dimensions}}</td>
                  <td>{{ $row->status == 1 ? 'Active' : 'Inactive' }}</td>
                  <td><a href="{{url('/admin/productedit/' .$row->id)}}" class="btn btn-primary btn-sm">view</a></td>
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