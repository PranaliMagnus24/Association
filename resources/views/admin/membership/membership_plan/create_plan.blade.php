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
            <h5 class="card-title">Membership Plan</h5>
              <form action="{{ route('membershipplan.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
              <label for="Packagetitle" class="col-md-4 col-lg-3 col-form-label">Package title <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-9">
                    <input id="Packagetitle" name="package_title" type="text" class="form-control" placeholder="Package title" value="{{ old('package_title') }}">
                    @error('package_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
            <label for="plandescription" class="col-md-4 col-lg-3 col-form-label">Description</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="plan_description" id="plan_description" class="form-control" rows="5">{{ old('plan_description') }}</textarea>
                    @error('plan_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!----------Free Structure---------->
            <div class="row mb-3">
                <label for="fee_structure" class="col-md-4 col-lg-3 col-form-label">Fee Structure <span style="color:red;">*</span>
            </label>
            <div class="col-md-8 col-lg-9 d-flex gap-5">
                <div class="d-flex flex-column">
                    <input type="text" name="application_fee" class="form-control" placeholder="Application Fee" value="{{ old('application_fee') }}">
                    @error('application_fee')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex flex-column">
                    <input type="text" name="oneyear_fee" class="form-control" placeholder="One Year Membership" value="{{ old('oneyear_fee') }}">
                    @error('oneyear_fee')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex flex-column">
                    <input type="text" name="fiveyear_fee" class="form-control" placeholder="Five Year Membership" value="{{ old('fiveyear_fee') }}">
                    @error('fiveyear_fee')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <!---------------End Fee structure--------->
        <!---------------Lifetime year--------->
        <div class="row mb-3">
            <label for="fee_structure" class="col-md-4 col-lg-3 col-form-label">Lifetime (year)</label>
            <div class="col-md-8 col-lg-9 d-flex gap-5">
                <div class="d-flex flex-column">
                    <input type="text" name="numberof_year" class="form-control" id="numberof-year" placeholder="No. Of Years" value="{{ old('numberof_year') }}">
                    @error('numberof_year')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex flex-column">
                    <input type="text" name="yearly_fee" class="form-control" id="yearly-fee" placeholder="Years Fee" value="{{ old('yearly_fee') }}">
                    @error('yearly_fee')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

             <!---------------End Lifetime year--------->
                  <!---Trail--->
            <div class="row mb-3">
               {{-- <label for="package_term" class="col-md-4 col-lg-3 col-form-label">Package term <span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <select id="package_term" name="package_term" class="form-select" aria-label="Default select example" value="{{ old('package_term') }}">
                        <option selected>-- Select Plan --</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Lifetime">Lifetime</option>
                    </select>
                    @error('package_term')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>--}}

                <label for="Trial" class="col-md-4 col-lg-3 col-form-label">Trial</label>
                <div class="col-md-8 col-lg-3">
                    <select id="trial" name="trial" class="form-select" aria-label="Default select example" value="{{ old('trial') }}">
                        <option selected>-- Select Trial --</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    @error('trial')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <label for="trialDays" class="col-md-4 col-lg-3 col-form-label" id="trial-days-label" style="display: none;">Trial Days</label>
                <div class="col-md-8 col-lg-3" id="trial-days-input" style="display: none;">
                    <input type="text" name="trial_days" class="form-control" placeholder="Enter Trial Days">
                    @error('trial_days')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
                  <!--- End Trail--->
            <div class="row mb-3">

                <label for="mobileNo" class="col-md-4 col-lg-3 col-form-label">Status</label>
                <div class="col-md-8 col-lg-3">
                    <select id="status" name="status" class="form-select" aria-label="Default select example" value="{{ old('status') }}">
                        <option selected>-- Status --</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <label for="planImage" class="col-md-4 col-lg-3 col-form-label">Plan Image</label>
                <div class="col-md-8 col-lg-3">
                    <input id="plan_image" name="plan_image" type="file" class="form-control" accept="image/*" value="{{ old('plan_image') }}">
                    @error('plan_image')
                    <div class="alert alert-danger">{{ $message}}</div>
                    @enderror
                    @if(!empty($data->plan_image))
                    @if(file_exists('uploadmembership_plan/'.$data->plan_image))<img src="{{url('uploadmembership_plan/'.$data->plan_image)}}" style="height:100px; width:100px;">
                    @endif
                    @endif
                </div>
            </div><br><br>
            <div class="row mb-3">

                <label for="keyword" class="col-md-4 col-lg-3 col-form-label">Meta Keywords</label>
                <div class="col-md-8 col-lg-9">
                    <input id="meta_keyword" name="meta_keyword" type="text" class="form-control">
                    @error('meta_keyword')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


            </div>
            <div class="row mb-3">
            <label for="metadescription" class="col-md-4 col-lg-3 col-form-label">Meta Description</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="meta_description" id="meta_description" class="form-control" rows="5"></textarea>
                    @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="text-center">
                <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
</div>
</main><!-- End #main -->
<script>
  document.getElementById('trial').addEventListener('change', function() {
        let trialDaysLabel = document.getElementById('trial-days-label');
        let trialDaysInput = document.getElementById('trial-days-input');

        if (this.value === 'yes') {
            trialDaysLabel.style.display = 'block';
            trialDaysInput.style.display = 'block';
        } else {
            trialDaysLabel.style.display = 'none';
            trialDaysInput.style.display = 'none';
        }
    });
</script>
  <!-- ======= Footer ======= -->

  @include('admin.layouts.footer')

