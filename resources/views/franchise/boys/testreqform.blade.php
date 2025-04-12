@include('layouts.css')

@include('layouts.sidebar')
@php
    use Carbon\Carbon;
@endphp
<main id="main" class="main">

<section class="section ">
    <div class="row align-items-center">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

      <div class="col-lg-12">
     
        <div class="card">
        @if(\Auth::user()->role == 2 &&  $info->status == "sample collected")
        <form action="{{ route('samplecollectionformrecived') }}" method="post">
          @csrf
        <div class="container-fluid bg-secondary mb-4 text-center">
            <h5 class="card-title text-white">Recived Status Update </h5>
          </div>
          <input type="hidden" value="{{$info->id}}" name="id" class="form-control">

          <div class="card-body ">
            <label>Update Recived Status : <label>
            <input type="submit" class="btn btn-primary" value="Recived">
          </div>
      </form>
      @endif
          <div class="container-fluid bg-secondary mb-4 text-center">
            <h5 class="card-title text-white">TEST REQUISITION FORM </h5>
          </div>
          <div class="card-body ">
         
            <!-- General Form Elements -->
            <form action="{{ route('samplecollectionform') }}" method="post">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                  <input type="text" value="{{$info->name}}" name="fullname" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail"   class="col-sm-2 col-form-label">Email Address</label>
                <div class="col-sm-10">
                  <input type="email" value="{{$info->email}}" name="fullname" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail"   class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                  <input type="text" value="{{$info->city}}" name="fullname" class="form-control">
                </div>
              </div>
             
              


              <input type="hidden" value="{{$info->id}}" name="id" class="form-control">

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="col-sm-10">
                  <input type="number" name="testreqName_Mobile"  value="{{$info->mobile}}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input type="text" name="testreqName_Address"  value="{{$info->address}}" class="form-control">
                </div>
              </div>
              @if(isset( $info->dateofbirth))
                            <label for="inputEmail"   class="col-sm-2 col-form-label">DOB :</label> {{ Carbon::createFromFormat('Y-m-d', $info->dateofbirth)->format('d F Y') }}<br>
              @else
                            <label for="inputEmail"   class="col-sm-2 col-form-label">DOB :</label> NA<br>
              @endif

              <label for="inputEmail"   class="col-sm-2 col-form-label">Date :</label> {{$info->date ?? "NA"}}<br>
              <label for="inputEmail"   class="col-sm-2 col-form-label">Time : </label> {{$info->time ?? "NA"}}<br>

              <label for="inputEmail"   class="col-sm-2 col-form-label">Gender : </label> {{$info->gender}}<br>
              <label for="inputEmail"   class="col-sm-2 col-form-label">Test Details :</label>
              <label>
             
              @foreach($info->testdetails as $infodata)
                {{$infodata->name->name}},
                @endforeach
              
              </label>
              <br>


              <label for="inputEmail"   class="col-sm-2 col-form-label">Package Details :</label>
              <label>
             
              @foreach($info->packagedetails as $infodata)
                                    {{$infodata->pc->package}},
                                 @endforeach
              
              </label>
              <br>



              <div class="container-fluid bg-secondary mb-4 text-center">
                <h5 class="card-title text-white">Referring Physician</h5>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Dr. Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$info->ref_doctor ?? ''}}" name="testreqName_dr_name" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Hospital /City</label>
                <div class="col-sm-10">
                  <input type="text" name="testreqName_Hospital" value="{{$data->hospital_city ?? ''}}" class="form-control">
                </div>
              </div>
              
              <!--<div class="row mb-3">-->
              <!--  <label for="inputText" class="col-sm-2 col-form-label">Contact No:</label>-->
              <!--  <div class="col-sm-10">-->
              <!--    <input type="number" name="testreqName_Contact" value="{{$data->contact ?? ''}}" class="form-control">-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="row mb-3">-->
              <!--  <label for="inputText" class="col-sm-2 col-form-label">Specimen Collection & Collected by sign</label>-->
              <!--  <div class="col-sm-10">-->
              <!--    <input type="text" name="testreqName_Specimen_Collection_Collected" value="{{$data->specimen_collection ?? ''}}" class="form-control">-->
              <!--  </div>-->
              <!--</div>-->
             

              <div class="container-fluid bg-secondary mb-4 text-center">
                <h5 class="card-title text-white">For Collection Centers/ Outstation Clients/Home Collection </h5>
              </div>
              
              
              <!---->
              
               <div class="row mb-3">
                <label for="inputDateTime" class="col-sm-2 col-form-label">Date and Time</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="testreqName_Date_and_Time" value="{{$data->date_time ?? ''}}" class="form-control" id="inputDateTime">
                </div>
             </div>
             <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Storage Temp./ Temp. in sample received </label>
                <div class="col-sm-10">
                  <select id="stateSelect" name="testreqName_sample_received" value="{{$data->storage ?? ''}}" class="form-select" aria-label="Select State">
                    <option selected >Ambient 18-22°C</option>
                    <option selected >Refrigerated: 2-8°C</option>
                    <option selected >Frozen- 20°C</option>
                    
                  </select>
                </div>
              </div>
            

              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Clinical Details  <span style="color:red">*</span></label>
                <div class="col-sm-10">
                  <input type="text" name="testreqName_Clinical_Details" required value="{{$data->clinical_details ?? ''}}" class="form-control" placeholder="Mention clinical history and taking any drug or not, attach relevant investigational results">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Test Name/Profile: </label>
                <div class="col-sm-10">
                  <input type="text" name="testreqName_Profile" value="{{$data->test_name ?? ''}}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Specimen Type: </label>
                <div class="col-sm-10">
                  <input type="text" name="testreqSpecimenType" value="{{$data->specimen_type ?? ''}}" class="form-control">
                </div>
              </div>
              
              
              
              
              <!---->
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Tubes: </label>
                <div class="col-sm-10">
                  <select class="form-control">
                        <option >Yellow Tube</option>
                         <option>Pink Tube</option>
                         <option>Purple Tube</option> 
                         <option>urine Tube</option>
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Total Number of Containers: <span style="color:red">*</span></label>
                <div class="col-sm-10">
                    
                  <input type="text" name="testreqContainers" value="{{$data->total_num_of_con ?? ''}}" class="form-control" required>
                </div>
              </div>
               
              
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Specimen Collected by: </label>
                <div class="col-sm-10">
                  <input type="text" name="testreqSpecimen" value="{{$data->spiceman_clctd_by ?? ''}}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Date of Shipment:</label>
                <div class="col-sm-10">
                  <input type="date" name="testreqShipment" value="{{$data->date_of_shipment ?? ''}}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">No. of Sample Received: </label>
                <div class="col-sm-10">
                  <input type="text" name="testreqSampleReceived" value="{{$data->no_of_samples_recieved ?? ''}}" class="form-control">
                </div>
              </div>
              <!--<div class="row mb-3">-->
              <!--  <label for="inputPassword" class="col-sm-2 col-form-label">Storage Condition: </label>-->
              <!--  <div class="col-sm-10">-->
              <!--    <input type="text" name="testreqStorageCondition" value="{{$data->storage_condition ?? ''}}" class="form-control">-->
              <!--  </div>-->
              <!--</div>-->
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Received Date and Time: </label>
                <div class="col-sm-10">
                  <input type="date" name="testreqReceivedDateandTime" value="{{$data->recieved_date_time ?? ''}}" class="form-control">
                </div>
              </div>
              @if(\Auth::user()->role != 1)
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit</label>
                <div class="col-sm-10">
                  <button type="submit" name="testreqsubmit" class="btn btn-primary btn-sm w-100">Submit Form</button>
                </div>
              </div>

            @endif
            </form>

         
            <div class="container-fluid bg-secondary mb-4 text-center">
            <h5 class="card-title text-white">Documents </h5>
          </div>
        <div class="row">

          @foreach($documents as $document)
         
          <object data="{{url($document->testdocuments)}}" type="application/pdf" width="40%" height="100%">
        
          </object>
          <p><a target="_blank" href="{{url($document->testdocuments)}}">Click to View </a></p>

          @endforeach

</div>
          <!-- xXSX -->
          @if(\Auth::user()->role == 1 && $info->request_raised == 1)
          <form action="{{url('/boy/testreqformdocuments/' . $info->id)}}" method="post" enctype='multipart/form-data'>
          @csrf
          <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Test Documents</label>
                <div class="col-sm-5">
                <input type="file" class="form-control" id="fileUpload" accept="application/pdf" name="collection[]" multiple>
                    <div class="row mb-3 mt-3">
                    <label class="col-sm-2 col-form-label"></label>
                    
                  </div>
                 
                </div>
                <div class="col-sm-2">
                      <button type="submit" name="testreqsubmit" style="align:right" class="btn btn-primary btn-sm w-100">Upload</button>
                    </div>
              </div>
            </form>
          @endif

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