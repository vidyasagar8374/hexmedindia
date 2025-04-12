@include('layouts.css')

@include('layouts.sidebar')
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Coupons</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Approve</li>
          <li class="breadcrumb-item active">Coupons</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="col-lg-12">


        <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Trasactions</h5>
                <a href="{{ route('exportransactions')  }}"><h3><i class="bi bi-file-earmark-arrow-down-fill"></i></h3></a>
             </div>
          <div class="card-body">
           
            
            <!-- Table with hoverable rows -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Transcation id</th>
                  @if(auth()->user()->role == 1)
                  <th scope="col">Franchise</th>
                  @endif
                  <th scope="col">Amount</th>
                  <th scope="col">Date</th>
                  <th scope="col">Ids</th>
                </tr>
              </thead>
              <tbody id="items-container">
                @include('admin.transactionfetch')
                
              </tbody>
             
            </table>
            <!-- E  nd Table with hoverable rows -->
            <div class="ajax-load-gif text-center" style="display:none">
                    <p><img src="{{ asset('assets/img/loadinggif.gif') }}"></p>
                </div>
            
            </div>  
            </div>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
	        page++;
	        loadMoreData(page);
	    }
	});
	function loadMoreData(page){
	  $.ajax({
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function(){
	                $('.ajax-load-gif').show();
	            }
	        })
	        .done(function(data){
                if(!data.html || data.html.trim() === ""){
                        $('.ajax-load-gif').html("No records!");
                        return;
                    }
	            $('.ajax-load-gif').hide();
	            $("#items-container").append(data.html);
	        })
	}
</script>

  <!-- Modal for viewing details -->


  @extends('layouts.script')

</body>

</html>