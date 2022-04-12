<x-layouts-sb-admin>

    <x-slot:title>edit category</x-slot:title>

    <h1 class="h3 mb-4 text-gray-800">edit category</h1>

        <form method="POST" action="{{ route('category.update') }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="form-group">
                <input type="text" name="name" value="{{ $category->name }}" class="form-control form-control-user" id="exampleInputEmail" placeholder="category name">
            </div>
            <div class="form-group">
                <input type="text" name="description" value="{{ $category->description }}" class="form-control form-control-user" id="exampleInputEmail" placeholder="category description">
            </div>
            <div class="form-group">
                <img class="img-fluid w-50" src='{{ asset("images/$category->image") }}' alt="">
            </div>
            <div class="form-group">
                <input type="file" name="image">
            </div>

            <hr>
            <input class="btn btn-success" type="submit" value="update">
        </form>




</x-layouts-sb-admin>