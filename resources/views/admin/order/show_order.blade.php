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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$id }}</td>
                            <td>{{$name}}</td>
                            <td>{{$description}}</td>
                            <td><img src='{{asset("images/$image")}}' alt="image" class="img-fluid w-50"></td>
                            <td>{{$price}}</td>
                            <td>{{$discount}}</td>
                            <td>{{$quantity}}</td>
                            <td>{{$category}}</td>
                            <td>{{$seller }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts-sb-admin>
