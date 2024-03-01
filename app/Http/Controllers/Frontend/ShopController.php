<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{

    public function index()
    {
        $data = Shop::orderBy('id', 'desc')->paginate(10);
        return view('frontend.shops.index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'image' => 'required',
            'remark' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'active' => 'required|boolean',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('shops', 'public');
            $shop = new Shop();
            $shop->name = $request->get('name');
            $shop->remark = $request->get('remark');
            $shop->address = $request->get('address');
            $shop->phone = $request->get('phone');
            $shop->active = $request->get('active');
            $shop->image = $path;
            if ($shop->save()) {
                return redirect()->route('shops.index')->with('success','Shop created successfully');
            } else {
                return redirect()->route('shops.index')->with('error','Something wrong');
            }
        }
        return redirect()->route('shops.index')->with('error', 'Something wrong');
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

        $shop = Shop::find($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('shops', 'public');
            $shop->image_url = $path;

            // If there is an old image, delete it
            if ($shop->image) {
                $absolutePath = public_path($shop->image);
                File::delete($absolutePath);
            }
        }

        if ($shop->update($request->all())) {
            return redirect(route('shops.index'))->with('message', 'Shop updated');
        }
        return redirect(route('shops.index'))->with('error', 'Shop not updated');
    }

    public function destroy($id)
    {
        Shop::find($id)->delete();
        return redirect()->route('shops.index')
                        ->with('success','Shop deleted successfully');
    }
}
