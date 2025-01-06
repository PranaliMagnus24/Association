<!DOCTYPE html>
<html lang="en">

<head>
  @include('member.layouts.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('member.layouts.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('member.layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   @include('member.layouts.body')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('member.layouts.footer')

</body>

</html>
