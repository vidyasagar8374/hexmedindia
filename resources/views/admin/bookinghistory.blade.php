@include('layouts.css')

@include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Booking</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Booking</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
                          <!-- search field -->
                            
                    <!-- booking history -->
                    <div class="col-12">
                      <div class="card recent-sales overflow-auto">
                                <!-- search field -->
                               
        
                        <div class="filter">
                          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                              <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                            <li><a class="dropdown-item" href="#">Total</a></li>

                          </ul>
                        </div>
        
                        <div class="card-body">
                          <h5 class="card-title">Booking History <span>| Total</span></h5>
                          <h3>
                          <a href="{{ route('bookinghistory.export') }}"> 
                            <div class="exprot-data d-flex justify-content-end align item-center">
                            <i class="bi bi-file-earmark-arrow-down-fill"></i></h3>
                          </div></a>
                          </h3>
                         
                           
                          <div class="row">
                              

                          <div class="col-8" style="display:flex">
                            <form action="{{url('franchise/bookinghistory')}}" method="post" style="display:flex">
                              @csrf
                              <input class="form-control mr-sm-2" type="date" placeholder="Search" value="{{$date}}" name="date" aria-label="Search">
                              
                                                            <br><br>
                              @if(\Auth::user()->role == 1)
                              <select name="franchise_id" class="form-control mr-sm-2">
                                  <option value="">Select one</option>
                                  @foreach($franchise as $row)
                                   <option value="{{$row->id}}">{{$row->name}}({{$row->email}})</option>
                                  @endforeach
                              </select>
                              @endif
                              <button  class="btn btn-outline-success" type="submit">Search</button>
                              
                            </form>
                             <a href="{{url('/franchise/bookinghistory')}}">
                                <button class="btn btn-outline-success" type="submit">Reset</button>
                              </a>
</div>
                            <div class="col-2">
                           

                          </div>

                              
        
                              </div>
                         
                          
                          <table class="table table-borderless datatable table-striped">
                          

                            <thead>
                              <tr>
                                <th scope="col">#Uid</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Test</th>
                                @if(\Auth::user()->role == 1)
                                <th scope="col">Franchise Name</th>
                                @endif
                                <th scope="col">Package</th>

                                <!-- <th scope="col">Boy</th> -->
                                <th scope="col">Number</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Bokking Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              @foreach($data as $i => $row)
                              <tr>
                                <th scope="row"><a href="#">{{$row->booking_id}}</a></th>
                                <td>{{$row->name}}</td>
                                <td><a href="#" class="text-primary">
                                 @foreach($row->testdetails as $info)
                                  {{$info->name->name}},
                                 @endforeach
                                </a></td>
                                @if(\Auth::user()->role == 1)
                                @foreach($row->frachisedetails as $franchise)
                                <td>{{ $franchise->tradename }}</td>
                                @endforeach
                                @endif
                                <td><a href="#" class="text-primary">
                                 @foreach($row->packagedetails as $info)
                                    {{$info->pc->package}},
                                 @endforeach
                                </a></td>

                                <!-- <td>{{$row->boydetails == null ? '' : $row->boydetails->name}} </td> -->
                                <td>{{$row->mobile}}</td>
                                <td><?php if(isset($row->date)){ ?> {{$row->date}} & {{$row->time}} <?php }else{?> In-center <?php } ?></td>
                                <td>{{$row->created_at}}</td>
                                <td>
                                    @if($row->status == "sample collection pending")
                                    <span class="badge bg-warning">{{$row->status}}</span>
                                    @elseif($row->status == "sample collected")
                                     <span class="badge bg-secondary">{{$row->status}}</span>
                                    @elseif($row->status == "recived")
                                     <span class="badge bg-primary">received</span>
                                      @elseif($row->status == "collection pending")
                                     <span class="badge bg-danger">{{$row->status}}</span>
                                     @elseif($row->status == "Ready for collection")
                                     <span class="badge bg-dark">{{$row->status}}</span>
                                     @elseif($row->status == "completed")
                                     <span class="badge bg-success">{{$row->status}}</span>
                                     	
                                    @elseif(true)
                                     <span class="badge bg-secondary">Sample recived</span>
                                    @endif
                                </td>
                                <td><svg onclick="viewbokkedtestdetails({{$row->id}})" xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                
                                
                              <a href="{{route('bill',['id' => $row->id])}}"> <svg onclick="viewbokkedtestdetailsbill({{$row->id}})" xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 512 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg> </a> 
                                
                                </td>
                                <!-- <td><svg onclick="viewbokkedtestdetails({{$row->id}})" xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.<path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></td> -->
                                <!-- <td scope="col"><a class="text-center">Download<i class="ri-download-fill"></i></a></td> -->
                              </tr>
                              @endforeach
                             
                            </tbody>
                          </table>
        
                        </div>
        
                      </div>
                    </div><!-- End Recent Sales -->
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
