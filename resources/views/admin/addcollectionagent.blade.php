@include('layouts.css')

@include('layouts.sidebar')
<main id="main" class="main">


<div class="col-lg-12">
                        
                        <div class="card p-5">
                        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                           <h5  class="card-title text-center bg-light">Create Boy</h5>
             
                           <!-- General Form Elements -->
                           <div class="p-1 pt-3">
             
                             <form method="post" action="{{route('insertnewcollection')}}" enctype='multipart/form-data'>
                             @csrf  
                             <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <input type="text" class="form-control" placeholder="Name" name="name" required>
                                 </div>
                               </div>
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <input type="number" class="form-control" placeholder="Number" name="mobile" required>
                                 </div>
                               </div>

                        

                              

                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <textarea class="form-control"  placeholder="Address" name="address" required></textarea>
                                 </div>
                               </div>
                               
                              
                               
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                     <select class="form-select" name="status" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state">
                                    
                                     <option value="1">Active</option>
                                     <option value="0">Inactive</option>
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
   
            Designed And Developed by <a href="https://Mindhuntz.com/">Mindhuntz</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @extends('layouts.script')