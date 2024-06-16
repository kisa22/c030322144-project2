<section id="product" class="scroll-mt-[13rem]">
    <h1 class="pb-10 text-2xl font-bold text-center text-pink">PRODUCT</h1>
    <div class="container px-6 mx-auto sm:flex sm:flex-wrap sm:gap-6 sm:justify-evenly">
        @if ($products->isEmpty())
            <p class="text-center text-gray-500">No products available</p>
        @else
            @foreach ($products as $product)
                <div
                    class="flex flex-col justify-between mb-10 overflow-hidden rounded-md shadow-lg sm:w-64 md:w-80 lg:w-72 sm:m-0">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="img capt" class="object-cover w-full h-48">
                    </div>
                    <div class="flex flex-col flex-grow px-6 py-4">
                        <h2 class="font-bold">{{ $product->title }}</h2>
                        <p class="text-sm text-slate-600">{{ $product->description }}</p>
                        <p class="pt-4 pb-2 duration-700 cursor-pointer hover:overflow-hidden hover:transition-all">
                            Rp.{{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <a href="https://wa.me/6282151934955?text=I%20am%20interested%20in%20the%20product%20{{ urlencode($product->title) }}%20priced%20at%20Rp.{{ number_format($product->price, 0, ',', '.') }}"
                            class="inline-block px-4 py-2 mt-2 text-center text-white transition-all bg-green-500 rounded-lg hover:scale-110">Order
                            via WhatsApp</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="flex items-center justify-center mt-10">
        <a href="/products" class="px-4 py-2 text-center text-white bg-blue-500 rounded-lg">More Product</a>
    </div>
</section>
