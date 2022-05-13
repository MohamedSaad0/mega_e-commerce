<x-layouts-sb-admin>

    <x-slot:title>Orders</x-slot:title>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/product/create" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Home</span>
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="/order/update/{{$orders->id}}">
            @method('patch')
            @csrf
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th colspan="3" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $orders->id }}</td>
                                 <td>{{ $orders->users->name }}</td>
                                <td><input type="submit" value="Shipped" class="btn btn-primary" name="status"></td>
                                <td><input type="submit" value="Delivered" class="btn btn-success" name="status"></td>
                                <td><input type="submit" value="Cancel" class="btn btn-warning" name="status"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</x-layouts-sb-admin>
