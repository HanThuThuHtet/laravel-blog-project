@props(['blog'])
<x-card-wrapper class="bg-light">

    <form action="/blogs/{{$blog->slug}}/comments" method="post">
        @csrf
        <div class="mb-3">
            <textarea required name="body" id="" class="form-control
            @error('body')
               is-invalid
            @enderror
            " cols="10" rows="5" placeholder="Write a comment ..."></textarea>
            <x-error name="body" />
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit"
                    class="btn btn-info text-white">
                Submit
            </button>
        </div>
    </form>
</x-card-wrapper>
