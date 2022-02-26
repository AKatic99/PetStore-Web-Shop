<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {   $category = Category::all();
        return  view('admin.category.index', compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('slika')) {

            $file = $request->file('slika');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->slika = $filename;
        }
        
        $category->naziv = $request->input('naziv');
        $category->opis = $request->input('opis');
        $category->save();
        return redirect('/dashboard')->with('status', 'Kategorija uspješno dodana');
    }

    public function edit($id)
    {   $category = Category::find($id);
        return view('admin.category.edit', compact('category'));

    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('slika'))
        {
            $path = 'assets/uploads/category/'.$category->slika;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('slika');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->slika = $filename;
        }
        $category->naziv = $request->input('naziv');
        $category->opis = $request->input('opis');

        $category->update();
        return redirect('/categories')->with('status', "Kategorija uspješno ažurirana");
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->slika)
        {
            $path = 'assets/uploads/category/'.$category->slika;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status', "Kategorija uspješno izbrisana");
    }
}