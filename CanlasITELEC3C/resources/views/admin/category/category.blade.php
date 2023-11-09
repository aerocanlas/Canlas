<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class = "container">
        <div class = "row">
            <div class = "col-md-8">
                <div class="card">
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Created At</th>
                            {{-- <th scope="col" colspan="2">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->user_id }}</td>
                                <td>{{ $category->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

            <div class="col-md-4">
                <div class="card p-3">
            <form action="{{url('/add_category')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <h3>Add a Category</h3>
                  <label for="cat_name">Category Name</label>
                  <input type="text" class="form-control" name="category_name" placeholder="Input your category name">
                </div>
                <div class="mb-3">
                  <label for="user_id">User ID</label>
                  <input type="number" class="form-control" name="user_id" placeholder="Input your user ID" min="1">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
                                </div>
</div>
</div>
        </div>
    </div>
</div>
</x-app-layout>
