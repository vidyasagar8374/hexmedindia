<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('assets/js/iframe.js')}}"></script>

  <script>
    function viewTestDetails(id){
      window.location = "<?php echo url('/franchise/viewbokkedslot/') ?>" + '/' + id
    }
    function changeSlotDetails(id){
      window.location = "<?php echo url('/viewslotdata/') ?>" + '/' + id
    }
    function viewbokkedtestdetails(id){
      window.location = "<?php echo url('/boy/testreqform/') ?>" + '/' + id
    }
    function viewbokkedtestdetailsbill(id){
        window.location = "<?php echo url('/viewbokkeddetails/bill') ?>" + '/' + id
    }
    </script>