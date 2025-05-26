@include('layouts.css')

@include('layouts.sidebar')
<meta name="csrf-token" content="{{ csrf_token() }}">

<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Franchise</li>
          <li class="breadcrumb-item active">request</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->

              <div class="">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">{{$details->franchisedetails->about ?? 'Not Available'}}</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Proprietor Name</div>
                    <div class="col-lg-9 col-md-8">{{$details->name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email Address</div>
                    <div class="col-lg-9 col-md-8">{{$details->email}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mobile Number</div>
                    <div class="col-lg-9 col-md-8">{{$details->mobile}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                    <div class="col-lg-9 col-md-8">{{$details->franchisedetails->dob}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    <div class="col-lg-9 col-md-8">{{$details->franchisedetails->gender == 1 ? 'male' : ($details->franchisedetails->gender == 2 ? 'female' : '')}}</div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">State</div>
                    <div class="col-lg-9 col-md-8">{{$details->franchisedetails->state}}</div>
                  </div> -->

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">City</div>
                    <div class="col-lg-9 col-md-8">{{$details->franchisedetails->city ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Pincode</div>
                    <div class="col-lg-9 col-md-8">{{$details->franchisedetails->pincode ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{$details->franchisedetails->address ?? ''}}</div>
                  </div>

                @if($details->sis != 1)
                 <div class="row">
                    <div class="form-group col-lg-3 col-sm-12">
                      <label for="limit_req" class="label">Limit Request</label>
                  </div>
                  <div class="d-flex gap-2 col-md-4">
                      <input type="text" class="form-control" id="limit_req" 
                            placeholder="" 
                            value="{{ $details->franchisedetails->limit_req ?? '' }}" >
                            <button class="btn btn-sm btn-primary" onclick="updateLimit('{{ $details->franchisedetails->id }}')">Update Limit</button>
                    </div>
                  </div>
                @endif

                  <!-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Password</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div> -->

                  <div class="row">
                    
                    <div class="col-lg-12 col-md-6 label">
                    
                       
                        <a target="_blank" href="{{asset('documents/franchise/' . $details->id . '/' .$details->franchisedetails->aadhar)}}" >click here to view Aadhar</a>
                    </div>
                    <div class="col-lg-12 col-md-6 label">
                  
                    <a target="_blank" href="{{asset('documents/franchise/' . $details->id . '/' .$details->franchisedetails->pan)}}" >click here to view Pan </a>
                    </div>
                    <br>
                    
                    <div class="col-lg-12 col-md-6 label">
                  
                    <a target="_blank" href="{{asset('documents/franchise/' . $details->id . '/' .$details->franchisedetails->labour)}}" >click here to view Labour Licience </a>
                    </div>

                      
                    <div class="col-lg-12 col-md-6 label">
                  
                    <a target="_blank" href="{{asset('documents/franchise/' . $details->id . '/' .$details->franchisedetails->licience)}}" >click here to view Clinical Establishment license </a>
                    </div>



<br>
                    <div class="col-lg-12 col-md-6 label">
                
              
                    <a target="_blank" href="{{asset('documents/franchise/' . $details->id . '/' .$details->franchisedetails->bio)}}" >click here to view Biomedical Waste Certificate </a>
                    </div>
<br>

                    <div class="col-lg-12 col-md-6 label">
                    <a target="_blank" href="{{asset('documents/franchise/' . $details->id . '/' .$details->franchisedetails->rental)}}" >click here to view Rental Agreement </a>
                    </div>
<br>
@foreach($details->tolietimages as $x=> $image)
@if($image->is_toilet == 1)

                    <div class="col-lg-12 col-md-6 label">
                   
                    <a target="_blank" href="{{asset('documents/franchise/' . $details->id . '/' .$image->images)}}" > {{$x + 1}} click here to view Toilet And Space Images </a>
                    </div>
                    @endif
                    @endforeach
<br>
@foreach($details->tolietimages as $y=> $image)
@if($image->is_toilet == 0)
                    <div class="col-lg-12 col-md-6 label">
                    
                    <a target="_blank" href="{{asset('documents/franchise/' . $details->id . '/' .$image->images)}}" >{{$y + 1}} click here to view Collection Images </a>
                    </div>
 @endif
                    @endforeach

                    


                </div>
                
                  <div class="row" id="approvereject" style="display:none">
                    <div class="col-md-6">
                      <div class="col-lg-9 col-md-8 w-100"><button onClick="ApproveFranchise('{{$details->id}}', 1)" class="btn btn-primary btn-sm w-50">Approve</button></div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-lg-9 col-md-8 w-100"><button onClick="ApproveFranchise('{{$details->id}}', 2)" class="btn btn-danger btn-sm w-50">decline</button></div>
                    </div>
                  </div>
                  

                  <div class="row" id="approved" style="display:none">
                    <div class="col-md-6">
                      <div class="col-lg-9 col-md-8 w-100"><button disabled class="btn btn-primary btn-sm w-50">Accepted</button></div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-lg-9 col-md-8 w-100"><button onClick="ApproveFranchise('{{$details->id}}', 2)" class="btn btn-danger btn-sm w-50">Deactivate</button></div>
                    </div>
                  </div>


                  <div class="row" id="rejected" style="display:none">
                    <div class="col-md-6">
                      <div class="col-lg-9 col-md-8 w-100"><button disabled class="btn btn-danger btn-sm w-50">Rejected</button></div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-lg-9 col-md-8 w-100"><button onClick="ApproveFranchise('{{$details->id}}', 1)" class="btn btn-primary btn-sm w-50">Approve</button></div>
                    </div>
                  </div>
                  



                </div>





              </div><!-- End Bordered Tabs -->

            </div>
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
  @extends('layouts.script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
  $(document).ready(function () {
    var recordstatus = "<?php echo $details->is_verified; ?>" ;

    if(recordstatus == 0){
      $('#approvereject').show();
    }
    if(recordstatus == 1){
      $('#approved').show();
    }
    if(recordstatus == 2){
      $('#rejected').show();
    }



});

function updateLimit(franchiseId) {
  limitValue = $('#limit_req').val();
    fetch("{{ route('update.limit') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            limit_req: limitValue,
            id: franchiseId
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            alert('Limit updated successfully.');
        } else {
            alert('Failed to update limit.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred.');
    });
}






  function ApproveFranchise(id, status){
    debugger
  $.ajax({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post',
      url : '/public/admin/approvefranchise',
      data : {
        'id' : id,
        'status' : status
      },
      success : function(result){
        if(result.success == true && result.message=="approved"){
          $('#approvereject').hide();
          $('#rejected').hide();
          $('#approved').show();
        }else if(result.success == true && result.message=="rejected"){
          $('#approvereject').hide();
          $('#approved').hide();
          $('#rejected').show();
        }
      }
  })
  }
  </script>

</body>

</html>