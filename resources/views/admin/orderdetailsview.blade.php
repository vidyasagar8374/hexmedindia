@include('layouts.css')

@include('layouts.sidebar')

  <main id="main" class="main">

                        @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

    <div class="pagetitle">
      <h1>Ordered Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Ordered Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">

          <h5 class="card-title">Customer Details</h5>
                 @foreach($orders as $k => $order)
                @foreach($order->userdata as  $user)

              <p>Name : {{$user->name}}</p>  
              <p>email : {{$user->email}}</p>  
              <p>Mobile No : {{$user->mobile}}</p>
              <p>address: </p>
              @endforeach
             @endforeach

             <h5 class="card-title">Ordered Details</h5>
            <table class="table  table-striped">
              <thead>
                <tr>
                  <th scope="col">##</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Status</th>
                  <th scope="col">Ordered Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $k => $order)
                @foreach($order->products as  $product)
                @foreach($product->productsdetails as  $productdata)
                <tr>
                  <th scope="row">{{$k+1}}</th>
                  <td>{{$productdata->name}}</td>
                  <td>{{$productdata->price}}</td>
                  <td>{{$product->quantity}}</td>
                  <td>{{$order->status}}</td>
                  <td>{{$productdata->created_at}}</td>

                </tr>
                @endforeach
                @endforeach
                @endforeach


              </tbody>
            </table>

            <form method="post" action="{{ route('changeorderstatus') }}">
             @csrf  
             <div class="row mb-3">
                                 <div class="col-sm-3">
                                 <input type="hidden" class="form-control"  placeholder="price" name="orderid" value="{{$id}}">
                                 @if(\Auth::user()->role == 1)
                                     <select class="form-select" name="status" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state">
                                     <option value="orderd"  @if($order->status == 'orderd') selected @endif>orderd</option>
                                      <option value="orderd"  @if($order->status == 'Cancel') selected @endif>Cancel</option>
                                     <option value="InTransit" @if($order->status == 'InTransit') selected @endif >InTransit</option>
                                     <option value="Delivered" @if($order->status == 'Delivered') selected @endif >Delivered</option>
                                     </select>
                                     @else
                                    
                                     <select class="form-select" name="status" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state">
                                     <option >{{$order->status}}</option>
                                
                                     </select>
                                     @endif
                                 </div>

                                 <!-- added list -->
                             </div>
                             <button type="submit" class="btn btn-primary mt-3">Change Update</button>
            </form>
            <!-- End Table with hoverable rows -->

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