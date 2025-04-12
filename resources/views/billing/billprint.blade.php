<?php
    $total = 0;
    $sum = 0;
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
    }
  </style>
</head>

<body style="background-color: #e2e1e0; font-family: 'Open Sans', sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000;">

  <table style=" margin: px auto 10px; background-color: #fff; padding: 50px; border-radius: 3px; box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24); ">

    
    
    
    
    
    
    
    
    
    
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="card-body ">
                            <div class="row p-3  pt-5 align-items-center justify-content-center" style="margin-bottom:-20px">
                                
                                <div class="text-center col-sm-3 col-md-3">
                                    <img class="image-fluid"  src="https://franchise-hexamed.com/public/assets/img/hexamedlogo.png" style="width:100%" alt="">
                                </div>
                                <div class="col-sm-9 col-md-9">
                                            <h5 class="right" style="font-size: 13px;">{{$addressdetails->franchisedetails->tradename ?? 'NA'}}</h5>
                                    <p class="right" style="font-size: 11px;">{{$addressdetails->franchisedetails->address  ?? 'NA'}} <br>Mobile :{{$addressdetails->mobile}}
                                </div>
    
                            </div>
    <hr>
    <!-- second row -------------------------------------------------------------------------------------------------------------------------------------------------- -->
                            <div class="d-flex justify-content-around pt-1">
                                <div class="">
                                    <div class="">
                                        <h5  style="font-size:12px" class="font-size-16 mb-3">Patient: &nbsp;<span style="font-weight: 700; font-size:13px">{{$requestdata['name']}}</span></h5>
                                        <h5  style="font-size:12px" class="font-size-16 mb-3">DOB/ Age: &nbsp; <span style="font-weight: 700; font-size:13px">{{$requestdata['dob']}}</span>
                                        <h5  style="font-size:12px" class="font-size-16 mb-3">Sex: Female &nbsp; <span style="font-weight: 700; font-size:13px">{{$requestdata['gender']}}</span>                                    </h5>
                                        <h5  style="font-size:12px" class="font-size-16 mb-3"> Mob:&nbsp; <span style="font-weight: 700; font-size:13px">{{$requestdata['mobile']}}</span>
                                        <!--<h5  style="font-size:12px" class="font-size-16 mb-3">Patient UID:&nbsp; <span style="font-weight: 700; font-size:13px">HLD2801202416270</span>-->
                                        <h5  style="font-size:12px" class="font-size-16 mb-3">Visit Date:&nbsp; <span style="font-weight: 700; font-size:13px">{{date("d-m-Y")}}</span>
    
    
                                    </div>
                                </div>
                                <div class="">
                                    <div class="">
                                        <div>
                                            <h5 style="font-size:12px" class=" mb-3">Bill No: <span style="font-weight: 600; font-size:13px">{{$requestdata['booking_id']}}</span>
    
                                        </div>
                                        <?php
                                        $originalDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $requestdata['created_at']);
                                         $formattedDate = $originalDateTime->format('d-m-Y h:i:s A');
?>
                                        <div class="mt-4">
                                            <h5  style="font-size:12px" class=" mb-3">Bill Date: <span style="font-weight: 600; font-size:13px">{{$formattedDate}}</span>
    
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
                                                if($requestdata['testdetails']){
                                                foreach($requestdata['testdetails'] as $x => $test)
                                                {
                                                    $total += $test->actual_price;
                                            ?>
                                            
                                           <tr>
                                            <th scope="row">{{$x + 1}}</th>
                                            <td>
                                               
                                                <div>
                                                    <p class="text-truncate mb-1" style="font-size: 14px; font-weight: 600;">{{$test->name->name}}</p>
                                                </div>
                                            </td>
                                           
                                            <td style="font-size: 14px; font-weight: 600;">{{$test->actual_price}}</td>
                                            <td style="font-size: 14px; font-weight: 600;">{{$test->discount_value}}</td>
                                            <?php
                                            
                                            $percentage = 100 - $test->discount_percentage;
                                            $val = ($test->actual_price * $percentage)/100
                                            ?>
                                             <td style="font-size: 14px; font-weight: 600;">{{$test->discount_percentage}}</td>
                                            @if($test->discount_value == "")
                                            <?php $sum += $val; ?>
                                            <td style="font-size: 14px; font-weight: 600;">{{$val}}</td>
                                            @else 
                                            <?php $sum += $test->actual_price - $test->discount_value; ?>
                                            <td style="font-size: 14px; font-weight: 600;">{{ $test->actual_price - $test->discount_value}}</td>
                                            @endif
                                        </tr>
                                       
                                        
                                         <?php } } ?>
                                         <?php 
                                         
                                                if(isset($requestdata['packagedetails'])){
                                                     
                                                     if(isset($requestdata['testdetails'])){ 
                                                        $count= COUNT($requestdata['testdetails']);
                                                    }else{
                                                        $count = 0;
                                                    }
                                                foreach($requestdata['packagedetails'] as $x => $package)
                                                {
                                                    $total += $package->actual_price;
                                                   
                                                   
                                          ?>
                                          <tr>
                                            <th scope="row">{{ $x+ 1 + $count}}</th>
                                            <td>
                                                <div>
                                                    <p class="text-truncate mb-1" style="font-size: 14px; font-weight: 600;">{{$package->pc->package}}.</p>
                                                </div>
                                            </td>
                                            <td style="font-size: 14px; font-weight: 600;">{{$package->actual_price}}</td>
                                            <td style="font-size: 14px; font-weight: 600;">{{$package->discount_value}}</td>
                                            <td style="font-size: 14px; font-weight: 600;" >{{$package->discount_percentage}}</td>
                                            <?php
                                            
                                            $percentage = 100 - $package->discount_percentage;
                                            $val = ($package->actual_price * $percentage)/100
                                            ?>
                                            @if($package->discount_value == "")
                                            <?php $sum += $val; ?>
                                            <td style="font-size: 14px; font-weight: 600;">{{$val}}</td>
                                            @else 
                                            <?php $sum += $package->actual_price - $package->discount_value; ?>
                                            <td style="font-size: 14px; font-weight: 600;">{{ $package->actual_price - $package->discount_value}}</td>
                                            @endif

				
                                        </tr>

                                        
                                         <?php } } ?>
                                        
                                         
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
                                                <td class="border-0 text-end" id="calculateddiscount">{{$total-$sum}}</td>
                                            </tr>
    
                                            <tr>
                                                <th scope="row" colspan="5" class="border-0 text-end">
                                                    Net amount (Rs.)</th>
                                                <td class="border-0 text-end" id="calculatedgrandtotal">{{$sum}}</td>
                                            </tr>
    
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                    <div class="d-flex justify-content-between p-3" style="border-bottom: 1px solid rgb(199, 199, 199);">
                                       
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
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>
</html>
