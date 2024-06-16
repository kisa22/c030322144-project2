<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        //get all products
        $search = $request->input('search');
        if ($search) {
            $products = Product::where('title', 'like', "%$search%")->paginate(10);
        } else {
            $products = Product::latest()->paginate(10);
        }

        //render view with products
        return view('admin.products.index', compact('products'));
    }

    /**
     * index
     *
     * @return void
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    public function destroyItem($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function edit($id): View
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id): RedirectResponse
    {
        // Validate form
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // Find the product
        $product = Product::findOrFail($id);

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($product->image);

            // Upload new image
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');

            // Update product with new image
            $product->update([
                'image' => $imagePath,
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        } else {
            // Update product without new image
            $product->update($request->only(['title', 'description', 'price', 'stock']));
        }

        // Redirect to index with success message
        return redirect()->route('admin.products.index')->with(['success' => 'Data Berhasil Diperbarui!']);
    }



    public function editProduct($id): View
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * store
     *
     * @param mixed $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        // Upload image
        $image = $request->file('image');
        $imagePath = $image->store('products', 'public');

        // Create product
        Product::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        // Redirect to index
        return redirect()->route('admin.products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function showProduct(Request $request): View
    {
        //get products based on search
        $search = $request->input('search');
        if ($search) {
            $products = Product::where('title', 'like', "%$search%")->get();
        } else {
            $products = Product::all();
        }

        //render view with products
        return view('products.welcome', compact('products'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->get('query');
            $products = Product::where('title', 'LIKE', '%' . $search . '%')->get();

            return response()->json($products);
        }
    }

}