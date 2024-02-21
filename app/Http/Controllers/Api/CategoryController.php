<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
 
    public function index()
    {
        return CategoryResource::collection(
            Category::query()->orderBy('id', 'desc')->get()
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'active' => 'required|boolean',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $category = new Category();
        $category->name = $request->get('name');
        $category->active = $request->get('active');
        if ($category->save()) {
            return response(new CategoryResource($category), 201);
        } else
        return response(['errors' => ['Something wrong']], 403);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'active' => 'required|boolean',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $category = Category::findOrFail($id);
        if ($category->update($request->all())) {
            return response(new CategoryResource($category), 201);
        } else
        return response(['errors' => ['Something wrong']], 403);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response('', 204);
    }
}
