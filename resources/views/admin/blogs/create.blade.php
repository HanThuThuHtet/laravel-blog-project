<x-admin-layout>
    <h1 class="my-4 text-center">Create Blog</h1>

        <x-card-wrapper>
            <form
                enctype="multipart/form-data"
                action="/admin/blogs/store"
                method="post">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="intro" />
                <x-form.textarea name="body" />

                {{-- upload photo --}}
                <x-form.input name="thumbnail" type="file" />

                <x-form.input-wrapper>
                   <x-form.label name="category"/>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <x-error name="category_id" />
                </x-form.input-wrapper>
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-info">Create blog</button>
                </div>
            </form>
        </x-card-wrapper>

</x-admin-layout>
