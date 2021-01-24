<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return response()->json(Product::all(), 200);
    }

    public function store(Request $request) {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price; 
        $product->quantity = $request->quantity; 
        $product->active = $request->active;
        $product->description = $request->description;

        $product->save();

        return response()->json(
            [
                'status' => 'Ok',
                'message' => 'Product Disimpan',
                'data' => $product
            ],
                200
        ); 
    }

    public function update(Request $request, $id) {
        $product = Product::where('id', $id)->first();
        if($product) {
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price; 
            $product->quantity = $request->quantity ? $request->quantity : $product->quantity; 
            $product->active = $request->active ? $request->active : $product->active;
            $product->description = $request->description ? $request->description : $product->description;

            $product->save();

            return response()->json(
                [
                    'status' => 'Ok',
                    'message' => 'Data Berhasil Diubah',
                    'data' => $product
                ],
                    200
            ); 
        }else {
            return response()->json(
                [
                    'status' => 'Not Found',
                    'message' => 'Id Product Tidak Ditemukan'
                ],
                    404
            ); 
        }
    }

    public function destroy(Request $request, $id) {
        $product = Product::firstwhere('id', $id);
        if($product) {
            Product::destroy($id);

            return response()->json(
                [
                    'status' => 'Ok',
                    'message' => "Data Id " . $id . " Dihapus"
                ],
                    200
            ); 
        }else {
            return response()->json(
                [
                    'status' => 'Not Found',
                    'message' => 'Id Product Tidak Ditemukan'
                ],
                    404
            ); 
        }
    }

    // public function store(Request $request) {
    //     Product::insert([
    //         'name' => $request->name, 
    //         'price' => $request->price, 
    //         'quantity' => $request->quantity,
    //         'active' => $request->active,
    //         'description' => $request->description
    //     ]);

    //     return response()->json(
    //         [
    //             'status' => 'Ok',
    //             'message' => 'Product Disimpan',
    //             'data' => $product
    //         ] 
    //     ); 
    // }

}
