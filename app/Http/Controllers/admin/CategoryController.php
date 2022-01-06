<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $category = CategoryModel::all();
        return view('admin.category.index',compact('category'));
    }

    public function addcate()
    {
        return view('admin.category.addcate');
    }

    public function savecate(Request $request)
    {
        $category = new CategoryModel();

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->metatitle = $request->input('metatitle');
        $category->metadesc = $request->input('metadesc');
        $category->metakeyword = $request->input('metakeyword');
        $category->navstatus = $request->input('navstatus') == true ? '1':'0';
        $category->status = $request->input('status') == true ? '1':'0';

        /* image code */
        if($request->hasFile('image'))
        {
            $image_file = $request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time(). '.' . $image_extension;
            $image_file->move('uploads/categories/',$image_filename);
            $category->image = $image_filename;
        }
        $category->save();

        Session::flash('statuscode','success');
        return redirect('categories')->with('status','category added successfully');
    }

    public function editcate($id)
    {
        $category = CategoryModel::find($id);
        return view('admin.category.editcate',compact('category'));
    }

    public function updatecate(Request $request, $id)
    {
        $category = CategoryModel::find($id);

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->metatitle = $request->input('metatitle');
        $category->metadesc = $request->input('metadesc');
        $category->metakeyword = $request->input('metakeyword');
        $category->navstatus = $request->input('navstatus') == true ? '1':'0';
        $category->status = $request->input('status') == true ? '1':'0';

        if($request->hasFile('image'))
        {
            $path = 'uploads/categories/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $image_file = $request->file('image');
            $image_extension = $image_file->getClientOriginalExtension();
            $image_filename = time(). '.' . $image_extension;
            $image_file->move('uploads/categories/',$image_filename);
            $category->image = $image_filename;
        }
        $category->update();
        Session::flash('statuscode','success');
        return redirect('categories')->with('status','category updated successfully');
    }

    public function deletecate($id)
    {
        $deletecate =  CategoryModel::find($id);
        $deletecate->delete();
        Session::flash('statuscode','error');
        return redirect('categories')->with('status','category deleted successfully');
    }
}
