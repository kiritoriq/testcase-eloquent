<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // show product date paginate 10
    public function getProduct()
    {
        // product paginate 10
        $product = Product::paginate(10);

        // show product category with product detail
        $productCategory = Product::with(['category', 'details'])->get();

        // // show date with format date only
        // $productDate = Product::paginate(10);

        // show product data order by price
        $productOrderByPrice = Product::with(['details'])->whereHas('details', function($q) {
            $q->orderBy('selling_price', 'asc');
        })->get();

        // summary product price by category
        $productPriceByCategory = Category::with(['products', 'products.details'])
                                ->get();

        return response()->json([
            'status' => 'success',
            'product_paginate_10' => $product,
            'productCategory' => $productCategory,
            // 'product_date' => $productDate,
            'product_order_by_price' => $productOrderByPrice,
            'product_price_by_category' => $productPriceByCategory
        ]);
    }

    // product detail paginate 10 order by product name
    public function getProductDetail()
    {
        return response()->json([
            'status' => 'success',
            'data' => ProductDetail::with(['products' => function($q) {
                    $q->orderBy('product_name');
                }])->paginate(10)
        ]);
    }
}
