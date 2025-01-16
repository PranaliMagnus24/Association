<!DOCTYPE html>
<html lang="en">

<head>
  @include('member.layout.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('member.layout.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('member.layout.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>    @if(!empty($companyProfile) && !empty($companyProfile->company_name))
        {{ $companyProfile->company_name }}
    @else
        Default Title
    @endif</h1>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

   @include('member.layout.body')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

</body>

</html>
