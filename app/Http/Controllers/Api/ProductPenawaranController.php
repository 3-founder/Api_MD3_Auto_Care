<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPenawaranRequest;
use App\Models\Penawaran;
use App\Models\ProductPenawaran;
use Illuminate\Http\Request;

class ProductPenawaranController extends Controller
{
    public function index($id)
    {
        $product = ProductPenawaran::where('id_penawaran', $id)->get();
        $penawaran = Penawaran::where('id', $id)->with(['signatureUser'])->get();
        return $penawaran != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Product Penawaran",
            'data' => $product != '[]' ? [
                'type_product' => true,
                'product_penawaran' => $product,
            ] : array(
                'type_product' => false,
                'product_penawaran' => $product,
            ),

            'penawaran' => $penawaran,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data product penawaran",
                        'data' => array(
                            'product_penawaran' => $product,
                        ),
                        'penawaran' => $penawaran,
                    ]);
    }
    public function create(ProductPenawaranRequest $request)
    {
        $data = [
            'produk_item' => $request->produk_item,
            'tipe_item' => $request->tipe_item,
            'kemasan' => $request->kemasan,
            'tipe_kemasan' => $request->tipe_kemasan,
            'mesin' => $request->mesin,
            'tipe_mesin' => $request->tipe_mesin,
            'harga' => $request->harga,
            'id_penawaran' => $request->id_penawaran,
        ];

        $result = ProductPenawaran::create($data);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data product penawaran",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data product penawaran",
            ]);
        }
    }
    public function update(ProductPenawaranRequest $request, $id)
    {
        $data = [
            'produk_item' => $request->produk_item,
            'tipe_item' => $request->tipe_item,
            'kemasan' => $request->kemasan,
            'tipe_kemasan' => $request->tipe_kemasan,
            'mesin' => $request->mesin,
            'tipe_mesin' => $request->tipe_mesin,
            'harga' => $request->harga,
            'id_penawaran' => $request->id_penawaran,
        ];

        $result = ProductPenawaran::where('id', $id)->update($data);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Merubah Data product penawaran",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Merubah Data product penawaran",
            ]);
        }
    }
    public function destroy($id)
    {
        $product = ProductPenawaran::find($id)->delete();

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menghapus Data Product Penawaran",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menghapus Data Product Penawaran",
            ]);
        }
    }
}