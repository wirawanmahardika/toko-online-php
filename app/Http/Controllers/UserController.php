<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function checkout(Request $request)
    {
        $checkoutItems = $request->session()->get("checkout") ?? [];
        $items = Item::select(["id", "name", "harga", "image"])->whereIn("id", array_map(function ($item) {
            return $item['id'];
        }, $checkoutItems))->get();

        $items = array_map(function ($item) use ($checkoutItems) {
            $found = null;
            foreach ($checkoutItems as $cItem) {
                if ($item['id'] == $cItem['id']) {
                    $found = $cItem;
                    break;
                }
            }

            $item['kuantitas'] = $found['kuantitas'];
            return $item;
        }, $items->toArray());

        $totalHarga = 0;
        foreach ($items as $item) {
            $totalHarga += $item['harga'] * $item['kuantitas'];
        }

        return view('checkout', [
            "title" => "checkout",
            "items" => $items,
            "totalHarga" => $totalHarga
        ]);
    }

    public function account()
    {
        $user = Auth::user();
        return view('account', [
            "title" => "account",
            "name" => $user->name,
            "alamat" => $user->alamat,
            "koordinat" => $user->koordinat,
            "email" => $user->email
        ]);
    }

    public function historyDetail($id)
    {
        $pesanan = Pesanan::find($id);
        return view('history-detail', [
            "title" => "Detail History",
            "date" => $pesanan->created_at->format("d/m/y"),
            "items" => $pesanan->items
        ]);
    }

    public function history(Request $request)
    {
        $pesanans = Pesanan::where("user_id", $request->user()->id)->get();
        return view('history', [
            "title" => "history",
            "pesanans" => $pesanans
        ]);
    }
}
