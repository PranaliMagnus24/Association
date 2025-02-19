@include('admin.layouts.head')
  @include('admin.layouts.header')
  @include('admin.layouts.sidebar')
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
    <div class="container">
        <div class="text-end mb-3">
            <a href="{{ route('membershipplan.list')}}" class="btn btn-primary">Back</a>
        </div>
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Membership Plan Edit</h5>
            <form action="{{ route('membershipplan.update', $plan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
        <label for="Packagetitle" class="col-md-4 col-lg-3 col-form-label">Package title <span style="color:red;">*</span></label>
        <div class="col-md-8 col-lg-9">
            <input id="Packagetitle" name="package_title" type="text" class="form-control"
                   value="{{ old('package_title', $plan->package_title) }}">
            @error('package_title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="row mb-3">
            <label for="plandescription" class="col-md-4 col-lg-3 col-form-label">Description</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="plan_description" id="plan_description" class="form-control" rows="5">{{ $plan->plan_description }}</textarea>
                    @error('plan_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
    <label for="fee_structure" class="col-md-4 col-lg-3 col-form-label">
        Fee Structure <span style="color:red;">*</span>
    </label>
    <div class="col-md-8 col-lg-9 d-flex gap-5">
        <!-- Application Fee -->
        <div class="d-flex flex-column">
            <input type="text" name="application_fee" class="form-control" placeholder="Application Fee" value="{{ old('application_fee', $plan->application_fee) }}">
            @error('application_fee')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- One Year Membership Fee -->
        <div class="d-flex flex-column">
            <input type="text" name="oneyear_fee" class="form-control" placeholder="One Year Membership" value="{{ old('oneyear_fee', $plan->oneyear_fee) }}">
            @error('oneyear_fee')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Five Year Membership Fee -->
        <div class="d-flex flex-column">
            <input type="text" name="fiveyear_fee" class="form-control" placeholder="Five Year Membership" value="{{ old('fiveyear_fee', $plan->fiveyear_fee) }}">
            @error('fiveyear_fee')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-3">
    <label for="fee_structure" class="col-md-4 col-lg-3 col-form-label">Lifetime (year)</label>
    <div class="col-md-8 col-lg-9 d-flex gap-5">
        <!-- No. Of Years -->
        <div class="d-flex flex-column">
            <input type="text" name="numberof_year" class="form-control" placeholder="No. Of Years" value="{{ old('numberof_year', $plan->numberof_year) }}">
            @error('numberof_year')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Years Fee -->
        <div class="d-flex flex-column">
            <input type="text" name="yearly_fee" class="form-control" placeholder="Years Fee" value="{{ old('yearly_fee', $plan->yearly_fee) }}">
            @error('yearly_fee')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

    <div class="row mb-3">
        {{--<label for="package_term" class="col-md-4 col-lg-3 col-form-label">Package term <span style="color:red;">*</span></label>
        <div class="col-md-8 col-lg-3">
            <select id="package_term" name="package_term" class="form-select">
                <option value="Yearly" {{ $plan->package_term == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                <option value="Lifetime" {{ $plan->package_term == 'Lifetime' ? 'selected' : '' }}>Lifetime</option>
            </select>
        </div>--}}
        <label for="trial" class="col-md-4 col-lg-3 col-form-label">Trial</label>
        <div class="col-md-8 col-lg-3">
            <select id="trial" name="trial" class="form-select">
                <option value="yes" {{ $plan->trial == 'yes' ? 'selected' : '' }}>Yes</option>
                <option value="no" {{ $plan->trial == 'no' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <label for="trialDays" class="col-md-4 col-lg-3 col-form-label" id="trial-days-label" style="display: none;">Trial Days</label>
            <div class="col-md-8 col-lg-3" id="trial-days-input" style="display: none;">
                <input type="text" name="trial_days" class="form-control" placeholder="Enter Trial Days" value="{{ old('trial_days', $plan->trial_days) }}">
                @error('trial_days')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
    </div>
    <div class="row mb-3">
            <label for="Trial" class="col-md-4 col-lg-3 col-form-label"></label>
            <div class="col-md-8 col-lg-3">
            </div>

        </div>
    <div class="row mb-3">
        <label for="status" class="col-md-4 col-lg-3 col-form-label">Status</label>
        <div class="col-md-8 col-lg-3">
            <select id="status" name="status" class="form-select">
                <option value="active" {{ $plan->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $plan->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <label for="planImage" class="col-md-4 col-lg-3 col-form-label">Plan Image</label>
        <div class="col-md-8 col-lg-3">
            <input id="plan_image" name="plan_image" type="file" class="form-control" accept="image/*">
            @if(!empty($plan->plan_image))
                <img src="{{ asset('upload/membership_plan/' . $plan->plan_image) }}" style="height:100px; width:100px;">
            @endif
        </div>
    </div>
<br><br>
    <div class="row mb-3">
        <label for="meta_keyword" class="col-md-4 col-lg-3 col-form-label">Meta Keywords</label>
        <div class="col-md-8 col-lg-9">
            <input id="meta_keyword" name="meta_keyword" type="text" class="form-control"
                   value="{{ old('meta_keyword', $plan->meta_keyword) }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="meta_description" class="col-md-4 col-lg-3 col-form-label">Meta Description</label>
        <div class="col-md-8 col-lg-9">
            <textarea name="meta_description" id="meta_description" class="form-control" rows="5">{{ old('meta_description', $plan->meta_description) }}</textarea>
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

    </div>
</div>
</div>
</main><!-- End #main -->
<script>
   function toggleTrialDays(value) {
        const trialDaysLabel = document.getElementById('trial-days-label');
        const trialDaysInput = document.getElementById('trial-days-input');

        if (value === 'yes') {
            trialDaysLabel.style.display = 'block';
            trialDaysInput.style.display = 'block';
        } else {
            trialDaysLabel.style.display = 'none';
            trialDaysInput.style.display = 'none';
        }
    }
    document.getElementById('trial').addEventListener('change', function() {
        toggleTrialDays(this.value);
    });

    window.addEventListener('DOMContentLoaded', function() {
        const trialSelect = document.getElementById('trial');
        toggleTrialDays(trialSelect.value);
    });
</script>
  <!-- ======= Footer ======= -->

  @include('admin.layouts.footer')

