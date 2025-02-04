<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function lihatCategory()
    {
        $kategoris = Kategori::select(["id", "name", "image"])->get();
        return view('admin-lihat-category', ["kategoris" => $kategoris]);
    }

    public function viewTambahCategory()
    {
        return view('admin-tambah-category');
    }

    public function viewEditCategory()
    {
        return view('admin-edit-category');
    }

    public function tambahCategory(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100', 'min:2'],
            'image' => ['required', 'file', 'mimes:jpg,png', 'max:3200']
        ]);

        Kategori::create([
            "name" => $request->name,
            "image" => $request->file("image")->store("category_image", "public")
        ]);

        return redirect('/admin/category');
    }

    public function editCategory(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'numeric', 'max:4000000'],
            'name' => ['nullable', 'max:100', 'min:2'],
            'image' => ['nullable', 'file', 'mimes:jpg,png', 'max:3200']
        ]);

        $data = [];
        foreach ($validated as $key => $value) {
            if (isset($value)) {
                if ($key === 'image') {
                    $kategori = Kategori::select("image")->find($request->id);
                    Storage::delete("public/" . $kategori->image);
                    $data['image'] = $request->file("image")->store("category_image", "public");;
                } else {
                    $data[$key] = $value;
                }
            }
        }

        Kategori::where("id", $request->id)->update($data);
        return redirect("/admin/category");
    }


    public function deleteCategory($id)
    {
        $kategori = Kategori::select("image")->find($id);
        Kategori::where("id", $id)->delete();
        Storage::delete("public/" . $kategori->image);
        return redirect("/admin/category");
    }
}
