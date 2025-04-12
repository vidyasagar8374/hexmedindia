@include('layouts.css')

@include('layouts.sidebar')
<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Solt Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Slots</li>
          <li class="breadcrumb-item active">Slot Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      

        <!-- for booking coloumn -->

        <div class="col-lg-12">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
          <div class="card">
            <div class="card-body">
              <h5  class="card-title text-center bg-light">Slot Details</h5>

              <!-- General Form Elements -->
              <div class="p-1 pt-3">

                <form action="{{route('updateslottoboys')}}" method="post">
                    @csrf
                  <label>Name : {{$data->name ?? ''}}</label><br>
                  <label>Mobile : {{$data->mobile ?? ''}}</label><br>
                  <label>Date : {{$data->date ?? ''}}</label><br>
                  <label>Time : {{$data->time ?? ''}}</label><br>
                  <label>Boy Assigned : {{$data->boydetails->name ?? 'Not Assigned'}}</label><br>


                <input type="hidden" name="id" value="{{$data->id}}" >
                <input type="hidden" name="timedetails" value="{{$data->time}}" >
                <input type="hidden" name="datedetails" value="{{$data->date}}" >


                <input type="hidden" name="boy_id" value="{{$data->boy_id}}" >
                <br>
                <h5 style="text-align:center">Update Boy Details<h5>
                    <div class="col-md-6">
                        <label>Boys</label>
                        <select name="boy_id" class="form-select" aria-label="Default select example" data-live-search="true" data-live-search-placeholder="Search for a state" required>
                        <option></option>
                        @foreach($boys as $boy)
                        
                        <option value="{{$boy->user_id}}">
                          {{$boy->boydetails->name}}({{$boy->boydetails->email}}) 
                          @foreach($boy->slots as $s)
                            @if($s->date == $data->date && $s->slot == $data->time && $s->is_assigned == null)
                            (Available)
                            @elseif($s->date == $data->date && $s->slot == $data->time && $s->is_assigned == 1)
                            (Already Assigned)
                            @endif
                          @endforeach
                        </option>
                        @endforeach
                          </select>
                    </div>

                    <input style="margin-top:10px" type="submit" name="submit" value="submit">

                  
              </form><!-- End General Form Elements -->

              </div>

            </div>
          </div>

        </div>

        <!-- booking end -->

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

  @extends('layouts.script')
  <script>
    // function dateslots(e){
    //   var date = e.target.value
    //   $.ajax({
    //     headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //       },
    //       type: 'post',
    //       url : '/boy/',
    //       data : {
    //         'date' : date
    //       },
    //       success : function(result){
           
    //       }
    //   })
    // }
    </script>
</body>

</html>