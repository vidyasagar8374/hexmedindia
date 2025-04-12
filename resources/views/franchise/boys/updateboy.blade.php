
<?php 
//   dd($franchiseboy);
//   dd($franchiseboy->id);
?>
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
             
                             <form method="post" action="{{route('updateboy')}}" enctype='multipart/form-data'>
                             @csrf  
                             <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <input type="text" class="form-control" placeholder="Name"   value="{{$franchiseboy[0]['boydetails']->name}}" name="name" required>
                                   <input type="hidden" class="form-control" placeholder="id"   value="{{$franchiseboy[0]->id}}" name="id" >
                                   <input type="hidden" class="form-control" placeholder="user_id"   value="{{$franchiseboy[0]->user_id}}" name="user_id" >
                                 </div>
                               </div>
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <input type="number" class="form-control" placeholder="Number" value="{{$franchiseboy[0]['boydetails']->mobile}}"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"  name="mobile" required>
                                 </div>
                               </div>

                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <input type="email" class="form-control" placeholder="Email" value="{{$franchiseboy[0]['boydetails']->email}}"  name="email" required readonly>
                                 </div>
                               </div>

                               <!-- <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <input type="password" class="form-control" placeholder="Password"   name="password" required>
                                 </div>
                               </div> -->

                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                   <textarea class="form-control"  placeholder="Address"  name="address" required>{{$franchiseboy[0]->address}}</textarea>
                                 </div>
                               </div>
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                    Aadhar:
                                   <input type="file" class="form-control" placeholder="Aadhar" name="aadhar" id="UpdateAadhar"  onchange="UpdateBoyAadhar()">
                                   <iframe id="pdfPreviewAadhar" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;" src="{{ asset('documents/boys/'.$franchiseboy[0]->user_id.'/'. $franchiseboy[0]->aadhar) }}"></iframe>
                                 </div>
                               </div>
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                    Pan:
                                   <input type="file" class="form-control" placeholder="" name="pan" id="UpdatePan"  onchange="UpdateBoyPan()">
                                   <iframe id="pdfPreviewPan" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;" src="{{ asset('documents/boys/'.$franchiseboy[0]->user_id.'/'. $franchiseboy[0]->pan) }}"></iframe>
                                 </div>
                               </div>
                               <div class="row mb-3">
                                 <div class="col-sm-12">
                                    Licence:
                                   <input type="file" class="form-control" placeholder="licience" name="licience" id="UpdateLicience" onchange="UpdateBoyLicence()">
                                   <iframe id="pdfPreviewLicience" style="width: 40%; border: 1px solid #ccc; margin:5px 5px;" src="{{ asset('documents/boys/'.$franchiseboy[0]->user_id.'/'. $franchiseboy[0]->licience) }}"></iframe>
                                 </div>
                               </div>
             
                               <div class="row mb-3 mt-2">
                                 <div class="col-sm-12">
                                     <select class="form-select" name="status" aria-label="Default select example"  data-live-search="true" data-live-search-placeholder="Search for a state">
                                    
                                     <option value="1" @if(old('status', $franchiseboy[0]['boydetails']->is_verified) == 1) selected @endif>Active</option>
                                     <option value="0" @if(old('status', $franchiseboy[0]['boydetails']->is_verified) == 0) selected @endif>Inactive</option>
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