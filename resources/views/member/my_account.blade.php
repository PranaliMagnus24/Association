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
    <h1>
        @if(!empty($companyProfile) && !empty($companyProfile->company_name))
            {{ $companyProfile->company_name }} Account
        @else
            Default Title
        @endif
    </h1>
</div>

<div class="row mt-4">
    <!-- Membership Details Card -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Membership Details</h5>
            </div>
            <div class="card-body">
                @if(!empty($companyProfile))
                    <p><strong>Membership ID:</strong> {{ $companyProfile->membership_id ?? 'N/A' }}</p>
                    <p><strong>Member Name:</strong> {{ $user->name ?? 'N/A' }}</p>
                    <p><strong>Registration Date:</strong>
    {{ $companyProfile->registration_date ? \Carbon\Carbon::parse($companyProfile->registration_date)->format('d-m-Y') : 'N/A' }}
</p>
<p><strong>Renewal Date:</strong>
    {{ $companyProfile->renewal_date ? \Carbon\Carbon::parse($companyProfile->renewal_date)->format('d-m-Y') : 'N/A' }}
</p>

                @else
                    <p>No membership details available.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Payment Details Card -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Payment Details</h5>
            </div>
            <div class="card-body">
                @if(!empty($companyProfile))
                    <p><strong>Payment Method:</strong> {{ $companyProfile->method ?? 'N/A' }}</p>
                    <p><strong>Amount Paid:</strong> ₹{{ number_format($companyProfile->amount_paid ?? 0, 2) }}</p>
                    <p><strong>Transaction Date:</strong> {{ $companyProfile->transaction_date ?? 'N/A' }}</p>
                    <p><strong>Transaction ID:</strong> {{ $companyProfile->transaction_id ?? 'N/A' }}</p>
                    <button class="btn btn-info">Download/View Invoice</button>
                @else
                    <p>No payment details available.</p>
                @endif
            </div>
        </div>
    </div>
</div>






  </main>

  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

</body>

</html>
