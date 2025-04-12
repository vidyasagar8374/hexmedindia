<?php
    //   dd($requestdata);
    $pricesarray = [];
    $total = 0;
    //\Artisan::call('optimize');
  //  die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
   .right {
      text-align: right;
    }
       @media print {
        .print-button {
            display: none;
        }
        
          @page {
    margin-top: 0.5cm;
    margin-bottom: 0.5cm;
  }

  /* Optionally, hide the URL in the footer as well */
  body::after {
    content: '';
    display: block;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 1cm;
    background-color: white; /* Set the background color to match the page */
    z-index: 999; /* Set a high z-index to overlay other content */
  }
    }
  </style>
</head>

<body style="background-color: #e2e1e0; font-family: 'Open Sans', sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000;">

  <table style=" margin: px auto 10px; background-color: #fff; padding: 50px; border-radius: 3px; box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24); ">

    
    
    
    
    
    
    
    
    
    
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="card-body ">
                            <div class="row p-3  pt-5 align-items-center justify-content-center" style="margin-bottom:-20px">
                                
                                <div class="text-center col-sm-3 col-md-3">
                                    <img class="image-fluid" src="https://franchise-hexamed.com/public/assets/img/hexamedlogo.png" style="width:100%" alt="">
                                </div>
                                <div class="col-sm-9 col-md-9">
                                    <h5 class="right" style="font-size: 13px;">{{$addressdetails->franchisedetails->tradename ?? 'NA'}}</h5>
                                    <p class="right" style="font-size: 11px;">{{$addressdetails->franchisedetails->address  ?? 'NA'}} <br>Mobile :{{$addressdetails->mobile}}
                                    </p>
                                </div>
    
                            </div>
    <hr>
    <!-- second row -------------------------------------------------------------------------------------------------------------------------------------------------- -->
                            <div class="d-flex justify-content-between pt-1">
                                <div class="">
                                    <div class="">
                                        <h5  style="font-size:12px" class="font-size-16 mb-3">Patient: &nbsp;<span style="font-weight: 700; font-size:13px">{{$requestdata['name']}}</span></h5>
                                        <h5  style="font-size:12px" class="font-size-16 mb-3">DOB/ Age: &nbsp; <span style="font-weight: 700; font-size:13px">{{$requestdata['age']}}</span>
                                        <h5  style="font-size:12px" class="font-size-16 mb-3">Sex: Female &nbsp; <span style="font-weight: 700; font-size:13px">{{$requestdata['gender']}}</span>                                    </h5>
                                        <h5  style="font-size:12px" class="font-size-16 mb-3"> Mob:&nbsp; <span style="font-weight: 700; font-size:13px">{{$requestdata['number']}}</span>
                                        <!--<h5  style="font-size:12px" class="font-size-16 mb-3">Patient UID:&nbsp; <span style="font-weight: 700; font-size:13px">HLD2801202416270</span>-->
                                        <h5  style="font-size:12px" class="font-size-16 mb-3">Visit Date:&nbsp; <span style="font-weight: 700; font-size:13px">{{date("d-m-Y")}}</span>
    
    
                                    </div>
                                </div>
                                <div class="">
                                    <div class="">
                                        <div>
                                            <h5 style="font-size:12px" class=" mb-3">Bill No: <span style="font-weight: 600; font-size:13px">{{$booking_id}}</span>
    
                                        </div>
                                        <div class="mt-4">
                                            <h5  style="font-size:12px" class=" mb-3">Bill Date: <span style="font-weight: 600; font-size:13px">{{$time}}</span>
    
                                        </div>
                                        <!--<div class="mt-4">-->
                                        <!--    <h5  style="font-size:12px" class=" mb-3">Ref: <span style="font-weight: 600; font-size:13px">SELF</span>-->
    
                                        <!--</div>-->
                                        <div class="mt-4">
                                            <h5  style="font-size:12px" class=" mb-3">Dept: <span style="font-weight: 600; font-size:13px">{{$requestdata['dep'] ?? ''}}</span>
    
                                        </div>
                                         <div class="mt-4">
                                            <h5  style="font-size:12px" class=" mb-3">Referred By: <span style="font-weight: 600; font-size:13px">{{$requestdata['ref_doctor'] ?? ""}}</span>
    
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
     <!-------------------------------------------------------------------------------------- end row -->
                            
                            <div class="p-4">
        
                                <div class="table-responsive table-bordered ">
                                    <table class="table align-middle table-nowrap table-centered mb-0 ">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;">#</th>
                                                <th>ITEM</th>
                                                <td>MRP</td>
					<td>Discount Value</td>
					<td>Discount Percentage</td>
                                                <!--<th>DESCRIPTION</th>-->
                                                <!--<th>QTY</th>-->
                                                <!--<th>UNIT PRICE</th>-->
                                                <th>Total</th>
                                            </tr>
                                        </thead><!-- end thead -->
                                        <tbody>
                                            
                                            	
                                              <?php 
                                                if(isset($requestdata['tests'])){
                                                    ?>
                                                    <input type="hidden" id="testscount" value="{{count($requestdata['tests'])}}" >
                                                    <?php
                                                foreach($requestdata['tests'] as $x => $test)
                                                {
                                                    $data = explode(",",$test);
                                                    // dd($data[1]);
                                                    $total += $data[1];
                                                //  dd($data);
                                                  
                                          ?>
                                           <tr>
                                            <th scope="row">{{$x + 1}}</th>
                                            <td>
                                                <div>
                                                    <p class="text-truncate mb-1" style="font-size: 14px; font-weight: 600;">{{ $data[2] }}</p>
                                                </div>
                                            </td>
                                            <!--<td style="font-size: 14px; font-weight: 600;"></td>-->
                                            <!--<td style="font-size: 14px; font-weight: 600;" class="text-center">1</td>-->
                                            <td style="font-size: 14px; font-weight: 600;">{{ $data[1] }}</td>
                                            
                                            <td><input onKeyup="Discountvalue('{{$data[0] . ',' . $data[1]}}')" id="data<?php echo $data[0] ?>" type="number" class="testdiscountval{{$x}}"></td>
					<td><input onKeyup="Discountpercentage('{{$data[0] . ',' . $data[1]}}')" id="percentage<?php echo $data[0] ?>" type="number" class="testdiscountper{{$x}}"></td>
					<td><span class="{{'classinfo' . $x}}" id="final<?php echo $data[0] ?>">{{$data[1]}}</span></td>
				
                                            <!--<td style="font-size: 14px; font-weight: 600;" class="text-end">75.00</td>-->
                                        </tr>
                                        
                                         <?php } } ?>
                                         <?php 
                                                if(isset($requestdata['packages'])){
                                                      ?>
                                                    <input type="hidden" id="packagescount" value="{{count($requestdata['packages'])}}" >
                                                    <?php
                                                    
                                                     if(isset($requestdata['tests'])){ 
                                                        $count= COUNT($requestdata['tests']);
                                                    }else{
                                                        $count = 0;
                                                    }
                                                foreach($requestdata['packages'] as $x => $package)
                                                {
                                                    $packages = explode(",",$package);
                                                    $total += $packages[1];
                                          ?>
                                          <tr>
                                            <th scope="row">{{ $x+ 1 + $count}}</th>
                                            <td>
                                                <div>
                                                    <p class="text-truncate mb-1" style="font-size: 14px; font-weight: 600;">{{  $packages[2]}}.</p>
                                                </div>
                                            </td>
                                            <!--<td style="font-size: 14px; font-weight: 600;"></td>-->
                                            <!--<td style="font-size: 14px; font-weight: 600;" class="text-center">1</td>-->
                                            <td style="font-size: 14px; font-weight: 600;" >{{$packages[1]}}</td>
                                            <!--<td style="font-size: 14px; font-weight: 600;" class="text-end">75.00</td>-->
                                            
                                            <td><input onKeyup="Discountvaluep('{{$packages[0] . ',' . $packages[1]}}')" id="datap<?php echo $packages[0] ?>" type="number"  class="packagediscountval{{$x}}"></td>
					<td><input onKeyup="Discountpercentagep('{{$packages[0] . ',' . $packages[1]}}')" id="percentagep<?php echo $packages[0] ?>" type="number" class="packagediscountper{{$x}}"></td>
					<td><span class="{{'classinfo' . $x + $count}}" id="finalp<?php echo $packages[0] ?>">{{$packages[1]}}</span></td>


                                        </tr>

                                        
                                         <?php } } ?>
                                         @if(isset($requestdata['packages']))
                                         @if(count($requestdata['packages']))
                                         <input type="hidden" id="packagescount" value="{{count($requestdata['packages'])}}" >
                                         @else
                                            <input type="hidden" id="packagescount" value="0">
                                         @endif
                                         @endif
                                         
                                            <!--<tr>-->
                                            <!--    <th scope="row">01</th>-->
                                            <!--    <td>-->
                                            <!--        <div>-->
                                            <!--            <p class="text-truncate mb-1" style="font-size: 14px; font-weight: 600;">RENAL FUNCTION SCREENING - UREA.</p>-->
                                            <!--        </div>-->
                                            <!--    </td>-->
                                            <!--    <td style="font-size: 14px; font-weight: 600;"></td>-->
                                            <!--    <td style="font-size: 14px; font-weight: 600;" class="text-center">1</td>-->
                                            <!--    <td style="font-size: 14px; font-weight: 600;" class="text-center">150.00</td>-->
                                            <!--    <td style="font-size: 14px; font-weight: 600;" class="text-end">75.00</td>-->
                                            <!--</tr>-->
                                            <!-- end tr -->
                                            <!--<tr>-->
                                            <!--    <th scope="row">01</th>-->
                                            <!--    <td>-->
                                            <!--        <div>-->
                                            <!--            <p class="text-truncate mb-1" style="font-size: 14px; font-weight: 600;">RENAL FUNCTION SCREENING - UREA.</p>-->
                                            <!--        </div>-->
                                            <!--    </td>-->
                                            <!--    <td style="font-size: 14px; font-weight: 600;"></td>-->
                                            <!--    <td style="font-size: 14px; font-weight: 600;" class="text-center">1</td>-->
                                            <!--    <td style="font-size: 14px; font-weight: 600;" class="text-center">150.00</td>-->
                                            <!--    <td style="font-size: 14px; font-weight: 600;" class="text-end">75.00</td>-->
                                            <!--</tr>-->
    
                                            <!-- end tr -->
         
                                            <!-- end tr -->
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">
                                                    Grand Total</th>
                                                <td class="border-0 text-end" id="totalbillamount">{{$total}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">
                                                    Discount (Rs.)</th>
                                                <td class="border-0 text-end" id="calculateddiscount">0</td>
                                            </tr>
    
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">
                                                    Net amount (Rs.)</th>
                                                <td class="border-0 text-end" id="calculatedgrandtotal">{{$total}}</td>
                                            </tr>
    
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                    <div class="d-flex justify-content-between p-3" style="border-bottom: 1px solid rgb(199, 199, 199);">
                                       
                                        {{--<div style="font-size: 14px; font-weight: 600;">{{$requestdata['id']}}</div>--}}
                                        <div style="font-size: 14px; font-weight: 600;">{{$requestdata['cashtype']}}</div>
                                        <div style="font-size: 14px; font-weight: 600;"></div>
                                    </div>
                                    <div class="d-flex justify-content-end p-3">
                                        <div style="font-size: 14px; font-weight: 800;">Billed User : &nbsp; &nbsp;</div>
                                        <div style="font-size: 14px; font-weight: 600;">{{\Auth::user()->name}}</div>
                                    </div>
                                    <div class="pt-3">
                                        <ol>
                                            <li style="font-size: 13px; font-weight: 600;">In case of cancellation of service, the refund will be processed within 72 hours, if payment is made through UPI/Card/accounttransfer or any, other than cash.</li>
                                            <li style="font-size: 13px; font-weight: 600;"> You will be called for the service delivery at your turn based on the sequence.</li>
                                            <!--<li style="font-size: 13px; font-weight: 600;"> Doctors may call you out of your sequence at his discretion</li>-->
                                        </ol>
                                    </div>
                                    <button style="text-align:center" id="printButton" class="print-button">Print</button>   
			<button style="text-align:center" id="printButton" class="print-button" onclick="bookconfirm()" >Book & Confirm</button>   
                                </div><!-- end table responsive -->
    
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    
    
    
     
    
    
    
    


  </table>
  
  

</body>
 
<script>

window.finalbillprice = $('#finalbill').val()
	
		var finalamountbill = <?php echo array_sum($pricesarray); ?>;
		$('#finalamountbill').append(finalamountbill)
		
		
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
		function bookconfirm()
		{
		    var testscount = $('#testscount').val()
		    var packagescount = $('#packagescount').val()
		    var testdetailsval = [];
		    var testdetailsper = [];
            // Use a for loop to iterate and save data in the array
            for (var i = 0; i < parseInt(testscount); i++) {
                var testdetailsget = ".testdiscountval"+i
                var testdetailsgetper = ".testdiscountper"+i
              testdetailsval.push($(testdetailsget).val());
              testdetailsper.push($(testdetailsgetper).val());
              debugger
            }
            
            var packagedetailsval = [];
		    var packagedetailsper = [];
            for (var i = 0; i < parseInt(packagescount); i++) {
                var packagedetailsget = ".packagediscountval"+i
                var packagedetailsgetper = ".packagediscountper"+i
              packagedetailsval.push($(packagedetailsget).val());
              packagedetailsper.push($(packagedetailsgetper).val());
              debugger
            }
            
            $.ajax({
              type: 'POST',
              url: '/public/franchise/billing',
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: { 
                  testdetailsval: testdetailsval,
                  testdetailsper: testdetailsper,
                  packagedetailsval: packagedetailsval,
                  packagedetailsper:packagedetailsper
              },
              success: function(response) {
                  if(response == 1)
                  {
                      	window.location.href = 'https://franchise-hexamed.com/public/franchise/billing/success'
                  }
              },
              error: function(error) {
                  debugger
                console.error(error);
              }
            });
    
    
    
// 		
		}
		
		
		function Discountvalue(id){
		   
			var info = id.split(',');
			
			var dataid = '#data' + info[0]
			var dataprice =  info[1]
			var amount = $(dataid).val()
			if(amount == ""){
			    var amount = 0;
			}
			
			    var dataid = '#percentage' + info[0]
		        $(dataid).val('')
			
			    
		        var finalprice =  dataprice - amount
    			var appendid= "#final"+ info[0]
    			$(appendid).empty()
    			$(appendid).append(parseInt(finalprice))

			finalcount()
			
			

		}
		function Discountpercentage(id){
		    
			var info = id.split(',');
			
		    
			var dataid = '#percentage' + info[0]
			var dataprice =  info[1]
			var amount = $(dataid).val()
			if(amount == ""){
			    var amount = 0;
			}
			
			    var dataid = '#data' + info[0]
		        $(dataid).val('')
		
			    
		        var per =  100 - amount
			var finalprice = ( per / 100 ) * dataprice
			var appendid= "#final"+ info[0]
			$(appendid).empty()
			$(appendid).append(parseInt(finalprice))
// 			}
			finalcount()
			
		}




		function Discountvaluep(id){
			
			var info = id.split(',');
			var dataid = '#datap' + info[0]
			var dataprice =  info[1]
			var amount = $(dataid).val()
			if(amount == ""){
			    var amount = 0;
			}
			    var dataid = '#percentagep' + info[0]
			    $(dataid).val('')
			    	var finalprice =  dataprice - amount
			var appendid= "#finalp"+ info[0]
			$(appendid).empty()
			$(appendid).append(parseInt(finalprice))
// 			}
			finalcount()
		
		}
		function Discountpercentagep(id){
			var info = id.split(',');
			var dataid = '#percentagep' + info[0]
			var dataprice =  info[1]
			var amount = $(dataid).val()
			if(amount == ""){
			    var amount = 0;
			}
			    var dataid = '#datap' + info[0]
			    $(dataid).val('')
			    	var per =  100 - amount
			var finalprice = ( per / 100 ) * dataprice
			var appendid= "#finalp"+ info[0]
			$(appendid).empty()
			$(appendid).append(parseInt(finalprice))
// 			}
			finalcount()
		
		}
		function finalcount()
		{
		    var paccount = $('#packagescount').val();
		    if(paccount == undefined){
		        var paccount = 0;
		    }
		    var testccount = $('#testscount').val();
		    if(testccount == undefined){
		        var testccount = 0;
		    }
		    var start = parseInt(paccount) + parseInt(testccount)
		    
		    var sum = 0;
		    for (var i = 0; i < start; i++) {
		        var classinfodata = ".classinfo"+i;
		        var number = $(classinfodata).text();
		        
                sum += parseInt(number)
                
            }
            $('#calculatedgrandtotal').empty()
            $('#calculatedgrandtotal').append(parseInt(sum))
            $('#calculateddiscount').empty();
            $('#calculateddiscount').append(parseInt($('#totalbillamount').text()) - parseInt(sum));
		    
		}
    </script>
</html>
