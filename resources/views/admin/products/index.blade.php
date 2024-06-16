<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products - Poliban</title>
    @vite('resources/css/app.css')
    <style>
        .transparent {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            transition: background-color 0.3s ease, backdrop-filter 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Header Start -->
    <header id="navbar" class="fixed top-0 z-10 w-full bg-witehadow-md transparent">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-20">
                <div class="ml-4">
                    <input type="text" id="search" placeholder="Search for products" autocomplete="off"
                        class="px-4 py-2 border rounded-md">
                </div>
            </div>
            <nav class="hidden space-x-10 lg:flex">
                <a href="/" class="text-gray-700 hover:text-pink-500">Go Back</a>
            </nav>
            <button id="hamburger" name="hamburger" type="button" class="block lg:hidden">
                <span class="transition duration-300 ease-in-out origin-top-left hamburger-line"></span>
                <span class="transition duration-300 ease-in-out hamburger-line"></span>
                <span class="transition duration-300 ease-in-out origin-bottom-left hamburger-line"></span>
            </button>
        </div>
    </header>
    <!-- Header End -->

    <div class="container mx-auto mt-20">
        <div class="text-center">
            <h5>Data Products</h5>
            <hr class="my-4">
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.products.create') }}" class="px-4 py-2 text-white bg-green-500 rounded-md">ADD
                    PRODUCT</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="w-1/4 py-2 text-left">IMAGE</th>
                            <th class="w-1/4 py-2 text-left">TITLE</th>
                            <th class="w-1/4 py-2 text-left">PRICE</th>
                            <th class="w-1/4 py-2 text-left">STOCK</th>
                            <th class="w-1/4 py-2 text-left">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="product-list">
                        @forelse ($products as $product)
                            <tr>
                                <td class="px-4 py-2 border-t">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="rounded w-36">
                                </td>
                                <td class="px-4 py-2 border-t">{{ $product->title }}</td>
                                <td class="px-4 py-2 border-t">{{ "Rp " . number_format($product->price, 2, ',', '.') }}
                                </td>
                                <td class="px-4 py-2 border-t">{{ $product->stock }}</td>
                                <td class="px-4 py-2 border-t">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="px-2 py-1 text-white bg-blue-500 rounded">EDIT</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-2 py-1 text-white bg-red-500 rounded">HAPUS</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 text-center">Data Products belum Tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $products->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('admin.products.search') }}",
                    type: "GET",
                    data: { query: query },
                    success: function (data) {
                        var productHtml = '';
                        $.each(data, function (index, product) {
                            productHtml += '<tr>';
                            productHtml += '<td class="px-4 py-2 border-t"><img src="{{ asset("storage") }}/' + product.image + '" class="rounded w-36"></td>';
                            productHtml += '<td class="px-4 py-2 border-t">' + product.title + '</td>';
                            productHtml += '<td class="px-4 py-2 border-t">Rp ' + parseFloat(product.price).toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</td>';
                            productHtml += '<td class="px-4 py-2 border-t">' + product.stock + '</td>';
                            productHtml += '<td class="px-4 py-2 border-t"><div class="flex space-x-2">';
                            productHtml += '<a href="/admin-dashboard/products/' + product.id + '/edit" class="px-2 py-1 text-white bg-blue-500 rounded">EDIT</a>';
                            productHtml += '<form onsubmit="return confirm(\'Apakah Anda Yakin ?\');" action="/admin-dashboard/products/' + product.id + '" method="POST">@csrf @method("DELETE")<button type="submit" class="px-2 py-1 text-white bg-red-500 rounded">HAPUS</button></form>';
                            productHtml += '</div></td>';
                            productHtml += '</tr>';
                        });
                        $('#product-list').html(productHtml);
                    }
                });
            });
        });
    </script>



</body>

</html>
