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
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

 <!---Add Member--->
         <div class="container">
         <div class="text-end mb-3">
        <a href="{{ route('list.event')}}" class="btn btn-primary">Back</a>
         </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Events</h5>
              <form class="row g-3" method="POST" action="{{ route('update.event', $event->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="inputName5" class="col-md-4 col-lg-3 col-form-label">Event Title</label>
                <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control" name="title" placeholder="Event Title" value="{{$event->title}}">
                </div>
            </div>
            <div class="row mb-3">
            <label for="inputName5" class="col-md-4 col-lg-3 col-form-label">Introduction</label>
                <div class="col-md-8 col-lg-9">
                <div id="quill-editor" class="mb-3" style="height: 150px;">
                </div>
                    <textarea rows="3" class="mb-3 d-none" name="introduction" id="quill-editor-area">{{$event->introduction}}</textarea>
               </div>
            </div>

            <div class="row mb-3">
            <label for="inputName5" class="col-md-4 col-lg-3 col-form-label">Description</label>
               <div class="col-md-8 col-lg-9">
                <div id="quill-editor" class="mb-3" style="height: 150px;">
                    </div>
                    <textarea rows="3" class="mb-3 d-none" name="description" id="quill-editor-area">{{$event->description}}</textarea>
               </div>
            </div>
            <div class="row mb-3">
            <label for="inputName5" class="col-md-4 col-lg-3 col-form-label">Event Start Date & Time</label>
            <div class="col-md-8 col-lg-3">
                <input type="datetime-local" class="form-control" name="eventstartdatetime" value="{{$event->eventstartdatetime}}">
              </div>
              <label for="inputName5" class="col-md-4 col-lg-3 col-form-label">Event End Date & Time</label>
              <div class="col-md-8 col-lg-3">
              <input type="datetime-local" class="form-control" name="eventenddatetime" value="{{$event->eventenddatetime}}">
            </div>
            </div>

            <div class="row mb-3">
            <label for="inputName5" class="col-md-4 col-lg-3 col-form-label">Register Start Date & Time</label>
            <div class="col-md-8 col-lg-3">
                <input type="datetime-local" class="form-control" name="registerstartdatetime" value="{{$event->registerstartdatetime}}">
            </div>
            <label for="inputName5" class="col-md-4 col-lg-3 col-form-label">Register End Date & Time</label>
            <div class="col-md-8 col-lg-3">
                <input type="datetime-local" class="form-control" name="registerenddatetime" value="{{$event->registerenddatetime}}">
             </div>
            </div>
            <div class="row mb-3">
                <!-- Dropdown for Type -->
                <label for="type" class="col-md-4 col-lg-3 col-form-label">Type</label>
                 <div class="col-md-8 col-lg-3">
                    <select name="type" id="type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Free" {{ $event->type == 'Free' ? 'selected' : '' }}>Free</option>
                        <option value="Paid" {{ $event->type == 'Paid' ? 'selected' : '' }}>Paid</option>
                    </select>
                </div>
                <!-- Dropdown for Mode -->
                <label for="mode" class="col-md-4 col-lg-3 col-form-label">Mode</label>
<div class="col-md-8 col-lg-3">
    <select name="mode" id="mode" class="form-control">
        <option value="">Select Mode</option>
        <option value="Online" {{ $event->mode == 'Online' ? 'selected' : '' }}>Online</option>
        <option value="Offline" {{ $event->mode == 'Offline' ? 'selected' : '' }}>Offline</option>
    </select>
