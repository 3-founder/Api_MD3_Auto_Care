<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceOnlyRequest;
use App\Models\InvoiceOnly;
use App\Models\ProductInvoiceOnly;
use Illuminate\Http\Request;

class InvoiceOnlyController extends Controller
{
    public function index()
    {
        $invoice = InvoiceOnly::with(['signatureUser'])->get();
        return $invoice->isEmpty() ? response()->json([
            'success' => false,
            'message' => "Data invoice",
            'data' => $invoice,
        ]) : response()->json([
                        'success' => true,
                        'message' => "Data invoice",
                        'data' => $invoice,
                    ]);
    }

    public function indexById($id)
    {
        $invoice = InvoiceOnly::where('id', $id)->with(['signatureUser'])->get();
        return $invoice->isEmpty() ? response()->json([
            'success' => false,
            'message' => "Data product invoice",
            'data' => $invoice,
        ]) : response()->json([
                        'success' => true,
                        'message' => "Data product invoice",
                        'data' => $invoice,
                    ]);
    }
    public function create(InvoiceOnlyRequest $request)
    {
        $data = [
            'no_invoice' => $request->no_invoice,
            'yth' => $request->yth,
            'sales' => $request->sales,
            'tanggal' => $request->tanggal,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'po_no' => $request->po_no,
            'diskon' => $request->diskon,
            'ongkos_kirim' => $request->ongkos_kirim,
            'cashback' => $request->cashback,
            'metode_pembayaran' => $request->metode_pembayaran,
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
            'a_n_rekening' => $request->a_n_rekening,
            'id_user_signature' => $request->id_user_signature,
            'ket_pembayaran' => $request->ket_pembayaran,
        ];

        $result = InvoiceOnly::create($data);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data Invoice",
                'data' => $result,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data Invoice",
            ]);
        }
    }

    public function update(InvoiceOnlyRequest $request, $id)
    {
        $data = [
            'no_invoice' => $request->no_invoice,
            'yth' => $request->yth,
            'sales' => $request->sales,
            'tanggal' => $request->tanggal,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'po_no' => $request->po_no,
            'diskon' => $request->diskon,
            'ongkos_kirim' => $request->ongkos_kirim,
            'cashback' => $request->cashback,
            'metode_pembayaran' => $request->metode_pembayaran,
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
            'a_n_rekening' => $request->a_n_rekening,
            'id_user_signature' => $request->id_user_signature,
            'ket_pembayaran' => $request->ket_pembayaran,
        ];

        $result = InvoiceOnly::where('id', $id)->update($data);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Merubah Data Invoice",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Merubah Data Invoice",
            ]);
        }
    }

    public function filterDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $result = InvoiceOnly::with(['signatureUser'])->whereBetween('tanggal', [$startDate, $endDate])->get();

        return $result != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Invoice",
            'data' => $result,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data Invoice",
                        'data' => $result,
                    ]);
    }
}