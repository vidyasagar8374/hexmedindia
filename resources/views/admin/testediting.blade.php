@include('layouts.css')

@include('layouts.sidebar')
<main id="main" class="main">


<div class="col-lg-12">
                        
                        <div class="card p-5">
                           <h5  class="card-title text-center bg-light">Edit Test & Price</h5>
             
                           <!-- General Form Elements -->
                           <div class="p-1 pt-3">
             
                             <form>
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <input type="text" class="form-control" placeholder="Name of Test" required>
                                 </div>
                               </div>
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <input type="number" class="form-control" placeholder="Price of the test" required>
                                 </div>
                               </div>
                               
             
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                     <select class="form-select" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state">
                                     <option selected>Status</option>
                                     <option value="Active">Active</option>
                                     <option value="Inactive">Inactive</option>
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