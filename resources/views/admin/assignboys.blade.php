@include('layouts.css')

@include('layouts.sidebar')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Assign Collection Boys</h1>
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
            <h5 class="card-title">Admin // Assign Boys</h5>

            <table>
  <th>Test ID</th>
  <th>Name</th>
  <th>Test Name</th>
  <th>Package Name</th>
  <th>View</th>



 @foreach($samples as $sample)
 
  <tr>
    <td>{{$sample->booking_id}}</td>
    <td>{{$sample->name}}</td>
    <td>@foreach($sample->testdetails as $test) {{$test->name->name ?? ''}},  @endforeach</td>
 
    <td>@foreach($sample->packagedetails as $package) {{$package->pc->package}} @endforeach</td>
    <td><a href="{{url('boy/testreqform') . '/' . $sample->id}}">View</a></td>

  </tr>
  @endforeach

</table>
<br>
<div>
<form action="{{route('assignboyconfirm')}}" method="post">
    @csrf
<h6>Assign Boy:</h6>
<input type="hidden" name="franchise_id" value="{{$id}}">
@foreach($samples as $sample)
<input type="hidden" name="sample_id[]" value="{{$sample->id}}">
 
@endforeach
<select class="form-control" required name="boyid">
    <option value="">Select One</option>
    @foreach($boys as $boy)
    <option value="{{$boy->id}}">{{$boy->name}}</option>
    @endforeach
</select>
</div>
<br>
@if(count($samples)==0)
@else
<input type="submit"  name="submit" value="Assign" class="btn btn-primary" >
@endif
</form>
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