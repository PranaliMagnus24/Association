<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')
</head>
<style>
    .membership-form {
        margin-bottom: 20px;
        padding: 15px;
    }
</style>
<body>

  <!-- ======= Header ======= -->
  @include('admin.layouts.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Add membership year form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

 <!---Add Member--->
 <div class="container">
    <div class="text-end mb-3">
        <a href="admin/membershipyear" class="btn btn-primary">Back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <br>
            <div class="text-end mb-3">
                <button class="btn btn-primary add-form">+</button>
            </div>
            <div id="membership-forms">
            <form class="row g-3" method="POST" action="{{ route('membershipyear.store') }}">
                @csrf
                    <div class="row membership-form">
                        <div class="col">
                            <label for="inputName5" class="form-label">Add Membership Year</label>
                            <input type="text" class="form-control membership_year" name="membership_year[]" placeholder="Add year">
                            @error('membership_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputState" class="form-label">Default Membership Year</label>
                            <select class="form-select default_year" name="default_year[]">
                                <option value="Month">Month</option>
                                <option value="Year">Year</option>
                                <option value="Lifetime">Lifetime</option>
                            </select>
                            @error('default_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputName5" class="form-label">Membership Fee</label>
                            <input type="text" class="form-control" name="membership_fee[]" placeholder="Your Fee">
                            @error('membership_fee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputState" class="form-label">Status</label>
                            <select id="inputState" class="form-select" name="status[]">
                                <option value="active"selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    document.querySelector('.add-form').addEventListener('click', function() {
        const membershipForm = document.querySelector('.membership-form');
        const newForm = membershipForm.cloneNode(true);

        const inputs = newForm.querySelectorAll('input, select');
        inputs.forEach(input => {
            if (input.tagName === 'INPUT') {
                input.value = '';
                input.readOnly = false;
            } else if (input.tagName === 'SELECT') {
                input.selectedIndex = 0;
            }
        });

        const defaultYearSelect = newForm.querySelector('.default_year');
        const membershipYearInput = newForm.querySelector('.membership_year');

        defaultYearSelect.addEventListener('change', function() {
            if (this.value === 'Lifetime') {
                membershipYearInput.value = '10';
                membershipYearInput.readOnly = true;
            } else {
                membershipYearInput.value = '';
                membershipYearInput.readOnly = false;
            }
        });

        // Append the new form inside the existing form
        membershipForm.parentNode.insertBefore(newForm, membershipForm.nextSibling);
    });

    document.querySelector('.default_year').addEventListener('change', function() {
        const membershipYearInput = this.closest('.membership-form').querySelector('.membership_year');
        if (this.value === 'Lifetime') {
            membershipYearInput.value = '10';
            membershipYearInput.readOnly = true;
        } else {
            membershipYearInput.value = '';
            membershipYearInput.readOnly = false;
        }
    });
</script>


    <!---End--->
  </main>
  <!-- ======= Footer ======= -->
  @include('admin.layouts.footer')

</body>

</html>
