<x-layout>
    <x-hero></x-hero>

    <hr class="my-20 border-t-4" />

    <x-about :products="$products"></x-about>

    <hr class="my-20 border-t-4" />

    <x-product :products="$products"></x-product>

    <hr class="my-20 border-t-4" />

    <x-contact></x-contact>
</x-layout>
