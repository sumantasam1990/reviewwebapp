<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;

class SearchController extends Controller
{
    public function index($term)
    {
        // $searchResults = (new Search())
        //     ->registerModel(Cart::class, 'cart_name', 'important_details')
        //     ->registerModel(Product::class, 'prod_title', 'important_details')
        //     ->search($term);

        $searchResults = (new Search())
            ->registerModel(Cart::class, function(ModelSearchAspect $modelSearchAspect) {
                $modelSearchAspect
                    ->addSearchableAttribute('cart_name', 'important_details')
                    ->with('product_categories');
            })->registerModel(Product::class, 'prod_title', 'important_details')->search($term);

        return response()->json(['results' => $searchResults], 200);
    }
}
