<x-layouts-sb-admin>

    <x-slot:title>show all Products</x-slot:title>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="{{ route('category.create') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">add new category</span>
        </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>show</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td><a href='{{ url("/category/show/$category->id") }}' class="btn btn-primary">show</a></td>
                            <td><a href='{{ url("/category/edit/$category->id") }}' class="btn btn-warning">edit</a></td>
                            <td><a href='{{ url("/category/destroy/$category->id") }}' class="btn btn-danger">delete</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>


</x-layouts-sb-admin>
