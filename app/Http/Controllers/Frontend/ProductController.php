<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $data = Product::orderBy('id', 'desc')->paginate(10);
        return view('frontend.products.index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category_id' => 'required',
            'name' => 'required|string',
            'image' => 'required',
            'price' => 'nullable|string',
            'active' => 'required|boolean',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $product = new Product();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->category_id = $request->get('category_id');
            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->active = $request->get('active');
            $product->image = $path;
            if ($product->save()) {
                return redirect()->route('shops.index')->with('success','Product created successfully');
            } else {
                return redirect()->route('shops.index')->with('error','Something wrong');
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'category_id' => 'required',
            'name' => 'required|string',
            'image' => 'nullable|string',
            'price' => 'nullable|string',
            'active' => 'required|boolean',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;

            // If there is an old image, delete it
            if ($product->image) {
                $absolutePath = public_path($product->image);
                File::delete($absolutePath);
            }
        }

        if ($product->update($request->all())) {
            return redirect(route('products.index'))->with('message', 'Product updated');
        }
        return redirect(route('products.index'))->with('error', 'Product not updated');

    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
