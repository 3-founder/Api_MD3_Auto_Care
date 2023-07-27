<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductInvoiceOnlyRequest;
use App\Models\InvoiceOnly;
use App\Models\ProductInvoiceOnly;
use Illuminate\Http\Request;

class ProductInvoiceOnlyController extends Controller
{
    public function index($id)
    {
        $product_invoice = ProductInvoiceOnly::where('id_invoice_only', $id)->get();
        $invoice = InvoiceOnly::where('id', $id)->with(['signatureUser'])->get();
        return $invoice->isEmpty() ? response()->json([
            'success' => false,
            'message' => "Data product invoice",
            'data' => array(
                'invoice_only' => $product_invoice,
            ),
            'invoice' => $invoice,
        ]) : response()->json([
                        'success' => true,
                        'message' => "Data product invoice",
                        'data' => array(
                            'invoice_only' => $product_invoice,
                        ),
                        'invoice' => $invoice,
                    ]);
    }
    public function create(ProductInvoiceOnlyRequest $request)
    {
        $data = [
            'deskripsi_barang' => $request->deskripsi_barang,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'total' => $request->total,
            'id_invoice_only' => $request->id_invoice_only,
        ];

        $result = ProductInvoiceOnly::create($data);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data Product Invoice",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data Product Invoice",
            ]);
        }
    }
    public function update(ProductInvoiceOnlyRequest $request, $id)
    {
        $data = [
            'deskripsi_barang' => $request->deskripsi_barang,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'total' => $request->total,
            'id_invoice_only' => $request->id_invoice_only,
        ];

        $result = ProductInvoiceOnly::where('id', $id)->update($data);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Merubah Data Product Invoice",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Merubah Data Product Invoice",
            ]);
        }
    }
}