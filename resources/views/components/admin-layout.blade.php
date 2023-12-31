<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-5">
                <ul class="list-group mt-5">
                    <li class="list-group-item "><a href="/admin/blogs">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create">Create Blog</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create-category">Create Category</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/category-lists">Category Lists</a></li>
                  </ul>
            </div>
            <div class="col-md-10">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>
