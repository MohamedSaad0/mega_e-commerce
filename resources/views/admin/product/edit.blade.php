<x-layouts-sb-admin>

    <x-slot:title>Products</x-slot:title>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="post" action="/product/update/{{$id}}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <div class="form-group">
                                        <input type="text" name="name" value="{{$name}}"
                                            class="form-control form-control-user" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="description" value="{{$description}}"
                                            class="form-control form-control-user" placeholder="Description">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="number" name="price" value="{{$price}}"
                                                class="form-control form-control-user"
                                                placeholder="Price">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="number" name="discount" value="{{$discount}}"
                                                class="form-control form-control-user"
                                                placeholder="Discount">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="number" name="quantity" value="{{$quantity}}"
                                                class="form-control form-control-user"
                                                placeholder="Quantity">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="category" value="{{$category}}"
                                                class="form-control form-control-user"
                                                placeholder="Category">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="seller" value="{{$seller}}"
                                                class="form-control form-control-user"
                                                placeholder="Seller">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Select Image</label>
                                        <input type="file" name="image" id="files" class="hidden form-control form-control-user"
                                         value="" />
                                    </div>
                                    <input class="btn btn-primary btn-user btn-block" type="submit"
                                        value="Update">
                                    <hr>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    </body>

    </html>


</x-layouts-sb-admin>
