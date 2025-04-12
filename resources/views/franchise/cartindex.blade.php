@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Cart List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Cart</li>
          <li class="breadcrumb-item active">Cart List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">
      
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Products</h5>
            <!-- <a href="{{route('products')}}"><button type="button" class="btn btn-outline-primary float-end">Add Products +</button></a><br /><br /> -->
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                   <th scope="col">Price</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                                      <?php 
                     $amount = 0; 
                    ?>
                @foreach($cartlists as $cart)
                    @foreach($cart->cartlist as $row)
                    <?php
                    $amount += $cart->quantity * $row->price;
                    ?>
                <tr>
                  <td>{{$row->name}}</td>
                  <td>{{$cart->quantity}}</td>
                  <td>{{$cart->quantity * $row->price}}</td>
                  <td> <a href="{{url('franchise/deletefromcart/' . $cart->id)}}"><i class="bi bi-trash3"></i></a></td>

                </tr>
                
                @endforeach
                @endforeach
              </tbody>
            </table>
Total Amount : {{$amount}}
<br>
Wallet Balance: {{$walletbalance}}

            <!-- End Table with hoverable rows -->

          </div>
        </div>


      </div>
      @if($walletbalance - $amount > 2000)  
      <a class="float:right"  href="{{ route('addorder',['cartlist'=>urlencode(json_encode($cartlists))]) }}"><button class="btn btn-primary">Buy now</button>
      @else
      No sufficient balance
      <a class="float:right"  href="{{ url('/franchise/franchisewallet')}}"><button class="btn btn-primary">Recharge Wallet</button></a>
@endif
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
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Vendor JS Files -->
@extends('layouts.script')

  <!-- Modal for viewing details -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>

$(document).on('click', '#load_cart', function(event) {
    
    event.preventDefault();
    alert('selected');
    /* Act on the event */

     getMessage();

});
var getMessage = function(){
    var productId = "{{ $row->id ?? '' }} ";
    // var quantity =  $("#quantity").val();
    var quantity = $("#quantity").val();
   //var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        
        type:'POST',
        url:"{{ route('addcart') }}", //Make sure your URL is correct
        
        dataType: 'json', 
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //Make sure your returning data type dffine as json
        data: {
            productId: productId,
            quantity : quantity
                   
                },
       
        success:function(data){
            console.log(data); //Please share cosnole data
            if(data.msg) //Check the data.msg isset?
            {
                $("#msg").html(data.msg); //replace html by data.msg
            }

        }
    });
}
</script>



</body>

</html>