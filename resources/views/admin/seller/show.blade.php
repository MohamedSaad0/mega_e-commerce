<x-layouts-sb-admin>

    <x-slot:title>Seller</x-slot:title>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="/seller/create" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
           <span  class="text">Add New Seller</span>
        </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody> @foreach($data as $seller)
                        <tr>
                            <td>{{$seller->id }}</td>
                            <td>{{$seller->name}}</td>
                            <td>{{$seller->description}}</td>
                            <td><a href='{{ url("/seller/edit/$seller->id") }}' class="btn btn-warning">edit</a></td>
                            <td><a href='{{ url("/seller/delete/$seller->id") }}' class="btn btn-danger">delete</a></td>
                        </tr>
                    </tbody> @endforeach
                </table>
            </div>
        </div>
    </div>
</x-layouts-sb-admin>
