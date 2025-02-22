@include('admin.layouts.head')
  @include('admin.layouts.header')
  @include('admin.layouts.sidebar')
  <style>
     .membership-row {
        display: flex;
        align-items: center;
        gap: 10px; /* Select, Input, and Button ke beech space */
        margin-bottom: 10px; /* Rows ke beech space */
    }

    .membership_year {
        flex: 1; /* Dropdown ko flexible width dena */
    }

    .membership_fee {
        flex: 1; /* Input field ko flexible width dena */
    }

    .numberof_year {
        flex: 2; /* Input field ko flexible width dena */
    }

    .membership-row button {
        flex: 0 0 40px; /* Fixed width for buttons */
        display: flex;
        justify-content: center;
        align-items: center;
    }
  </style>
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
       {{-- <div class="d-flex flex-column">
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
        </div>--}}
    </div>
</div>

{{--<div class="row mb-3">
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
</div>--}}

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
    <label class="col-md-4 col-lg-3 col-form-label">Membership Year</label>
    <div class="col-md-8 col-lg-6">
        <div id="membershipContainer">
            @foreach ($membershipYears as $key => $membershipYear)
                <div class="membership-row d-flex gap-2">
                    <select class="form-select membership_year" name="membership_year[]" onchange="handleMembershipChange(this)">
                        <option disabled>-- Membership Year --</option>
                        <option value="1 year" {{ $membershipYear->membership_year == '1 year' ? 'selected' : '' }}>1 year</option>
                        <option value="2 year" {{ $membershipYear->membership_year == '2 year' ? 'selected' : '' }}>2 year</option>
                        <option value="3 year" {{ $membershipYear->membership_year == '3 year' ? 'selected' : '' }}>3 year</option>
                        <option value="4 year" {{ $membershipYear->membership_year == '4 year' ? 'selected' : '' }}>4 year</option>
                        <option value="5 year" {{ $membershipYear->membership_year == '5 year' ? 'selected' : '' }}>5 year</option>
                        <option value="6 year" {{ $membershipYear->membership_year == '6 year' ? 'selected' : '' }}>6 year</option>
                        <option value="7 year" {{ $membershipYear->membership_year == '7 year' ? 'selected' : '' }}>7 year</option>
                        <option value="8 year" {{ $membershipYear->membership_year == '8 year' ? 'selected' : '' }}>8 year</option>
                        <option value="9 year" {{ $membershipYear->membership_year == '9 year' ? 'selected' : '' }}>9 year</option>
                        <option value="10 year" {{ $membershipYear->membership_year == '10 year' ? 'selected' : '' }}>10 year</option>
                        <option value="lifetime" {{ $membershipYear->membership_year == 'lifetime' ? 'selected' : '' }}>Lifetime</option>
                    </select>

                    <input name="numberof_year[]" type="text" class="form-control numberof_year" placeholder="Number of year"
                        value="{{ $membershipYear->numberof_year }}"
                        style="{{ in_array($membershipYear->membership_year, ['1 year', 'lifetime']) ? 'display:none;' : '' }}">

                    <input name="membership_fee[]" type="text" class="form-control membership_fee" placeholder="Enter Fee"
                        value="{{ $membershipYear->membership_fee }}">

                    <button type="button" class="btn btn-danger" onclick="removeMembershipRow(this)">-</button>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-primary mt-2" onclick="addMembershipRow()">+</button>
    </div>
</div>

 <!----End Membership year Plan------------>
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


    function addMembershipRow() {
    const container = document.getElementById("membershipContainer");
    const firstRow = container.querySelector(".membership-row");

    const newRow = firstRow.cloneNode(true);

    newRow.querySelector(".membership_year").value = "";
    newRow.querySelector(".numberof_year").style.display = "none";
    newRow.querySelector(".membership_fee").value = "";

    const button = newRow.querySelector("button");
    button.textContent = "−";
    button.classList.remove("btn-primary");
    button.classList.add("btn-danger");
    button.setAttribute("onclick", "removeMembershipRow(this)");

    container.appendChild(newRow);
    updateDropdowns();
}

function removeMembershipRow(button) {
    button.closest(".membership-row").remove();
    updateDropdowns();
}

function handleMembershipChange(select) {
    let selectedValue = select.value;
    let numberInput = select.closest(".membership-row").querySelector(".numberof_year");

    if (selectedValue === "lifetime") {
        numberInput.style.display = "block";
    } else {
        numberInput.style.display = "none";
    }

    updateDropdowns();
}

function updateDropdowns() {
    const allSelects = document.querySelectorAll(".membership_year");
    let selectedValues = new Set();
    let maxSelectedYear = 0;
    let isLifetimeSelected = false;

    allSelects.forEach(select => {
        if (select.value === "lifetime") {
            isLifetimeSelected = true;
        } else if (select.value) {
            let numericValue = parseInt(select.value);
            if (!isNaN(numericValue)) {
                maxSelectedYear = Math.max(maxSelectedYear, numericValue);
            }
            selectedValues.add(select.value);
        }
    });

    allSelects.forEach(select => {
        let options = select.querySelectorAll("option");

        options.forEach(option => {
            let optionValue = option.value;
            let numericOptionValue = parseInt(optionValue);

            if (isLifetimeSelected) {
                option.hidden = false;
            } else if (!isNaN(numericOptionValue) && numericOptionValue < maxSelectedYear) {
                option.hidden = true;
            } else {
                option.hidden = false;
            }
        });
    });
}
</script>
  <!-- ======= Footer ======= -->

  @include('admin.layouts.footer')

