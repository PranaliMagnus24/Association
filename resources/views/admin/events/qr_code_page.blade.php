
<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.layouts.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.layouts.sidebar')
  <main id="main" class="main">

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Event Registration Details</h5>
        </div>
        <div class="card-body">
            @if(isset($eventForm))
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <th class="w-25">Name:</th>
                            <td class="text-capitalize">{{ $eventForm->name }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $eventForm->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $eventForm->email }}</td>
                        </tr>
                        <tr>
                            <th>Country:</th>
                            <td class="text-capitalize">{{ $eventForm->countries->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>State:</th>
                            <td class="text-capitalize">{{ $eventForm->states->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>City:</th>
                            <td class="text-capitalize">{{ $eventForm->cities->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Event:</th>
                            <td>{{ $eventForm->event->title ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Event Start Date & Time:</th>
                            <td>
                                {{ $eventForm->event->eventstartdatetime
                                    ? \Carbon\Carbon::parse($eventForm->event->eventstartdatetime)->format('d F Y h:i A')
                                    : 'N/A'
                                }}
                            </td>
                        </tr>
                        <tr>
                            <th>Event Mode:</th>
                            <td class="text-uppercase">{{ $eventForm->event->mode ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Check-In Time:</th>
                            <td>
                                {{ $eventForm->check_in
                                    ? \Carbon\Carbon::parse($eventForm->check_in)->format('d F Y h:i A')
                                    : 'Not Checked In'
                                }}
                            </td>
                        </tr>
                        <tr>
                            <th>Check-Out Time:</th>
                            <td>
                                {{ $eventForm->check_out
                                    ? \Carbon\Carbon::parse($eventForm->check_out)->format('d F Y h:i A')
                                    : 'Not Checked Out'
                                }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Check-In & Check-Out Buttons -->
                <form action="{{ route('event.checkin', $eventForm->id) }}" method="POST">
    @csrf
    @if (!$eventForm->check_in)
        <!-- If the user hasn't checked in, show Check In button -->
        <button type="submit" class="btn btn-success">Check In</button>
    @elseif ($eventForm->check_in && !$eventForm->check_out)
        <!-- If the user has checked in but not checked out, show Check Out button -->
        <button type="submit" formaction="{{ route('event.checkout', $eventForm->id) }}" class="btn btn-danger">Check Out</button>
    @elseif ($eventForm->check_out)
        <!-- If the user has checked out, show Check In button again -->
        <button type="submit" formaction="{{ route('event.checkin', $eventForm->id) }}" class="btn btn-success">Check In</button>
    @else
        <button class="btn btn-secondary" disabled>Already Checked Out</button>
    @endif
</form>

            @else
                <div class="text-center">
                    <h4 class="text-danger">No Data Available</h4>
                </div>
            @endif
        </div>
    </div>
</div>

</main>



<!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
