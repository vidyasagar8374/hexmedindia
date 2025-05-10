@include('layouts.css')

@include('layouts.sidebar')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Create Test</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Create Tests</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

  <div class="col-lg-12">


    <div class="card">
      <div class="card-body">
        <div class="row align-items-center">
        <div class="card-body">
             <!-- download icon-->
             <h3 class="pt-3">
                          <a href="{{ route('exportest') }}"> 
                            <div class="exprot-data d-flex justify-content-end align item-center">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i></h3>
                          </div></a>
                          </h3>
              <!-- download icon-->
        <div class="col-lg-9 col-md-9 justify-content-around">
            <h5 class="card-title">Create Test // Edit - Delete</h5>
        </div>
        <div class="col-lg-3 col-md-3  justify-content-center">
            <button class="btn btn-primary btn-sm "><i class="ri-user-add-line">&nbsp;<a style="color:white;" href="{{route('newtestedit')}}">Create Test</a></i></button>
        </div>

        </div>

        <!-- Table with hoverable rows -->
        <table class="table datatable table-striped">
          <thead>
            <tr>
              <th scope="col">##</th>
              <th scope="col">Test Name</th>
              <th scope="col">Test Price</th>
              <th scope="col">Admin Price</th>
              <th scope="col">Status</th>
              <th scope="col">Take Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tests as $i => $test)
            <tr>
              <th scope="row">{{$i+1}}</th>
              <td>{{$test->name}}</td>
              <td>{{$test->price}}</td>
              <td>{{$test->total_price}}</td>
              <td>{{$test->isactive}}</td>
              <td>
                <a href="{{url('admin/testeditinfo/'. encrypt($test->id))}}" class="btn btn-sm btn-success" >Edit</a>              
              </td>              
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