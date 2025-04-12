@include('layouts.css')

@include('layouts.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Franchise Wallet balance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">franchise</li>
          <li class="breadcrumb-item active">wallet</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
          
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Total Franchise Wallet Balance</button>
                </li>
          
             
          
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#transaction-history">Recent Transaction History</button>
                </li>
          
              </ul>
              <div class="tab-content pt-2">
          
                <div style="background-color: rgb(188, 215, 255);" class="tab-pane fade show active profile-overview p-4" id="profile-overview">

                  <div class="row bg-light ps-3 align-items-center">
                    <div class="col-lg-11 col-md-10 label ">
                      <h5 class="card-title ">Available Balance &nbsp;<span style="font-weight: 600; font-size: 18px; text-decoration: underline; color:rgb(1, 66, 128)">{{$balance->amount}} &#x20B9; </span></h5>
                    </div>
                    
                  </div>
                  <form action="{{route('stripe.post')}}" method="post">
                    @csrf
                  <div class="col-md-7">
                    <label><b>Amount</b></label>
                    <input type="number" name="wallet" class="from-control">
                    <input type="submit" class="from-control" value="Recharge">
                  </div>
                </form>
                </div>
                </div>
          
                <div class="tab-pane fade" id="transaction-history">
                  <!-- Transaction History Content -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Recent Transaction History</h5>
        <!-- Bordered Table -->
        <table class="table table-bordered">
          <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Date</th>
                <th scope="col">Ref Id</th>
                <th scope="col">Transaction Amount</th>
                <th scope="col">Status</th>
              </tr>
          </thead>
          <tbody>
            @foreach($transistions as $transistion)
            <tr>
              <th scope="row">{{$transistion->id}}</th>
              <td>{{$transistion->created_at}}</td>
              <td>{{$transistion->trans_id}}</td>
              <td>{{$transistion->payment}}</td>
              <td><span class="badge bg-primary">{{$transistion->status}}</span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
                      <!-- End Bordered Table -->
        
                      <!-- End Primary Color Bordered Table -->
        
    </div>
</div>
                  <!-- Add your Transaction History content here -->
                </div>
          
              </div><!-- End Bordered Tabs -->
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