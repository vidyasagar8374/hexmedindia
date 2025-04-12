@include('layouts.css')

@include('layouts.sidebar')
<meta name="csrf-token" content="{{ csrf_token() }}">

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Set Your Availability</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Set Your</li>
          <li class="breadcrumb-item active">Availability</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    

    <div class="container p-3">
      <div class="row bg-light p-5">
          <div class="col-md-12">
              <!-- <form action=""> -->
                  <div class="row g-5">
                      <div class="col-md-4">
                          <div class="input-group">
                              <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                              <input type="date" id="date" class="form-control" min="<?php echo date('Y-m-d', strtotime('0 days')); ?>" max="<?php echo date('Y-m-d', strtotime('+3 days')); ?>" placeholder="Select a Date">
                              <button type="submit" onClick="checkdates()" id="datesubmit" class="btn btn-primary btn-sm float-end">Submit</button>

                            </div>

                      </div>
                      
                      <div id="timings" style="display:none">
                      <div class="col-md-3">
                          <div class="input-group">
                            <input class="form-check-input me-2" type="checkbox" name="time" id="time1" value="06:00 AM - 07:00 AM">
                            <label class="form-check-label" for="time-3">06:00 AM - 07:00 AM</label>
                          </div>
                      </div>

                      <div class="col-md-3">
                          <div class="input-group">
                            <input class="form-check-input me-2" type="checkbox" name="time" id="time2" value="07:00 AM - 08:00 AM">
                            <label class="form-check-label" for="time-3">07:00 AM - 08:00 AM</label>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="input-group">
                          <input class="form-check-input me-2" type="checkbox" name="time" id="time3" value="08:00 AM - 09:00 AM">
                          <label class="form-check-label" for="time-3">08:00 AM - 09:00 AM</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group">
                        <input class="form-check-input me-2" type="checkbox" name="time" id="time4" value="09:00 AM - 10:00 AM">
                        <label class="form-check-label" for="time-3">09:00 AM - 10:00 AM</label>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                      <input class="form-check-input me-2" type="checkbox" name="time" id="time5" value="10:00 AM - 11:00 AM">
                      <label class="form-check-label" for="time-3">10:00 AM - 11:00 AM</label>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="input-group">
                    <input class="form-check-input me-2" type="checkbox" name="time" id="time6" value="11:00 AM - 12:00 PM">
                    <label class="form-check-label" for="time-3">11:00 AM - 12:00 PM</label>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="input-group">
                  <input class="form-check-input me-2" type="checkbox" name="time" id="time7" value="12:00 PM - 01:00 PM">
                  <label class="form-check-label" for="time-3">12:00 PM - 01:00 PM</label>
                </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <input class="form-check-input me-2" type="checkbox" name="time" id="time8" value="01:00 PM - 02:00 PM">
                <label class="form-check-label" for="time-3">01:00 PM - 02:00 PM</label>
              </div>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              <input class="form-check-input me-2" type="checkbox" name="time" id="time9" value="02:00 PM - 03:00 PM">
              <label class="form-check-label" for="time-3">02:00 PM - 03:00 PM</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group">
              <input class="form-check-input me-2" type="checkbox" name="time" id="time10" value="03:00 PM - 04:00 PM">
              <label class="form-check-label" for="time-3">03:00 PM - 04:00 PM</label>
            </div>
        </div>
        <div class="col-md-3">
          <div class="input-group">
            <input class="form-check-input me-2" type="checkbox" name="time" id="time11" value="04:00 PM - 05:00 PM">
            <label class="form-check-label" for="time-3">04:00 PM - 05:00 PM</label>
          </div>
      </div>
      <div class="col-md-3">
        <div class="input-group">
          <input class="form-check-input me-2" type="checkbox" name="time" id="time12" value="05:00 PM - 06:00 PM">
          <label class="form-check-label" for="time-3">05:00 PM - 06:00 PM</label>
        </div>
    </div>
    
