<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-info text-cyan text-center">Register Form</h3>
                <div class="card p-4 my-3 border-0 shadow">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input
                                required
                                type="text"
                                name="name"
                                class="form-control
                                @error('name')
                                    is-invalid
                                @enderror"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                value="{{old('name')}}">
                            <x-error name="email" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input required type="text"
                                   name="username"
                                   class="form-control
                                   @error('username')
                                       is-invalid
                                   @enderror
                                   "
                                   id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   value="{{old('username')}}">
                                   <x-error name='username' />
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email"
                                 name="email"
                                 class="form-control
                                 @error('email')
                                       is-invalid
                                   @enderror
                                 "
                                 id="exampleInputEmail1"
                                 aria-describedby="emailHelp"
                                 value="{{old('email')}}">
                                 <x-error name="email" />
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input required type="password"
                                 name="password"
                                 class="form-control
                                 @error('username')
                                    is-invalid
                                 @enderror
                                 "
                                 id="exampleInputPassword1">
                                 <x-error name="password" />
                        </div>
                        <button type="submit" class="btn btn-info text-white">Submit</button>
                        {{-- error message all in one --}}
                        {{-- <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
