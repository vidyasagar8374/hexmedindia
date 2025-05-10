@include('layouts.css')

@include('layouts.sidebar')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<main id="main" class="main">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="col-lg-12">
                        
                        <div class="card p-4">
                          @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                           <h5  class="card-title text-center bg-light">Edit Package</h5>
             
                           <!-- General Form Elements -->
                           <div class="p-1 pt-3">
                            <div id="detailsinfo">
                              <p>Package Name: <b>{{$data->package}}</b></p>
                              <input type="hidden" name="package" value="{{$data->id}}" id="package">
                              @foreach($data->details as $tests)
                                <button class="btn btn-danger"  style="margin-top:17px;margin-bottom:5px">{{$tests->testdetails->name}}       </button><svg onClick="deleteTest({{$tests->testdetails->id}})" style="margin-top:-25px; margin-left:-10px;cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                              @endforeach
</div>
                            

                             <br>
                             <br>

                             <form method="post" action="{{route('assignpackagetotest')}}">
                              @csrf
                              <input type="hidden" name="package" value="{{$data->id}}">
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <select class="selectpicker" multiple data-live-search="true" required name="tests[]">
                                     @foreach($testsinfo as $test)
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
    function deleteTest(id)
    {
      var package = $('#package').val();
      $.ajax({
        url: '/admin/deletetest',
        type: "post",
        data : {
          package : package,
          id : id
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            if(data == 1){
              $("#detailsinfo").load(location.href + " #detailsinfo");
            }else{
              alert('try again something went wrong')
              location.reload()
            }
        }
    });
    }
    </script>