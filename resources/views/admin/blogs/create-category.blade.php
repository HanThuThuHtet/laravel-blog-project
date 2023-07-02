<x-admin-layout>
    <h1 class="my-4 text-center">Create Category</h1>

        <x-card-wrapper>
            <form
                enctype="multipart/form-data"
                action="/admin/blogs/store-category"
                method="post">
                @csrf
                <x-form.input name="name" />
                <x-form.input name="slug" />

                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-info">Create category</button>
                </div>
            </form>
        </x-card-wrapper>

</x-admin-layout>
