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
                            <th>Purchase Date</th>
                            <th>Status</th>
                            <th>Shipping Address</th>
                            <th>Total Price</th>

                            <th colspan="3" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody> @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id }}</td>
                            <td>{{$order->users->name}}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y')}}</td>
                            {{-- <td>{{date('d-m-Y', strtotime($order->created_at))}}</td> --}}
                            <td>{{$order->status}}</td>
                            <td>{{$order->shipping_address}}</td>
                            <td>{{$order->total_price}}</td>
                            <td><a href='{{ url("order/edit/$order->id") }}' class="btn btn-primary">Transit</a></td>
                            {{-- <td><a href='{{ url("/product/edit/$order->id") }}' class="btn btn-success">Shipped</a></td>
                            <td><a href='{{ url("/product/delete/$order->id") }}' class="btn btn-danger">Cancel</a></td> --}}
                        </tr>
                    </tbody> @endforeach
                </table>
            </div>
        </div>
    </div>
</x-layouts-sb-admin>