</div>

                      <div class="col-1 mt-4">                        
                          <button type="submit" onClick="confirmtiming()" id="timesubmit" style="display:none" class="btn btn-primary btn-sm float-end">Confirm</button>
                          <!-- <button type="button" class="btn btn-outline-secondary btn-sm float-end me-2">Cancel</button> -->
                      </div>
                  </div>
              <!-- </form> -->
          </div>
      </div>
  </div>
  
   




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
            Developed by <a href="https://Mindhuntz.com/">Mindhuntz</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
   @extends('layouts.script')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script>
    function checkdates(){
      //uncheck
      $('#time1').prop('checked', false);
      $('#time2').prop('checked', false);
      $('#time3').prop('checked', false);
      $('#time4').prop('checked', false);
      $('#time5').prop('checked', false);
      $('#time6').prop('checked', false);
      $('#time7').prop('checked', false);
      $('#time8').prop('checked', false);
      $('#time9').prop('checked', false);
      $('#time10').prop('checked', false);
      $('#time11').prop('checked', false);
      $('#time12').prop('checked', false);
     
    
      // end
      // $('#datesubmit').hide();
      $('#timings').show();
      $('#timesubmit').show();
      $.ajax({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url : '/public/boy/getavailibity',
          data : {
            'date' : $('#date').val()
          },
          success : function(result){
           if(result.length == 0){
            debugger
           }else{
            $.each(result, function(key, value) {
              debugger
              if(value.slot == "06:00 AM - 07:00 AM"){
                if(value.is_assigned == 1){
                  $('#time1').prop('disabled', true);
                }
                $('#time1').prop('checked', true);
              }if(value.slot == "07:00 AM - 08:00 AM"){
                if(value.is_assigned == 1){
                  $('#time2').prop('disabled', true);
                }
                $('#time2').prop('checked', true);
              }if(value.slot == "08:00 AM - 09:00 AM"){
                if(value.is_assigned == 1){
                  $('#time3').prop('disabled', true);
                }
                $('#time3').prop('checked', true);
              }if(value.slot == "09:00 AM - 10:00 AM"){
                if(value.is_assigned == 1){
                  $('#time4').prop('disabled', true);
                }
                $('#time4').prop('checked', true);
              }if(value.slot == "10:00 AM - 11:00 AM"){
                if(value.is_assigned == 1){
                  $('#time5').prop('disabled', true);
                }
                $('#time5').prop('checked', true);
              }if(value.slot == "11:00 AM - 12:00 PM"){
                if(value.is_assigned == 1){
                  $('#time6').prop('disabled', true);
                }
                $('#time6').prop('checked', true);
              }if(value.slot == "12:00 PM - 01:00 PM"){
                if(value.is_assigned == 1){
                  $('#time7').prop('disabled', true);
                }
                $('#time7').prop('checked', true);
              }if(value.slot == "01:00 PM - 02:00 PM"){
                if(value.is_assigned == 1){
                  $('#time8').prop('disabled', true);
                }
                $('#time8').prop('checked', true);
              }if(value.slot == "02:00 PM - 03:00 PM"){
                if(value.is_assigned == 1){
                  $('#time9').prop('disabled', true);
                }
                $('#time9').prop('checked', true);
              }if(value.slot == "03:00 PM - 04:00 PM"){
                if(value.is_assigned == 1){
                  $('#time10').prop('disabled', true);
                }
                $('#time10').prop('checked', true);
              }if(value.slot == "04:00 PM - 05:00 PM"){
                debugger
                if(value.is_assigned == 1){
                  $('#time11').prop('disabled', true);
                }
                $('#time11').prop('checked', true);
              }if(value.slot == "05:00 PM - 06:00 PM"){
                if(value.is_assigned == 1){
                  $('#time12').prop('disabled', true);
                }
                $('#time12').prop('checked', true);
              }
                // if(value.slot == )
            });
           }
          }
      })
    }
    function confirmtiming(){
      var timings = [];
      $('input[name="time"]:checked').each(function() {
        timings.push(this.value);
      });
      $.ajax({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url : '/public/boy/setavailibity',
          data : {
            'date' : $('#date').val(),
            'timing' : timings
          },
          success : function(result){
            if(result == 1){
              alert('slots added successfully')
              location.reload()
            }else{
              alert('Something Went Wrong !')
              location.reload()
            }
          }
      })
    }




    // dates

    
    </script>