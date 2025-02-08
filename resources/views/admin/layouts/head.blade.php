<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @php
    $getSetting = \App\Models\GeneralSetting::first();
@endphp
  <title>{{$getSetting->association_name}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}" rel="icon">
  <link href="{{ $getSetting->association_logo ? url('upload/general_setting/' . $getSetting->association_logo) : asset('homecss/assets/images/logo/logo.jpg') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admincss/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('admincss/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admincss/assets/css/style.css')}}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />

