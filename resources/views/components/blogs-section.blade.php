@props(['blogs'])
{{-- @dd($data) --}}
{{-- @dd($blogs) --}}
<!-- blogs section -->
<section class="container text-center pt-1 pb-5 " id="blogs">
    <h1 class="display-5 fw-bold mb-5">Blogs</h1>
    <div class="">
        <x-category-dropdown />
    </div>
    <form action="/" method="get" class="my-3">
      <div class="input-group mb-3">
        @if (request('category'))
            <input
            name="category"
            type="hidden"
            value="{{request('category')}}"
        />
        @endif

        @if (request('username'))
            <input
            name="username"
            type="hidden"
            value="{{request('username')}}"
        />
        @endif

        <input
          name="search"
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
          value="{{request('search')}}"
        />
        <button
          class="input-group-text bg-info text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>

    <div class="row">

            @forelse ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <x-blog-card :blog="$blog"/>
                </div>
            @empty
                <p class="text-center">No blogs found</p>
            @endforelse
            <div class="d-flex justify-content-center">
                {{$blogs->links()}}
            </div>
    </div>
  </section>
