@include('layouts.css')

@include('layouts.sidebar')
<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
          @if(\Auth::user()->role == 2)
          @if(!\Auth::user()->sis)
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

               

                <div class="card-body">
                  <h5 class="card-title"> Franchise Wallet <span>| Balance</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-wallet-3-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$balance->amount ?? 0}} </h6>
                      <span class="text-success small pt-1 fw-bold">Balance</span> <span class="text-muted small pt-2 ps-1">Available</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endif
            <!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                

                <div class="card-body">
                  <h5 class="card-title">Boys<span>| count</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class=" ri-user-heart-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$franchiseboys}}</h6>
                      <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Boys</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Customer <span>| count</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class=" ri-price-tag-2-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalcustomers}}</h6>
                      <span class="tet-danger small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Customers</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          <!-- other card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                

                <div class="card-body">
                  <h5 class="card-title">Bookings <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6 style="font-size:23px;">{{$Bookings}}</h6>
                      <span class="text-danger small pt-1 fw-bold">Num Of</span> <span class="text-muted small pt-2 ps-1">Bookings</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- other card -->

                      <!-- other card -->
                      <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">
          
                          
          
                          <div class="card-body">
                            <h5 class="card-title">Today Bookings <span>| Count</span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                              </div>
                              <div class="ps-3">
                                <h6 style="font-size: 23px;">{{$todaybookings}}</h6>
                                <span class="text-danger small pt-1 fw-bold">Today</span> <span class="text-muted small pt-2 ps-1">Bookings</span>
          
                              </div>
                            </div>
          
                          </div>
                        </div>
          
                      </div>
                      <!-- other card -->

                                <!-- other card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                

                <div class="card-body">
                  <h5 class="card-title">Non-Assigned <span>| Count</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class=" ri-questionnaire-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6 style="font-size: 23px;">{{$nonassigned}}</h6>
                      <span class="text-danger small pt-1 fw-bold">Non-assigned</span> <span class="text-muted small pt-2 ps-1">Count</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- other card -->
            @endif

            <!-- role 3 -->
        @if(\Auth::user()->role == 3)
            <!-- Sales Card -->
         <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title"> Today <span>|collection </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-wallet-3-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$todaycollection }} </h6>
                      <span class="text-success small pt-1 fw-bold">Today</span> <span class="text-muted small pt-2 ps-1">Collection</span>

                    </div>
                  </div>
                </div>

              </div>
        </div><!-- End Sales Card -->
        <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title"> Tomorrow <span>|collection </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-wallet-3-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$tomorrowcollection }} </h6>
                      <span class="text-success small pt-1 fw-bold">Tommorrow</span> <span class="text-muted small pt-2 ps-1">Collection</span>

                    </div>
                  </div>
                </div>

              </div>
        </div><!-- End Sales Card -->
        <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

               

                <div class="card-body">
                  <h5 class="card-title"> Total <span>|collection </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-wallet-3-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$totalCollections}}</h6>
                      <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Collection</span>

                    </div>
                  </div>
                </div>

              </div>
        </div><!-- End Sales Card -->
           @endif



            <!-- role 1 admin -->
            @if(\Auth::user()->role == 1)
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

               

                <div class="card-body">
                  <h5 class="card-title">  Franchise / SIS <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-wallet-3-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$franchiseCount}}</h6>
                      <span class="text-success small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Count</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                
                <div class="card-body">
                  <h5 class="card-title">Today Bookings<span>| count</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class=" ri-user-heart-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$todaybookings}}</h6>
                      <span class="text-success small pt-1 fw-bold">Today</span> <span class="text-muted small pt-2 ps-1">Bookings</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

              

                <div class="card-body">
                  <h5 class="card-title">Bookings <span>| count</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class=" ri-price-tag-2-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$Bookings}}</h6>
                      <span class="tet-danger small pt-1 fw-bold">Total</span> <span class="text-muted small pt-2 ps-1">Bookings</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          <!-- other card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Raised Request <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6 style="font-size:23px;">{{$raisedRequest}}</h6>
                      <span class="text-danger small pt-1 fw-bold">Num Of</span> <span class="text-muted small pt-2 ps-1">Raised</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- other card -->

                      <!-- other card -->
                      <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">
          
                        
          
                          <div class="card-body">
                            <h5 class="card-title">Pending Approval <span>| Count</span></h5>
          
                            <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                              </div>
                              <div class="ps-3">
                                <h6 style="font-size: 23px;">{{$pendingapprovals}}</h6>
                                <span class="text-danger small pt-1 fw-bold">Today</span> <span class="text-muted small pt-2 ps-1">Approval</span>
          
                              </div>
                            </div>
          
                          </div>
                        </div>
          
                      </div>
                      <!-- other card -->

                                <!-- other card -->
            <div class="col-xxl-4 col-xl-4">

              

            </div>
            <!-- other card -->
            @endif

            

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->
            @if(\Auth::user()->role == 2)
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                

                <div class="card-body">
                  <h5 class="card-title">Recent<span>| Bookings</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Type</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($latestbookings as $latestbooking)
                      <tr>
                        <th scope="row"><a href="#">{{$latestbooking->id}}</a></th>
                        <td>{{$latestbooking->name}}</td>
                        <td><a href="#" class="text-primary">{{$latestbooking->email}}</a></td>
                        <td>{{$latestbooking->mobile}}</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
           
            <!-- End Recent Sales -->

            <!-- Top Selling -->
            <!--<div class="col-12">-->
            <!--  <div class="card top-selling overflow-auto">-->

                

            <!--    <div class="card-body pb-0">-->
            <!--      <h5 class="card-title">Top Selling <span>| Today</span></h5>-->

            <!--      <table class="table table-borderless">-->
            <!--        <thead>-->
            <!--          <tr>-->
            <!--            <th scope="col">Preview</th>-->
            <!--            <th scope="col">Product</th>-->
            <!--            <th scope="col">Price</th>-->
            <!--            <th scope="col">Sold</th>-->
            <!--            <th scope="col">Revenue</th>-->
            <!--          </tr>-->
            <!--        </thead>-->
            <!--        <tbody>-->
            <!--          <tr>-->
            <!--            <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>-->
            <!--            <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>-->
            <!--            <td>$64</td>-->
            <!--            <td class="fw-bold">124</td>-->
            <!--            <td>$5,828</td>-->
            <!--          </tr>-->
            <!--          <tr>-->
            <!--            <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>-->
            <!--            <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>-->
            <!--            <td>$46</td>-->
            <!--            <td class="fw-bold">98</td>-->
            <!--            <td>$4,508</td>-->
            <!--          </tr>-->
            <!--          <tr>-->
            <!--            <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>-->
            <!--            <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>-->
            <!--            <td>$59</td>-->
            <!--            <td class="fw-bold">74</td>-->
            <!--            <td>$4,366</td>-->
            <!--          </tr>-->
            <!--          <tr>-->
            <!--            <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>-->
            <!--            <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>-->
            <!--            <td>$32</td>-->
            <!--            <td class="fw-bold">63</td>-->
            <!--            <td>$2,016</td>-->
            <!--          </tr>-->
            <!--          <tr>-->
            <!--            <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>-->
            <!--            <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>-->
            <!--            <td>$79</td>-->
            <!--            <td class="fw-bold">41</td>-->
            <!--            <td>$3,239</td>-->
            <!--          </tr>-->
            <!--        </tbody>-->
            <!--      </table>-->

            <!--    </div>-->

            <!--  </div>-->
            <!--</div>-->
            @endif
            <!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
<!-- End Recent Activity -->

          <!-- Budget Report -->
<!-- End Budget Report -->

          <!-- Website Traffic -->
<!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
<!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Hexamed Technologies</span></strong>. All Rights Reserved
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

  <!-- Vendor JS Files -->
  @extends('layouts.script')

</body>

</html>