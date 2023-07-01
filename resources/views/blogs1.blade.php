

<x-layout>
    <x-slot name="title">
        <title>All Blogs</title>
    </x-slot>
    {{-- <x-slot name="content"> --}}
    @foreach ($blogs as $blog)
    <div class="{{ $loop->odd ? 'bg-yellow' : '' }}">
        <h1>
            <a href="blogs/{{ $blog->slug }}">
                {{ $blog->title }}
            </a>
        </h1>
        <h4>Author - <a href="/users/{{$blog->author->username}}">{{ $blog->author->name }}</a></h4>
        <p>
            {{-- relation --}}
            <a href="/categories/{{$blog->category->slug}}">
                {{ $blog->category->name }}
            </a>
        </p>
        <div>
            <p>published at - {{ $blog->created_at->diffForHumans() }}</p>
            <p>{{ $blog->intro }}</p>
        </div>
    </div>
    @endforeach
    {{-- </x-slot> --}}
</x-layout>

