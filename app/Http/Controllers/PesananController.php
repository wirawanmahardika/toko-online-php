<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PesananController extends Controller
{
    public function checkout(Request $request)
    {
        $checkoutItems = $request->session()->get('checkout') ?? [];

        $found = null;
        foreach ($checkoutItems as $item) {
            if ($item['id'] == $request->item_id) {
                $found = $item;
                break;
            }
        }

        $data = [
            "id" => intval($request->item_id),
            "harga" => intval($request->item_harga),
            "kuantitas" => intval($request->kuantitas),
        ];

        if (isset($found)) {
            $filteredItem = array_filter($checkoutItems, function ($item) use ($data) {
                return $item["id"] != $data['id'];
            });
            array_push($filteredItem, $data);
            Session::put("checkout", $filteredItem);
        } else {
            Session::push("checkout", $data);
        }


        return redirect("/shop");
    }

    public function emptyCart(Request $request)
    {
        $request->session()->forget("checkout");
        return redirect('/checkout');
    }

    public function deleteItemCart(Request $request, $id)
    {
        $cartItems = $request->session()->get("checkout");
        $filteredItems = array_filter($cartItems, function ($i) use ($id) {
            return $i['id'] != $id;
        });

        $request->session()->put("checkout", $filteredItems);
        return redirect('/checkout');
    }

    public function order(Request $request)
    {
        $items = $request->session()->get("checkout");
        $idItems = [];

        $totalHarga = 0;
        foreach ($items as $item) {
            $totalHarga += $item["harga"] * $item['kuantitas'];
            array_push($idItems, $item['id']);
        }

        $pesanan = new Pesanan();
        $pesanan->total_harga = $totalHarga;
        $pesanan->user_id = $request->user()->id;
        $pesanan->status = "pengemasan";

        $pesanan->save();

        foreach ($items as $item) {
            $pesanan->items()->attach($item['id'], [
                "kuantitas" => $item['kuantitas'],
                "harga" => $item['harga'] * $item['kuantitas']
            ]);

            $i = Item::find($item['id']);
            $i->stok -= $item['kuantitas'];
            $i->save();
        }

        $request->session()->forget("checkout");
        return redirect('/account/history');
    }

    public function orderDetail($id)
    {
        $pesanan = Pesanan::find($id);
        $items = $pesanan->items->toArray();
        $items = array_map(function ($i) {
            $i["harga"] = number_format($i["harga"]);
            $i['imageUrl'] = env('STORAGE_URL_BUCKET') . $i['image'];;
            return $i;
        }, $items);

        return response()->json([
            "message" => "berhasil mengambil detail pesanan",
            "items" => $items
        ]);
    }

    public function setStatus(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        $status = $request->query("status");

        if ($status == "batal") {
            foreach ($pesanan->items as $i) {
                $item = Item::find($i->id);
                $item->stok += $i->pivot->kuantitas;
                $item->save();
            }
        }

        $pesanan->status = $status;
        $pesanan->save();

        return redirect("/admin/order");
    }

    public function deleteOrder(Pesanan $pesanan)
    {
        $status = $pesanan->status;
        if ($status === 'dikirim' || $status === 'pengemasan') {
            foreach ($pesanan->items as $i) {
                $item = Item::find($i->id);
                $item->stok += $i->pivot->kuantitas;
                $item->save();
            }
        }

        $pesanan->items()->sync([]);
        $pesanan->delete();

        return redirect('/account/history');
    }
}
