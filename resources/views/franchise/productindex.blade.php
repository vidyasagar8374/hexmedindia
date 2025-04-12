@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item active">Product List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">
      
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Products</h5>
            <!-- <a href="{{route('products')}}"><button type="button" class="btn btn-outline-primary float-end">Add Products +</button></a><br /><br /> -->

            <!-- Table with hoverable rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $row)
                <tr>
                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->name}}</td>
                  <td>{{$row->description}}</td>
                  
                  <td>{{$row->price}}</td>
                  <td><input type="number" name="prduct_{{$row->id}}" id="quantity{{$row->id}}" class="form-control" style="width: 7em"></td>
                  
                  <td><a  onclick="load_cart('{{$row->id}}')" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg></a></td>
                </tr>
                @endforeach
                
              </tbody>
            </table>


            <!-- End Table with hoverable rows -->

          </div>
        </div>


      </div>

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

function load_cart(id){
  debugger
     getMessage(id);

};
var getMessage = function(id){

    // var productName = "{{ $row->name }}";
    var productId = id;
    var quantityid = "#quantity" + id
    var quantity = $(quantityid).val();
    if(quantity == ""){
      alert('specify quantity');
      return false
    }
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
            debugger
           if(data.success == true){
            alert('Product added to cart');
           location.reload()
           }else if(data.success == false){
            $(quantityid).val('');
            alert('Product already in cart');
           }else{
            alert('something went wrong')
           }
           

        }
    });
}
</script>



</body>

</html>