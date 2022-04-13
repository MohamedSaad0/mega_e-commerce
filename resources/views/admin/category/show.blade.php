<x-layouts-sb-admin>

    <x-slot:title>show category</x-slot:title>

    <div class="card mb-4 text-center">
        <div class="card-header">
        {{ $category->name }}
        </div>
        <div class="card-body">
            {{ $category->description }}
        </div>
        <div>
            <img class="img-fluid w-50" src='{{ asset("images/$category->image") }}' alt="">
        </div>
    </div>




</x-layouts-sb-admin>