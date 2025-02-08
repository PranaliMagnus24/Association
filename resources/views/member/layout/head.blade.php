<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    @if(!empty($companyProfile) && !empty($companyProfile->company_name))
        {{ $companyProfile->company_name }}
    @else
        Default Title
    @endif
</title>

  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Favicons -->

  <link href="{{ $companyProfile->company_logo ? url('upload/company_documents/' . $companyProfile->company_logo) : asset('homecss/assets/images/logo/logo.jpg') }}" rel="icon">
<link href="{{ $companyProfile->company_logo ? url('upload/company_documents/' . $companyProfile->company_logo) : asset('homecss/assets/images/logo/logo.jpg') }}" rel="apple-touch-icon">



  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('usercss/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('usercss/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('usercss/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('usercss/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('usercss/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('usercss/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('usercss/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('usercss/assets/css/style.css')}}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />


<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>
