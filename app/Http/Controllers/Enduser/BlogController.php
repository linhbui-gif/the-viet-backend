<?php

namespace App\Http\Controllers\Enduser;

use App\blog_categories;
use App\blog_posts;
use App\blog_tags;
use App\Introduce;
use App\Introduce_categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function __construct()
    {
        $_config = \App\Config::find(26);
        return view()->share('_config', $_config);
    }

    public function newDetail($slug)
    {
        $course = blog_posts::where("status", "active")->where('slug', $slug)->first();
        $related = $course->posts()->pluck('related_post_id')->toArray();
        $related_post = DB::table('blog_posts')->whereIn('id', $related)->get();
        $data['new'] = $course;
        $data['related'] = $related_post;
        return view(config("edushop.end-user.pathView") . "blogDetail")->with($data);
    }
    public function introDetail($slug)
    {
        $course = Introduce::where("status", "active")->where('slug', $slug)->first();
//        $related = $course->posts()->pluck('related_post_id')->toArray();
//        $related_post = DB::table('huongdan')->whereIn('id', $related)->get();
        $data['new'] = $course;
//        $data['related'] = $related_post;
        return view(config("edushop.end-user.pathView") . "tutorialDetail")->with($data);
    }

    public function newList()
    {
        return view(config("edushop.end-user.pathView") . "blogList");
    }
    public function introduceByCategory (Request $request, $slug_category){
        $data['category'] = Introduce_categories::where('slug', $slug_category)->where('status', 'active')->first();
        $data['introduces'] = $data['category']->posts()->where('huongdan.status', 'active')->orderBy('order_no','desc')->latest()->paginate(9);
        return view(config("edushop.end-user.pathView") . "introListByCategory")->with($data);
    }

    public function blogListByCategory(Request $request, $slug_category)
    {
        $category = blog_categories::where('slug', $slug_category)->where('status', 'active')->first();

        if (!$category) {
            $category = blog_categories::where('id', $slug_category)->where('status', 'active')->first();
        }
        if (!$category) {
            return abort(404);
        }

        $products = $category->posts()->where('blog_posts.status', 'active')->orderBy('order_no','desc')->latest()->paginate(9);
        $data['blogs'] = $products;
        $data['category'] = $category;
        return view(config("edushop.end-user.pathView") . "postListByCategory")->with($data);
    }

    public function getBlog_ls_tag($slug)
    {
        $data['tag'] = blog_tags::where('slug', $slug)->first();
        $data['news'] = $data['tag']->posts()->orderBy('order_no','desc')->latest()->paginate(9);
        $data['category'] = blog_categories::select("*")->orderby('id')->get();
        $data['tags'] = blog_tags::select('*')->orderby('id')->get();//query builder
        return view(config("edushop.end-user.pathView"). "blogByTags" )->with($data);
    }
<<<<<<< HEAD
     public function search(Request $request){
        $keyword = $request->keyword;
        $data['keyword'] = $keyword;
        $data['data'] = blog_posts::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('description', 'LIKE', '%' . $keyword . '%')->orderBy('id','desc')->get();
         return view(config("edushop.end-user.pathView"). "blogBySearch" )->with($data);
     }
=======


>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
}
