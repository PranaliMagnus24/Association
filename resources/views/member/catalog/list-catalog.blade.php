
@include('member.layout.head')


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
          {{ $companyProfile->company_name }}
      @else
          Default Title
      @endif
  </h1>
</div>

<div class="container">
  <!---add filter and search bar---->
<!--- Filter and Search Bar --->
<div class="row mb-4 mt-5">
    <div class="d-flex justify-content-end align-items-center gap-3">

        <form class="search-form d-flex align-items-center" method="get" action="#">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" style="width: 150px;" placeholder="Search">
                <button type="submit" title="Search" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
        </form>
        <a href="{{ route('catalog.create') }}" class="btn btn-primary">+</a>
    </div>
</div>

<!--- End Filter and Search Bar --->

<!---end filter and search bar---->

  <div class="card">
    <div class="card-body">
        <h5 class="card-title">Catalog list</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sr no.</th>
                    <th scope="col">Type</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($catalogs as $index => $catalog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $catalog->type }}</td>
                    <td>{{ $catalog->title }}</td>
                    <td>{{ $catalog->price }}</td>
                    <td>{{ $catalog->category ? $catalog->category->catalog_category_name : 'N/A' }}</td>
                    <td>{{ $catalog->status }}</td>
                    <td class="text-center text-nowrap">
                     <a href="#" class="btn btn-outline-primary">
                        <i class="bx bx-show" style="font-size: 20px;"></i>
                    </a>
                     <a href="{{ route('catalog.edit', $catalog->id)}}" class="btn btn-outline-success"> <i class="bx bx-pencil" style="font-size: 20px;"></i></a>
                     </a>

                     <a href="{{ route('catalog.delete', $catalog->id)}}" class="btn btn-outline-danger" onclick="confirmation(event)">
                        <i class="bx bx-trash" style="font-size: 20px;"></i>
                    </a>
                 </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end mb-3">
            {{$catalogs->links()}}
        </div>
    </div>
</div>
</div>
   </main><!-- End #main -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
 function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');

      Swal.fire({
          title: "Are You Sure to Delete This?",
          text: "This delete will be permanent",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Yes, delete it!"
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = urlToRedirect;
          }
      });
  }
</script>



<!-- ======= Footer ======= -->
@include('member.layout.footer')



