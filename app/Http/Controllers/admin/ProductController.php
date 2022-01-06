<?php

namespace App\Http\Controllers\admin;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\PseudoTypes\True_;

class ProductController extends Controller
{
    public function index()
    {
        $product = ProductModel::all();
        return view('admin.product.index',compact('product'));
    }

    public function addprod()
    {
        $category = CategoryModel::all();
        return view('admin.product.addprod',compact('category'));
    }

    public function saveprod(Request $request)
    {
        $product = new ProductModel();

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->status = $request->input('status') == True ? '1':'0';

       /* image code */
       if($request->hasFile('image'))
       {
           $image_file = $request->file('image');
           $image_extension = $image_file->getClientOriginalExtension();
           $image_filename = time(). '.' . $image_extension;
           $image_file->move('uploads/products/',$image_filename);
           $product->image = $image_filename;
       }
       $product->save();

       Session::flash('statuscode','success');
       return redirect('products')->with('status','product added successfully');

    }

    public function editprod($id)
    {
        $product = ProductModel::find($id);
        $category = CategoryModel::all();
        return view('admin.product.editprod',compact('product','category'));
    }

    public function updateprod($id, Request $request)
    {
        $product = ProductModel::find($id);

        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->status = $request->input('status') == True ? '1':'0';

        if($request->hasFile('image'))
        {
            $path = 'uploads/products/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_file = $request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time(). '.' . $image_extension;
            $image_file->move('uploads/products/',$image_filename);
            $product->image = $image_filename;
        }
        $product->update();
        Session::flash('statuscode','success');
        return redirect('products')->with('status','product updated successfully');

    }

    public function deleteprod($id)
    {
        $product = ProductModel::find($id);
        $product->delete();
        Session::flash('statuscode','error');
        return redirect('products')->with('status','product deleted successfully');

    }
}
