<x-layout>
    {{-- @dd(auth()->user()->name) --}}
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{session('success')}}
        </div>
    @endif
    <x-hero />
    <x-blogs-section
        :blogs='$blogs'
        {{-- :categories='$categories' --}}
        {{-- :currentCategory='$currentCategory??null'  --}}
    />


</x-layout>
