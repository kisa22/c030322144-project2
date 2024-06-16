<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayeges Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <x-navbar1></x-navbar1>
    <!-- Product -->
    <main class="container px-6 py-24 mx-auto mt-24">
        <h1 class="mb-8 text-3xl font-bold text-center">Products</h1>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4" id="product-list">
            @if($products->isEmpty())
                <p class="text-center text-gray-500">No products available</p>
            @else
                @foreach ($products as $product)
                    <div class="p-4 bg-white rounded-lg shadow-md product-card">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                            class="object-cover w-full h-48 rounded-t-lg">
                        <div class="p-4">
                            <p class="font-bold">{{ $product->title }}</p>
                            <p class="text-gray-600">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $products->links('vendor.pagination.tailwind') }}
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('products.search') }}",
                    type: "GET",
                    data: { query: query },
                    success: function (data) {
                        var productHtml = '';
                        if (data.length === 0) {
                            productHtml += '<p class="text-center text-gray-500">No products available</p>';
                        } else {
                            $.each(data, function (index, product) {
                                productHtml += '<div class="p-4 bg-white rounded-lg shadow-md product-card">';
                                productHtml += '<img src="{{ asset("storage") }}/' + product.image + '" alt="' + product.title + '" class="object-cover w-full h-48 rounded-t-lg">';
                                productHtml += '<div class="p-4">';
                                productHtml += '<p class="font-bold">' + product.title + '</p>';
                                productHtml += '<p class="text-gray-600">Rp' + parseFloat(product.price).toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</p>';
                                productHtml += '</div>';
                                productHtml += '</div>';
                            });
                        }
                        $('#product-list').html(productHtml);
                    }
                });
            });
        });
    </script>
</body>

</html>