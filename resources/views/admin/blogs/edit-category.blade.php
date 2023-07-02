<x-admin-layout>
    <h1 class="my-4 text-center">Edit Category</h1>

        <x-card-wrapper>
            <form
                enctype="multipart/form-data"
                action="/admin/blogs/{{$category->slug}}/update-category"
                method="post">
                @csrf
                @method('patch')
                <x-form.input name="name" value="{{$category->name}}" />
                <x-form.input name="slug" value="{{$category->slug}}" />

                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-info">Update category</button>
                </div>
            </form>
        </x-card-wrapper>

</x-admin-layout>