</div>
            </div>
            <div class="row mb-3">
            <label class="col-md-4 col-lg-3 form-check-label" for="including_gst">
                Including GST
            </label>
            <div class="col-md-8 col-lg-3 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="including_gst" id="including_gst" value="1">
                </div>
            </div>
            <label for="event_address" class="col-md-4 col-lg-3 col-form-label" id="event_address_label" style="display: none;">Event Address</label>
            <div class="col-md-8 col-lg-3" id="event_address_container" style="display: none;">
                <input type="text" name="event_address" id="event_address" class="form-control" value="{{ $event->event_address ?? '' }}">
                @error('event_address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <label for="event_link" class="col-md-4 col-lg-3 col-form-label" id="event_link_label" style="display: none;">Event Link</label>
            <div class="col-md-8 col-lg-3" id="event_link_container" style="display: none;">
                <input type="text" name="event_link" id="event_link" class="form-control" value="{{ $event->event_link ?? '' }}">
                @error('event_link')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
        <label for="event_amount" class="col-md-4 col-lg-3 col-form-label" id="event_amount_label">Event Amount</label>
            <div class="col-md-8 col-lg-3" id="event_amount_container">
                <input type="text" name="event_amount" id="event_amount" class="form-control" value="{{$event->event_amount ?? '' }}">
                @error('event_amount')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
        <label for="upload" class="col-md-4 col-lg-3 col-form-label">Upload Image</label>
<div class="col-md-8 col-lg-3">
    <input type="file" name="upload" id="upload" class="form-control">
    <!-- Display Existing Image -->
@if(!empty($event->upload))
    <div class="col-md-8 col-lg-3 mt-2">
    <img src="{{ !empty($event->upload) && file_exists(public_path('upload/events/' . $event->upload))
                ? asset('upload/events/' . $event->upload)
                : asset('upload/No-Image.png') }}"
         alt="Event Image" class="img-fluid" width="200">
    </div>
@endif
    @error('upload')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>



            <label for="status" class="col-md-4 col-lg-3 col-form-label">Status</label>
            <div class="col-md-8 col-lg-3">
                <select name="status" id="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }} selected>Active</option>
                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <!-- <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option> -->
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</div>
</div>


    <!---End--->
  </main>


  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Initialize Quill Editors
    const editors = document.querySelectorAll('[id^="quill-editor-area"]');
    editors.forEach((textarea, index) => {
        const quillEditorId = `quill-editor-${index}`;
        const quillContainer = textarea.previousElementSibling;
        quillContainer.id = quillEditorId;
        const editor = new Quill(`#${quillEditorId}`, {
            theme: 'snow',
        });
        editor.root.innerHTML = textarea.value;
        editor.on('text-change', function () {
            textarea.value = editor.root.innerHTML;
        });
        textarea.addEventListener('input', function () {
            editor.root.innerHTML = textarea.value;
        });
    });

    // GST Checkbox Toggle based on Type
    const typeSelect = document.getElementById('type');
    const gstCheckbox = document.getElementById('including_gst');

    function toggleGstCheckbox() {
        if (typeSelect && gstCheckbox) {
            gstCheckbox.checked = typeSelect.value === 'Paid';
        }
    }

    if (typeSelect) {
        typeSelect.addEventListener('change', toggleGstCheckbox);
        toggleGstCheckbox(); // Set initial state
    }

    // Mode-based Event Link/Address Toggle
    const modeSelect = document.getElementById("mode");
    const eventLinkLabel = document.getElementById("event_link_label");
    const eventLinkContainer = document.getElementById("event_link_container");
    const eventAddressLabel = document.getElementById("event_address_label");
    const eventAddressContainer = document.getElementById("event_address_container");

    function toggleEventMode() {
        if (modeSelect) {
            let mode = modeSelect.value;
            const isOnline = mode === "Online";
            const isOffline = mode === "Offline";

            eventLinkLabel.style.display = isOnline ? "block" : "none";
            eventLinkContainer.style.display = isOnline ? "block" : "none";
            eventAddressLabel.style.display = isOffline ? "block" : "none";
            eventAddressContainer.style.display = isOffline ? "block" : "none";
        }
    }

    if (modeSelect) {
        modeSelect.addEventListener("change", toggleEventMode);
        toggleEventMode(); // Set initial state
    }

    // Show/Hide Event Amount based on Type
    const eventAmountLabel = document.getElementById("event_amount_label");
    const eventAmountContainer = document.getElementById("event_amount_container");

    function toggleEventAmount() {
        if (typeSelect) {
            const isPaid = typeSelect.value === "Paid";
            eventAmountLabel.style.display = isPaid ? "block" : "none";
            eventAmountContainer.style.display = isPaid ? "block" : "none";
        }
    }

    if (typeSelect) {
        typeSelect.addEventListener("change", toggleEventAmount);
        toggleEventAmount(); // Set initial state
    }
});

  </script>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
