
<x-admin-layout>
    <h1 class="my-4 text-center">Categories</h1>
    <x-card-wrapper>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>{{$category->slug}}</td>
                        <td><a href="/admin/blogs/{{$category->slug}}/edit-category" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="/admin/blogs/{{$category->slug}}/delete-category" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
    </x-card-wrapper>
</x-admin-layout>
