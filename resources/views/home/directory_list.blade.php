@include('home.includes.head')
@include('home.includes.navbar')
<style>
    .list-unstyled {
        padding: 15px;
        background-color:rgb(213, 222, 248);
        color: #333;
        transition: background-color 0.3s ease;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .list-unstyled:hover {
        background-color: #f4f4f4;
    }
</style>
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Directory Category</h1>
                    <p>
                        {{ __('messages.The truthful and honest businessman will be in the company of the Prophets, the truthful ones (Siddeeqeen), and the martyrs (Shuhada) on the Day of Judgment.(Mishkat al-Masabih, Hadith 2828)') }}
                    </p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let&apos;s See</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="page-content-wrap">
    <div class="directory-list py-5 bg-light">
        <div class="container">
            <!----filter by character---->
            <div class="row mb-4">
                <div class="col-12 text-center mt-3 mt-md-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="{{ route('directory.list') }}" class="text-decoration-none">All</a>
                        </li>
                        @foreach(range('A', 'Z') as $char)
                        <li class="list-inline-item">
                            <a href="{{ route('directory.list', ['character' => $char]) }}" class="text-decoration-none">{{ $char }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
             <!---- End filter by character---->
            <div class="row">
            @foreach($categories as $category)
    <div class="col-md-4 mb-3">
        <ul class="list-unstyled">
            <li class="mb-2">
                <a href="{{ route('home.directory', ['category' => $category->id]) }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none">
                    <span>{{ $category->category_name }}</span>
                    @if($category->company_count > 0)
                        <span class="badge bg-white text-dark" style="border: 1px solid;">
                            <strong>{{ $category->company_count }}</strong>
                        </span>
                    @endif
                </a>
            </li>
        </ul>
    </div>
@endforeach

</div>


            <!-- End Categories in columns -->
        </div>
    </div>
</section>

@include('home.includes.footer')
