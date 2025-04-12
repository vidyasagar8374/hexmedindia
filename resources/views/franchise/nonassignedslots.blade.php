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
     

                    <!-- booking history -->
                    <div class="col-12">
                      <div class="card recent-sales overflow-auto">
        
                        
        
                        <div class="card-body">
                          <h5 class="card-title">Booking History <span>| Total</span></h5>
                          <div class="row">
                          <form action="/franchise/nonassignedslots" method="post" style="display:flex">
                            @csrf
                            <div class="col-md-3">
                            <input class="form-control mr-sm-2" type="date" value="{{$date}}" placeholder="Search"  name="date" aria-label="Search">
</div>
                            <button class="btn btn-outline-success my-2 mx-2 my-sm-0" type="submit">Search</button>
                          </form>
                          <div class="col-md-2">
                          <a href="{{route('nonassignedslots')}}">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Reset</button></a>
</div>
</div>
                          <table class="table table-borderless datatable table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#cid</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Number</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $i => $row)
                              <tr>
                                <th scope="row"><a href="#">#{{$i+1}}</a></th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->mobile}} </td>
                                <td>{{$row->city}}</td>
                                <td>{{$row->date}} & {{$row->time}}</td>
                                <td><span class="badge bg-success">{{$row->status}}</span></td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" onclick="viewTestDetails('{{$row->id}}')" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></td>
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