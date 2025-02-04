<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function adminDashboard()
    {
        $itemCount = Item::count();
        $kategoriCount = Kategori::count();
        $customerCount = User::where("role", "customer")->count();
        return view('admin', ["item" => $itemCount, "kategori" => $kategoriCount, "customer" => $customerCount]);
    }

    public function adminOrder()
    {
        $pesanans = Pesanan::whereIn("status", ["pengemasan", "dikirim"])->get();
        return view('admin-order', [
            "pesanans" => $pesanans
        ]);
    }

    public function home()
    {
        $kategori = Kategori::limit(6)->get();
        return view('home', ["title" => "home", "kategoris" => $kategori]);
    }

    public function shop(Request $request)
    {
        $kategoris = Kategori::all();

        $name =  $request->query("name") ?? "";
        $kategori =  $request->query("kategori");
        $from = $request->query("from");
        $to =  $request->query("to");

        $queryItem = Item::query();

        $queryItem->where("name", "like", "%$name%");
        $queryItem->where('stok', '>', 0);

        if (isset($from)) {
            $from = intval($from);
            $queryItem->where("harga", '>=', $from);
        }

        if (isset($to)) {
            $to = intval($to);
            $queryItem->where("harga", '<=', $to);
        }

        if (isset($kategori)) {
            $queryItem->whereHas("kategori", function ($query) use ($kategori) {
                $query->where("name", "like", "%$kategori%");
            });
        }

        $items = $queryItem->get();
        return view('shop', [
            "title" => "shop",
            "items" => $items,
            "kategoris" => $kategoris,
        ]);
    }
}
