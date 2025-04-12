@include('layouts.css')

@include('layouts.sidebar')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<main id="main" class="main">
<div class="col-lg-12">
                        
                        <div class="card p-4">
                          @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                           <h5  class="card-title text-center bg-light">Add New PAckage</h5>
             
                           <!-- General Form Elements -->
                           <div class="p-1 pt-3">
             
                             <form method="post" action="{{route('assignpackagetotest')}}">
                              @csrf
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <select class="form-control col-md-12" required name="package">
                                    <option value="">Select one</option>
                                    @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->package}}</option>
                                    @endforeach
                                   </select>
                                 </div>
                               </div>

                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <select class="selectpicker" multiple data-live-search="true" required name="tests[]">
                                    
                                    @foreach($tests as $test)
                                        <option value="{{$test->id}}">{{$test->name}}</option>
                                    @endforeach
                                   </select>
                                 </div>
                               </div>


            
             
            
              
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <button type="submit" class="btn btn-primary btn-sm w-100">Submit</button>
                                 </div>
                               </div>
               
                           </form><!-- End General Form Elements -->
             
                           </div>
             
                         </div>
                       </div>
             
                     </div>
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
  <script>
    $('select').selectpicker();
    </script>