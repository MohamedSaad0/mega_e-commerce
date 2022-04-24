<x-layouts-sb-admin>

    <x-slot:title>add new category</x-slot:title>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">add new category</h1>
                        </div>
                        <form method="POST" action="{{ route('category.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name"
                                    class="form-control form-control-user" placeholder="Name">
                                    @error('name')  {{$message}}  @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="description"
                                    class="form-control form-control-user" placeholder="Description">
                                    @error('description') {{$message}} @enderror
                            </div>

                            <div class="form-group">
                                <label for="files">Select Image</label>
                                <input type="file" name="image" id="files" class="hidden form-control form-control-user"/>
                                @error('image') {{$message}} @enderror
                            </div>
                            <input class="btn btn-primary btn-user btn-block" type="submit"
                                value="add">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




</x-layouts-sb-admin>
