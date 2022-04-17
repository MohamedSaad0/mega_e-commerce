<x-layouts-sb-admin>

    <x-slot:title>Products</x-slot:title>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="/product/create" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
           <span  class="text">Add New Product</span>
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
                            <th>Image</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Category</th>
                            <th>Seller</th>
                            <th>Quantity</th>
                            <th colspan="3" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody> @foreach($data as $products)
                        <tr>
                            <td>{{$products->id }}</td>
                            <td>{{$products->name}}</td>
                            <td>{{$products->description}}</td>
                            <td><img src='{{asset("images/$products->image")}}' alt="image" class="img-fluid w-25 "></td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->discount}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->seller }}</td>
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
