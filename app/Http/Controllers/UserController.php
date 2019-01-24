<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

    public function createUser() {
        return view('admin.user.createUser');
    }

    public function storeCategory(Request $request) {
        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        Category::create($request->all());
        return redirect('/category/add')->with('message', 'Category Info save successfully');
    }

    public function manageUser() {
        /**
         * NEXT AND PREVIOUS PAGINATION
         */
        //$users = User::simplePaginate(10);
        /**
         * NUMBER PAGINATION
         */
        $users = User::Paginate(10);
        return view('admin.user.manageUser', ['users' => $users]);
    }

}
