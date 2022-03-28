<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use App\Product_category;
use App\Product_tags;
use App\Comment;
use Illuminate\Http\Request;
use App\Product_products;

class ProductController extends Controller
{

    public function __construct()
    {
        $_config = \App\Config::find(26);
        return view()->share('_config', $_config);
    }
    public function productList(Request $request)
    {

        $data['products'] = Product_products::where('status', 'active')->orderBy('order_no', 'asc')->get();
        $data['categories'] = Product_category::where('status', 'active')->orderBy('order_no', 'asc')->get();
        return view(config("edushop.end-user.pathView") . "productList")->with($data);
    }
    public function partnerIndex(){
        return view(config("edushop.end-user.pathView") . "partnerList");
    }
    public function productListByCategory(Request $request, $slug_category)
    {
        $category = Product_category::where('slug', $slug_category)->where('status', 'active')->first();
        if (!$category) {
            $category = Product_category::where('id', $slug_category)->where('status', 'active')->first();
        }
        if (!$category) {
            return abort(404);
        }

        $products = $category->products()->where('product_products.status', 'active')->orderBy('order_no','asc')->get();
        $data['products'] = $products;
        $data['category'] = $category;
        return view(config("edushop.end-user.pathView") . "productListByCategory")->with($data);
    }
    public function productDetail($category_slug, $product_slug)
    {
        $product = Product_products::where('slug', $product_slug)->where('status', 'active')->first();
        $product_tag = $product->tags;
        if (!$product) {
            abort(404);
        }
        $data['product'] = $product;
        $data['comments'] = $product->comments('parent_id', 0)->where('type', 'product')->get();

        //session()->push('products.recently_viewed', $product->id );
        return view(config("edushop.end-user.pathView") . "productDetail")->with($data)->with('product_tag', $product_tag);
    }
    public function productTagSlug(Request $request, $slug)
    {
        $params = $request->all();
        $tag = Product_tags::where('slug', $slug)->where('status', 'active')->first();
        if (!$tag) {
            return redirect()->route('product.productList');
        }
        $products = $tag->products()->where('product_products.status', 'active')->orderBy('id', 'desc')->get();

        //        if(isset($params['sort'])){
        //            if ($params['sort'] != "0") {
        //                $sort_by = explode("-", $params['sort']);
        //                $courses = Course_course::where('category_id', $slug_id)->orderBy($sort_by[0], $sort_by[1])->paginate(15);
        //                return view(config("edushop.end-user.pathView") . "courseTag")->with('courses', $courses)->with('category_name', $category_name)->with('slug', $slug)->with('sort_by', $params['sort']);
        //            }
        //        }
        $data['tag'] = $tag;
        $data['products'] = $products;
        return view(config("edushop.end-user.pathView") . "productTag")->with($data);
    }
}
