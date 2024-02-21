<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{

    public function index()
    {
        return ShopResource::collection(
            Shop::query()->orderBy('id', 'desc')->paginate(10)
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'image' => 'nullable|string',
            'remark' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'active' => 'required|boolean',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $shop = new Shop();

        if (isset($request['image'])) {
            $relativePath = $this->saveImage($request['image']);
            $shop['image'] = $relativePath;
        }
        $shop->name = $request->get('name');
        $shop->remark = $request->get('remark');
        $shop->address = $request->get('address');
        $shop->phone = $request->get('phone');
        $shop->active = $request->get('active');
        if ($shop->save()) {
            return response(new ShopResource($shop), 201);
        } else
        return response(['errors' => ['Something wrong']], 403);
    }

    public function show(Shop $shop)
    {
        return new ShopResource($shop);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'image' => 'nullable|string',
            'phone' => 'nullable|string',
            'remark' => 'nullable|string',
            'address' => 'nullable|string',
            'active' => 'required|boolean',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $shop = Shop::findOrFail($id);
   
        // Check if image was given and save on local file system
        if (isset($request['image'])) {
            $relativePath = $this->saveImage($request['image']);
            $shop['image'] = $relativePath;

            // If there is an old image, delete it
            if ($shop->image) {
                $absolutePath = public_path($shop->image);
                File::delete($absolutePath);
            }
        }
        if ($shop->update($request->all())) {
            return response(new ShopResource($shop), 201);
        } else
        return response(['errors' => ['Something wrong']], 403);
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
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

        $dir = 'images/shops/';
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
