<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="p-10 bg-gray-100">
    <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-lg">
        <h1 class="mb-8 text-3xl font-bold text-center">Edit Product</h1>

        <!-- Check for validation errors -->
        @if ($errors->any())
            <div class="p-4 mb-4 text-red-700 bg-red-100 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="p-6 bg-white rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block mb-2 font-bold text-gray-700">Product Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $product->title) }}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2 font-bold text-gray-700">Description:</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block mb-2 font-bold text-gray-700">Price:</label>
                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div class="mb-4">
                <label for="stock" class="block mb-2 font-bold text-gray-700">Stock:</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div class="mb-4">
                <label for="image" class="block mb-2 font-bold text-gray-700">Product Image:</label>
                <input type="file" id="image" name="image"
                    class="block w-full text-gray-700 border rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
                @if ($product->image)
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->title }}"
                        class="h-32 mt-4">
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 text-white bg-pink-500 rounded-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500">Update
                    Product</button>
            </div>
        </form>
    </div>
</body>

</html>