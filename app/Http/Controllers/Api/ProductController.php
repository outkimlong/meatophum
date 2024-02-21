<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class ProductController extends Controller
{
 
    public function index()
    {
        return ProductResource::collection(
            Product::query()->with('category')->orderBy('id', 'desc')->get()
        );
    }

    public function store(Request $request)
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
        $product = new Product();

        if (isset($request['image'])) {
            $relativePath = $this->saveImage($request['image']);
            $product['image'] = $relativePath;
        }
        $product->category_id = $request->get('category_id');
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->active = $request->get('active');
        if ($product->save()) {
            return response(new ProductResource($product), 201);
        } else
        return response(['errors' => ['Something wrong']], 403);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
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

        // Check if image was given and save on local file system
        if (isset($request['image'])) {
            $relativePath = $this->saveImage($request['image']);
            $product['image'] = $relativePath;

            // If there is an old image, delete it
            if ($product->image) {
                $absolutePath = public_path($product->image);
                File::delete($absolutePath);
            }
        }
        if ($product->update($request->all())) {
            return response(new ProductResource($product), 201);
        } else
        return response(['errors' => ['Something wrong']], 403);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response('', 204);
    }

    private function saveImage($image)
    {
        // Check if image is valid base64 string
        if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
            // Take out the base64 encoded text without mime type
            $image = substr($image, strpos($image, ',') + 1);
            // Get file extension
            $type = strtolower($type[1]); // jpg, png, gif

            // Check if file is an image
            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('invalid image type');
            }
            $image = str_replace(' ', '+', $image);
            $image = base64_decode($image);

            if ($image === false) {
                throw new \Exception('base64_decode failed');
            }
        } else {
            throw new \Exception('did not match data URI with image data');
        }

        $dir = 'images/products/';
        $file = Str::random() . '.' . $type;
        $absolutePath = public_path($dir);
        $relativePath = $dir . $file;
        if (!File::exists($absolutePath)) {
            File::makeDirectory($absolutePath, 0755, true);
        }
        file_put_contents($relativePath, $image);

        return $relativePath;
    }

    
}
