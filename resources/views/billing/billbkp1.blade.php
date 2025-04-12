<?php
    //   dd($requestdata);
    $total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>official bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    
</head>
<body>

    <div class="container p-5">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-3 align-items-center justify-content-center">
                            
                            <div class="text-center col-4">
                                <img src="https://mindhuntz.com/assets/img/hexamedlogo.png" style="height:60px" alt="">
                            </div>
                            <div class="col-8">
                                <h5 style="">HEXAMED DIAGNOSTICS AND SPECIALTY CLINICS</h5>
                                <p>25-270/6, Taluka Bahu, Main Bypass Road, NH1A, Channi Himmat
                                    JammuJammu and Kashmir, India 180015
                                    Phone: 18002126547</p>
                            </div>

                        </div>
<hr>
<!-- second row -------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        <div class="d-flex justify-content-around pt-5">
                            <div class="">
                                <div class="">
                                    <h5  style="font-size:15px" class="font-size-16 mb-3">Patient: &nbsp;<span style="font-weight: 700; font-size:16px">{{$requestdata['name']}}</span></h5>
                                    <h5  style="font-size:15px" class="font-size-16 mb-3">DOB/ Age: &nbsp; <span style="font-weight: 700; font-size:16px">{{$requestdata['age']}} </span>
                                    <h5  style="font-size:15px" class="font-size-16 mb-3">Sex: Female Mob: &nbsp; <span style="font-weight: 700; font-size:16px">{{$requestdata['number']}}</span>                                    </h5>
                                    <!--<h5  style="font-size:15px" class="font-size-16 mb-3">Patient UID:&nbsp; <span style="font-weight: 700; font-size:16px">HLD2801202416270</span>-->
                                    <h5  style="font-size:15px" class="font-size-16 mb-3">Visit Date:&nbsp; <span style="font-weight: 700; font-size:16px">{{date("d-m-Y")}}</span>


                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <div>
                                        <h5 style="font-size:15px" class=" mb-3">Bill No: <span style="font-weight: 600; font-size:15px">{{$booking_id}}</span>

                                    </div>
                                    <div class="mt-4">
                                        <h5  style="font-size:15px" class=" mb-3">Bill Date: <span style="font-weight: 600; font-size:15px">{{$time}}</span>

                                    </div>
                                    <div class="mt-4">
                                        <h5  style="font-size:15px" class=" mb-3">Ref: <span style="font-weight: 600; font-size:15px">SELF</span>

                                    </div>
                                    <div class="mt-4">
                                        <h5  style="font-size:15px" class=" mb-3">Dept: <span style="font-weight: 600; font-size:15px">Lab</span>

                                    </div>
                                </div>
                            </div>
                        </div>
 <!-------------------------------------------------------------------------------------- end row -->
                        
                        <div class="p-5">
    
                            <div class="table-responsive table-bordered p-3">
                                <table class="table align-middle table-nowrap table-centered mb-0 ">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">#</th>
                                            <th>ITEM</th>
                                            <!--<th>DESCRIPTION</th>-->
                                            <!--<th>QTY</th>-->
                                            <!--<th>UNIT PRICE</th>-->
                                            <th>Total</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                         <?php 
                                                if(isset($requestdata['tests'])){
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
                                            <td style="font-size: 14px; font-weight: 600;"></td>
                                            <!--<td style="font-size: 14px; font-weight: 600;" class="text-center">1</td>-->
                                            <td style="font-size: 14px; font-weight: 600;" class="text-center">{{ $data[1] }}</td>
                                            <!--<td style="font-size: 14px; font-weight: 600;" class="text-end">75.00</td>-->
                                        </tr>
                                        <?php } } ?>
                                        
                                          <?php 
                                                if(isset($requestdata['packages'])){
                                                foreach($requestdata['packages'] as $x => $package)
                                                {
                                                    $packages = explode(",",$package);
                                                    $total += $packages[1];
                                                        
                                    
                                          ?>
                                          <tr>
                                            <th scope="row">{{ $x+1 }}</th>
                                            <td>
                                                <div>
                                                    <p class="text-truncate mb-1" style="font-size: 14px; font-weight: 600;">{{  $packages[2]}}.</p>
                                                </div>
                                            </td>
                                            <td style="font-size: 14px; font-weight: 600;"></td>
                                            <!--<td style="font-size: 14px; font-weight: 600;" class="text-center">1</td>-->
                                            <td style="font-size: 14px; font-weight: 600;" class="text-center">{{$packages[1]}}</td>
                                            <!--<td style="font-size: 14px; font-weight: 600;" class="text-end">75.00</td>-->
                                        </tr>

                                        
                                         <?php } } ?>
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
                                        <!--<tr>-->
                                        <!--    <th scope="row" colspan="5" class="border-0 text-end">-->
                                        <!--        Total</th>-->
                                        <!--    <td class="border-0 text-end">150.00</td>-->
                                        <!--</tr>-->

                                        <!--<tr>-->
                                        <!--    <th scope="row" colspan="5" class="border-0 text-end">-->
                                        <!--        Grand Total (Rs.)</th>-->
                                        <!--    <td class="border-0 text-end">150.00</td>-->
                                        <!--</tr>-->

                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                                <div class="d-flex justify-content-between p-3" style="border-bottom: 1px solid rgb(199, 199, 199);">
                                    <div style="font-size: 14px; font-weight: 600;">0041</div>
                                    <div style="font-size: 14px; font-weight: 600;">{{$requestdata['cashtype']}}</div>
                                    <div style="font-size: 14px; font-weight: 600;">{{number_format($total,2,'.','')}} Rs</div>
                                </div>
                                <div class="d-flex justify-content-end p-3">
                                    <div style="font-size: 14px; font-weight: 800;">Billed User : &nbsp; &nbsp;</div>
                                    <div style="font-size: 14px; font-weight: 600;">Madhu Bala</div>
                                </div>
                                <div class="pt-3">
                                    <ol>
                                        <li>In case of cancellation of service, the refund will be processed within 72 hours, if payment is made through UPI/Card/accounttransfer or any, other than cash.</li>
                                        <li> You will be called for the service delivery at your turn based on the sequence.</li>
                                        <li> Doctors may call you out of your sequence at his discretion</li>
                                    </ol>
                                </div>
                            </div><!-- end table responsive -->

                        </div>
                        <button id="printButton">Print</button>   
			<button id="printButton" onclick="bookconfirm()" >Book & Confirm</button>   
                    </div>
                </div>
                
            </div><!-- end col -->
        </div>
    </div>



</body>
 <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
		function bookconfirm()
		{
			window.location.href = 'https://mindhuntz.com/franchise/billing'
		}
    </script>
</html>
