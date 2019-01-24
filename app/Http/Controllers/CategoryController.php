<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller {

    public function createCategory() {
        return view('admin.category.createCategory');
    }

    public function storeCategory(Request $request) {
        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        //pr ar kaj hobe dd
        //dd($request->all());
//        return $request->all();
//DONE BY 3 WAYS
//        1st process
//        $category = new Category();
//        $category->categoryName = $request->categoryName;
//        $category->categoryDescription = $request->categoryDescription;
//        $category->publicationStatus = $request->publicationStatus;
//        $category->save();
//
//        return 'Category Info save successfully';
        //2nd process
        Category::create($request->all());
//        return 'Category Info save successfully';
        //3rd process
        //AT FIRST UPORE LIKHBE USE DB 
//        DB::table('categories')->insert([
//            'categoryName' => $request->categoryName,
//            'categoryDescription' => $request->categoryDescription,
//            'publicationStatus' => $request->publicationStatus
//        ]);

//        return 'Category Info save successfully';
        return redirect('/category/add')->with('message', 'Category Info save successfully');
    }

    public function manageCategory() {
        $categories = Category::all();

        return view('admin.category.manageCategory', ['categories' => $categories]);
    }

    public function editCategory($id = 0) {
        $categoryById = Category::where('id', $id)->first();
        return view('admin.category.editCategory', ['categoryById' => $categoryById]);
    }

    public function updateCategory(Request $request) {
        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required',
        ]);

        $category = Category::find($request->id);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();

        return redirect('/category/manage')->with('message', 'Category Info update successfully');
    }
    
    public function deleteCategory($id = 0) {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message', 'Category delete successfully');
    }

}
