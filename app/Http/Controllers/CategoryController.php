<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Category::paginate(10);
        return view('categories.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            'name'          => 'required|min:2|max:20|unique:categories',
            'description'   => 'required',
            'image'         => 'required',
        ])->validate();

        $new_category = new \App\Category;
        $new_category->name         = strtoupper($request->get('name'));
        $new_category->description  = $request->get('description');
        $new_category->create_by    = \Auth::user()->id;
        $new_category->slug         = \Str::slug($request->get('name'), '-');

        if($request->file('image')){
            // $image_path = $request->file('image')->store('category_image', 'public');
            $nama_file = time()."_".$request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->move('category_image', $nama_file);
            $new_category->image = $nama_file;
        }

        $new_category->save();
        return redirect()->route('categories.index')->with('success', 'Category successfully created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = \App\Category::findOrFail($id);
        return view('categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = \App\Category::findOrFail($id);

        \Validator::make($request->all(),[
            'name'          => 'required|min:2|max:20',
            'description'   => 'required',
            'slug'          => 'required',
        ])->validate();
        
        $category->name         = $request->get('name');
        $category->description  = $request->get('description');
        $category->slug         = $request->get('slug');
        

        if($request->file('image')){
            // ebook
            // if($category->image && file_exists(storage_path('app/public/'.$category->image))){
            //     \Storage::delete('public/'.$category->image);
            // }
            // $new_image = $request->file('image')->store('category_image', 'public');
            
            if($category->image){
                File::delete('category_image/'.$category->image);
            }
            // $new_image = $request->file('image')->store('category_image', 'public');
            $nama_file = time()."_".$request->file('image')->getClientOriginalName();
            $new_image = $request->file('image')->move('category_image', $nama_file);

            $category->image = $nama_file;
        }

        $category->update_by    = \Auth::user()->id;
        $category->slug         = \Str::slug($request->get('name'));

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = \App\Category::findOrFail($id);
        $category->articles()->sync([]);
        if($category->image){
            File::delete('category_image/'.$category->image);
        }
        $category->forceDelete();

        return redirect()->route('categories.index')->with('success', 'Category successfully deleted.');
    }

    public function restore($id){
        $category = \App\Category::withTrashed()->findOrFail($id);
        $category->restore();
    }

    public function deletePermanent($id){
        $category = \App\Category::withTrashed()->findOrFail($id);
        $category->articles()->sync([]);

        // if($category->image && file_exist(storage_path('app/public/'.$category->image))){
        //     \Storage::delete('public/'.$category->image);
        // }
        if($category->image){
            File::delete('category_image/'.$category->image);
        }
        $category->forceDelete();

        return redirect()->route('categories.index')->with('success', 'Category successfully deleted.');
    }



    // ajax select2
    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $categories = \App\Category::where('name', 'Like', "%$keyword%")->get();
        return $categories;
    }

}
