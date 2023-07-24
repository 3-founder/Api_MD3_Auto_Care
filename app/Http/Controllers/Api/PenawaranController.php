<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenawaranRequest;
use App\Models\Penawaran;
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function index()
    {
        $result = Penawaran::with(['signatureUser'])->get();
        return $result != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Customer",
            'data' => $result,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data Customer",
                        'data' => $result,
                    ]);
    }
    public function indexById($id)
    {
        $result = Penawaran::with(['signatureUser'])->where('id', $id)->get();
        return $result != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Customer",
            'data' => $result,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data Customer",
                        'data' => $result,
                    ]);
    }
    public function create(PenawaranRequest $request)
    {
        $penawaran = new Penawaran();
        $penawaran->no_penawaran = $request->no_penawaran;
        $penawaran->hal_penawaran = $request->hal_penawaran;
        $penawaran->nama_customer = $request->nama_customer;
        $penawaran->tanggal = $request->tanggal;
        $penawaran->id_user_signature = $request->id_user_signature;
        $result = $penawaran->save();

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data penawaran",
                'data' => $penawaran,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data penawaran",
                'data' => $penawaran,
            ]);
        }
    }
    public function update(PenawaranRequest $request, $id)
    {
        $penawaran = Penawaran::find($id);
        $penawaran->no_penawaran = $request->no_penawaran;
        $penawaran->hal_penawaran = $request->hal_penawaran;
        $penawaran->nama_customer = $request->nama_customer;
        $penawaran->tanggal = $request->tanggal;
        $penawaran->id_user_signature = $request->id_user_signature;
        $penawaran->save();

        if ($penawaran) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Merubah Data penawaran",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Merubah Data penawaran",
            ]);
        }
    }
    public function filterDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $result = Penawaran::with(['signatureUser'])->whereBetween('tanggal', [$startDate, $endDate])->get();

        return $result != '[]' ? response()->json([
            'success' => true,
            'message' => "Data Penawaran",
            'data' => $result,
        ]) : response()->json([
                        'success' => false,
                        'message' => "Data Penawaran",
                        'data' => $result,
                    ]);
    }
}