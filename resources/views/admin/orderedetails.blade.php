@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Ordered Details</li>
          <li class="breadcrumb-item active">Ordered Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ordered Details</h5>
            @if(\Auth::user()->role == 1)
            <a href="{{route('products')}}"><button type="button" class="btn btn-outline-primary float-end">Add Products +</button></a><br /><br />
            @endif

            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mobile</th>
                  <th scope="col">Status</th>
                  <th scope="col">Products</th>
                   <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
              
               
                <tr>
                  <th scope="row">{{$order->uuid}}</th>
                  <td>{{$order->userdata[0]->name}}</td>
                  <td>{{$order->userdata[0]->email}}</td>
                  <td>{{$order->userdata[0]->mobile}}</td>
                                    <td>{{$order->status}}</td>
                  <td>{{$order->products->count()}}</td>
                   <td> {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                  <td><a href="{{ route('orderedetailsview', ['id' => $order->id]) }}"><button type="button" class="btn btn-primary">view</button></a></td>
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