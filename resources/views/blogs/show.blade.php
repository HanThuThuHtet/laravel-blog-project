{{-- <x-layout>
    <x-slot name="title">
        <title>{{ $blog->title }}</title>
    </x-slot>
    <h1>{{ $blog->title }}</h1>
    <p>{!! $blog->body !!}</p>
    <a href="/">Go back</a>

</x-layout> --}}

<x-layout>
    <!-- single blog section -->
    <div class="container pb-5">
      <div class="row">
        <div class="col-md-6 mx-auto text-start">
          <img
            src='{{asset("storage/$blog->thumbnail")}}'
            class="card-img-top"
            alt="..."
          />

          <div class="tags my-3">
            <a href="/?category={{$blog->category->slug}}">
                <span class="badge bg-dark">{{$blog->category->name}}</span>
            </a>
        </div>
          <h3 class="card-title">{{$blog->title}}</h3>

          <div class="d-flex pt-2 justify-content-between">
            <div>
                <p class="fs-6 text-dark">
                    <a href="/?username={{$blog->author->username}}" class="text-decoration-none text-dark fw-bold text-capitalize">{{$blog->author->name}}</a>
                    <span> - {{$blog->created_at->diffForHumans()}}</span>
                </p>
            </div>
            <div class="">
                <form action="/blogs/{{$blog->slug}}/subscription" method="post">
                    @csrf
                    @auth
                        @if (auth()->user()->isSubscribed($blog))
                            <button class="btn btn-outline-info btn-sm">Unsubscribe</button>
                        @else
                            <button class="btn btn-info text-white btn-sm">Subscribe</button>
                        @endif
                    @endauth
                </form>
            </div>
          </div>

          <p class="lh-md mt-3 ">
            {!! $blog->body !!}
          </p>
        </div>
      </div>
    </div>


    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-comment-form :blog="$blog" />
            @else
            <p class="">Please <a href="/login">login</a> to participate in this discussion.</p>
            @endauth
        </div>
    </section>

    @if ($blog->comments->count())
        <x-comments :comments='$blog->comments()->latest()->paginate(3)' />
    @endif



    <x-blogs-you-may-like :randomBlogs="$randomBlogs" />


</x-layout>
