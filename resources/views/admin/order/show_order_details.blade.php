<x-layouts-sb-admin>

    <x-slot:title>Orders</x-slot:title>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="/product/create" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
           <span  class="text">Home</span>
        </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>Cart ID</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Shipping Address</th>

                            <th colspan="3" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody> @foreach($orders as $products)
                        <tr>
                            <td>{{$order->id }}</td>
                            <td>{{$orders->user->name}}</td>
                            <td>{{$order->cart_id}}</td>
                            <td>{{$order->total_price}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->shipping_address}}</td>
                            <td><a href='{{ url("/product/show/$products->id")}}' class="btn btn-primary">show</a></td>
                            <td><a href='{{ url("/product/edit/$products->id") }}' class="btn btn-warning">edit</a></td>
                            <td><a href='{{ url("/product/delete/$products->id") }}' class="btn btn-danger">delete</a></td>
                        </tr>
                    </tbody> @endforeach
                </table>
            </div>
        </div>
    </div>
</x-layouts-sb-admin>
