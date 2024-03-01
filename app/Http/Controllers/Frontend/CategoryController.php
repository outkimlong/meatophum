<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $data = Category::orderBy('id', 'desc')->paginate(10);
        return view('frontend.categories.index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'active' => 'required|boolean',
        ]);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $category = new Category();
        $category->name = $request->get('name');
        $category->active = $request->get('active');
        if ($category->save()) {
            return redirect()->route('categories.index')->with('success','Category created successfully');
        } else {
            return redirect()->route('categories.index')->with('error','Something wrong');
        }
        return redirect()->route('categories.index')->with('error', 'Something wrong');
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
            'active' => 'required|boolean',
        ]);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->active = $request->get('active');
    
        if ($category->update($request->all())) {
            return redirect(route('categories.index'))->with('message', 'Category updated');
        }
        return redirect(route('categories.index'))->with('error', 'Category not updated');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }
}
