<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function lihatItem()
    {
        $items = Item::all();
        return view('admin-lihat-item', ["items" => $items]);
    }

    public function viewTambahItem()
    {
        $kategoris = Kategori::all();
        return view('admin-tambah-item', ["kategoris" => $kategoris]);
    }

    public function viewEditItem()
    {
        return view('admin-edit-item');
    }

    public function tambahItem(Request $request)
    {
        $request->validate([
            "name" => ['required', 'max:100', 'min:2'],
            "harga" => ['required', 'numeric', 'max:4294967295'],
            "stok" => ['required', 'numeric', 'max:4294967295'],
            "image" => ['required', 'file', 'mimes:jpg,png', 'max:3200'],
            "id_kategori" => ['required', 'numeric', 'max:4294967295']
        ]);

        Item::create([
            "name" => $request->name,
            "harga" => $request->harga,
            "stok" => $request->stok,
            "image" => $request->file("image")->store("item_image", "public"),
            "kategori_id" => $request->id_kategori
        ]);
        return redirect("/admin/item");
    }

    public function editItem(Request $request)
    {
        $validated = $request->validate([
            "id" => ['required', 'numeric', 'max:4294967295'],
            "name" => ['nullable', 'max:100', 'min:2'],
            "harga" => ['nullable', 'numeric', 'max:4294967295'],
            "stok" => ['nullable', 'numeric', 'max:4294967295'],
            "image" => ['nullable', 'file', 'mimes:jpg,png', 'max:3200'],
        ]);


        $data = [];
        foreach ($validated as $key => $value) {
            if (isset($value)) {
                if ($key === 'image') {
                    $item = Item::select("image")->find($request->id);
                    Storage::delete("public/" . $item->image);
                    $data['image'] = $request->file("image")->store("item_image", "public");;
                } else {
                    $data[$key] = $value;
                }
            }
        }

        Item::where("id", $request->id)->update($data);
        return redirect("/admin/item");
    }


    public function deleteItem($id)
    {
        $item = Item::select("image")->find($id);
        Item::where("id", $id)->delete();
        Storage::delete("public/" . $item->image);
        return redirect("/admin/item");
    }
}
