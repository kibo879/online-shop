<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class ProductController extends Controller
    {
        public function index()
        {
            $Product=Product::all();

            return view('products.index',[
                'products'=> $Product
            ]);
        }

        public function create()
        {
            return view('products.create',[
                'categories'=>Category::all(),
            ]);
        }

        public function store(Request $request)
        {
            $request->validate([
                'nama' => 'required',
                'harga' => 'required',
                'gambar' => 'required',
                'deskripsi' => 'required',
                'discount' => 'required',
            ]);
            $input = $request->all();
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $folderTujuan = 'uploads/';
                $namaFile = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path($folderTujuan), $namaFile);
                $input['gambar'] = $namaFile;
            }
            product::create($input);
            return redirect(route('products.index'));

        }
        public function delete ($id)
        {


        $product = Product::findOrFail($id);
        if ($product)
        @unlink(public_path('uploads/' . $product->gambar));
        $product->delete();
        return redirect(route('products.index'));
        }

        public function edit($id)
        {
            $product = Product::findOrFail($id);
            return view('products.edit', [
                'product'=> $product,
                'categories' => Category ::all()
            ]);
        }
    }
