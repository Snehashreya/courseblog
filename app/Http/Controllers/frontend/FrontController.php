<?php

namespace App\Http\Controllers\frontend;

use DateTime;
use Carbon\Carbon;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function index()
    {
        $category = CategoryModel::all();
        $product = ProductModel::where('created_at', '<=', date('Y-m-d'))->get();
        return view('frontend.index', compact('category','product'));
    }

    public function viewcourse($slug)
    {
        if(CategoryModel::where('slug',$slug)->exists())
        {
            $category = CategoryModel::where('slug',$slug)->first();
            $product = ProductModel::where('cate_id',$category->id)->get();
            return view('frontend.categories', compact('category','product'));
        }
        else
        {
            Session::flash('statuscode','error');
            return redirect('/')->with('status','slug/url does not exists');
        }
    }

    public function viewpost($cate_slug,$prod_slug)
    {

        if(Auth::check())
        {
            if(CategoryModel::where('slug',$cate_slug)->exists())
            {
                if(ProductModel::where('slug', $prod_slug)->exists())
                {
                    $products = ProductModel::where('slug',$prod_slug)->get();
                    return view('frontend.products',compact('products'));
                }
                else
                {
                    Session::flash('statuscode','error');
                    return redirect('/')->with('status','slug/url does not exists');
                }
            }
            else
            {
                Session::flash('statuscode','error');
                return redirect('/')->with('status','slug/url does not exists');
            }
        }
        else
        {
            Session::flash('statuscode','error');
            return redirect('/')->with('status','login to continue');
        }

    }

}
