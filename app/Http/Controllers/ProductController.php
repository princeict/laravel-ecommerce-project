<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;

class ProductController extends Controller {

    public function createProduct() {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();

        return view('admin.product.createProduct', ['categories' => $categories, 'manufacturers' => $manufacturers]);
    }

    public function storeProduct(Request $request) {
        $request->validate([
            'productName' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required'
        ]);
//dd($request->all());

        $productImage = $request->file('productImage');
        $name = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImages/';
        $productImage->move($uploadPath, $name);
        $imageUrl = $uploadPath . $name;
        $this->saveProductInfo($request, $imageUrl);
        return redirect('/product/add')->with('message', 'Product Info save successfully');
    }

    protected function saveProductInfo($request, $imageUrl) {
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    public function manageProduct() {

        $products = DB::table('products')
                ->leftJoin('categories', 'products.categoryId', '=', 'categories.id')
                ->leftJoin('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->get();

        // dd($products);
//        echo '<pre>';
//        print_r($products);
//        exit();

        return view('admin.product.manageProduct', ['products' => $products]);
    }

    public function viewProduct($id = 0) {
        $productInfoById = DB::table('products')
                ->leftJoin('categories', 'products.categoryId', '=', 'categories.id')
                ->leftJoin('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first();

        //dd($productInfoById);
        return view('admin.product.viewProduct', ['productInfoById' => $productInfoById]);
    }

    public function deleteProduct($id = 0) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product/manage')->with('message', 'Product has deleted successfully');
    }

    public function editProduct($id = 0) {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $productInfoById = Product::where('id', $id)->first();

        return view('admin.product.editProduct', ['productInfoById' => $productInfoById,
            'categories' => $categories,
            'manufacturers' => $manufacturers]);
    }

    public function updateProduct(Request $request) {
        $imageUrl = $this->imageExistStatus($request);
        $this->updateProductInfo($request, $imageUrl);
        return redirect('/product/manage');
    }

    private function imageExistStatus($request) {
        $productById = Product::where('id', $request->productId)->first();
        $productImage = $request->file('productImage');


        if ($productImage) {
            unlink($productById->productImage);
            $name = $productImage->getClientOriginalName();
            $uploadPath = 'public/productImages/';
            $productImage->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        } else {
            $imageUrl = $productById->productImage;
        }

        return $imageUrl;
    }

    protected function updateProductInfo($request, $imageUrl) {
        $product = Product::find($request->productId);
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

}
