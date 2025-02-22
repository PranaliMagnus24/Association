
@include('member.layout.head')

<style>
    select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: url('https://cdn-icons-png.flaticon.com/16/271/271210.png') no-repeat right 10px center;
    background-size: 12px;
    padding-right: 25px;
}
</style>

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
            {{ $companyProfile->company_name }} Job Post
        @else
            Default Title
        @endif
    </h1>
</div>


<div class="container">
    <div class="text-end mb-3">
        <a href="{{ route('catalog.list')}}" class="btn btn-primary">Back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Catalog</h5>
            <form class="row g-3" method="POST" action="{{ route('catalog.update', $catalog->id) }}" enctype="multipart/form-data">
                @csrf
                <!-----------Title----------->
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-lg-3 col-form-label">Catalog Title<span style="color:red;">*</span></label>
                    <div class="col-md-8 col-lg-9">
                        <input type="text" name="title" id="catalog-title" class="form-control" placeholder="Catalog Title" value="{{ $catalog->title }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                  <!-----------Type and Category----------->
              <div class="row mb-3">
                <label for="type" class="col-md-4 col-lg-3 col-form-label">Catalog Type<span style="color:red;">*</span></label>
                <div class="col-md-8 col-lg-3">
                    <select name="type" class="form-control" id="catalog-type">
                        <option value="">--Select Type--</option>
                        <option value="product" {{ old('type', $catalog->type) == 'product' ? 'selected' : '' }}>Product</option>
                        <option value="service" {{ old('type', $catalog->type) == 'service' ? 'selected' : '' }}>Service</option>
                    </select>
                    @error('type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
             <!-----------Description----------->
            <div class="row mb-3">
                <label for="description" class="col-md-4 col-lg-3 col-form-label">Description</label>
                <div class="col-md-8 col-lg-9">
                    <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="description" id="quill-editor-area" placeholder="Write here">{{ old('description', isset($catalog) ? $catalog->description : '') }}</textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
    <label for="category" class="col-md-4 col-lg-3 col-form-label">Category <span style="color:red;">*</span></label>
    <div class="col-md-8 col-lg-3">
        <select name="catalog_category_id" class="form-control" id="catalog_category_id">
            <option value="">--Select Category--</option>
            @foreach($categories as $category)
        @if($category->parent_id == 0)
            <option value="{{ $category->id }}" {{ old('catalog_category_id', $catalog->catalog_category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->catalog_category_name }}
            </option>
        @endif
    @endforeach
        </select>
        @error('catalog_category_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <label for="subcategory" class="col-md-4 col-lg-3 col-form-label">Sub Category <span style="color:red;">*</span></label>
    <div class="col-md-8 col-lg-3">
        <select name="catalog_subcategory_id" class="form-control" id="catalog_subcategory_id">
            <option value="">--Select Subcategory--</option>
            @foreach($categories as $subcategory)
        @if($subcategory->parent_id == $catalog->catalog_category_id)
            <option value="{{ $subcategory->id }}" {{ old('catalog_subcategory_id', $catalog->catalog_subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                {{ $subcategory->catalog_category_name }}
            </option>
        @endif
    @endforeach
        </select>
        @error('catalog_subcategory_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
            <div class="row mb-3">
                <label for="price" class="col-md-4 col-lg-3 col-form-label">Price</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" name="price" id="price" class="form-control" placeholder="Add Price" value="{{ old('price', isset($catalog) ? $catalog->price : '') }}">
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label for="brands" class="col-md-4 col-lg-3 col-form-label">Brand's</label>
                <div class="col-md-8 col-lg-3">
                    <input type="text" name="brands" id="brands" class="form-control" placeholder="Add Your Brand" value="{{ old('brands', isset($catalog) ? $catalog->brands : '')}}">
                    @error('brands')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
            <label for="image" class="col-md-4 col-lg-3 col-form-label">Image</label>
<div class="col-md-8 col-lg-3 mt-2">
    <input type="file" name="images[]" id="image" class="form-control" multiple>

    @php
        $images = $catalog->image ? json_decode($catalog->image, true) : [];
    @endphp

    @if (!empty($images) && is_array($images))
        @foreach ($images as $image)
            <img src="{{ asset('upload/catalog/' . $image) }}" alt="Selected Image" width="100" class="mt-2">
        @endforeach
    @endif

    @error('images.*')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


                <label for="video" class="col-md-4 col-lg-3 col-form-label">Video</label>
                <div class="col-md-8 col-lg-3 mt-2">
                    <input type="file" name="video" id="video" class="form-control">
                    @if($catalog->video)
                    <video width="200" controls class="mt-2">
                        <source src="{{ asset('upload/catalog/' . $catalog->video) }}" type="video/mp4">
                Your browser does not support the video tag.
                    </video>
                    @endif
                    @error('video')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
            <label for="status" class="col-md-4 col-lg-3 col-form-label">Status</label>
                <div class="col-md-8 col-lg-3">
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }} selected>Active</option>
                        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <div class="row mb-3">
            <label for="metaTitle" class="col-md-4 col-lg-3 col-form-label">Meta Title</label>
                <div class="col-md-8 col-lg-9">
                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title', isset($catalog) ? $catalog->meta_title : '')}}">
                    @error('meta_title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
            <label for="metaDescription" class="col-md-4 col-lg-3 col-form-label">Meta Description</label>
            <div class="col-md-8 col-lg-9">
                    <div id="quill-editor" class="mb-3" style="height: 150px;"></div>
                    <textarea rows="3" class="mb-3 d-none" name="meta_keyword" id="quill-editor-area" placeholder="Write here">{{ old('meta_keyword', isset($catalog) ? $catalog->meta_keyword : '') }}</textarea>
                    @error('meta_keyword')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
</div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
  <script>
        document.addEventListener('DOMContentLoaded', function () {
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
});

$(document).ready(function(){
    var selectedSubcategoryId = "{{ old('catalog_subcategory_id', $catalog->catalog_subcategory_id) }}";

    function loadSubcategories(categoryId, preselectedId = null) {
        if(categoryId) {
            $.ajax({
                url: '{{ route("get.subcategories") }}',
                type: 'GET',
                data: { category_id: categoryId },
                success: function(data){
                    $('#catalog_subcategory_id').empty().append('<option value="">--Select Subcategory--</option>');
                    $.each(data, function(key, value){
                        let isSelected = (preselectedId == value.id) ? 'selected' : '';
                        $('#catalog_subcategory_id').append('<option value="'+ value.id +'" '+ isSelected +'>'+ value.catalog_category_name +'</option>');
                    });
                }
            });
        } else {
            $('#catalog_subcategory_id').empty().append('<option value="">--Select Subcategory--</option>');
        }
    }

    // Load subcategories when editing if a category is already selected
    var selectedCategoryId = $('#catalog_category_id').val();
    if(selectedCategoryId) {
        loadSubcategories(selectedCategoryId, selectedSubcategoryId);
    }

    // Update subcategories when category changes
    $('#catalog_category_id').on('change', function(){
        var categoryId = $(this).val();
        loadSubcategories(categoryId);
    });
});

  </script>
  <!-- ======= Footer ======= -->
  @include('member.layout.footer')

