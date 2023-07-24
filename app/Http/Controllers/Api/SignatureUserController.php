<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignatureUserRequest;
use App\Models\SignatureUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

class SignatureUserController extends Controller
{
    public function index()
    {
        $user = SignatureUser::all();
        return $user != '[]' ? response()->json([
            'success' => true,
            'message' => $user,
        ]) : response()->json([
                        'success' => false,
                        'message' => $user,
                    ]);
    }
    public function indexById($id)
    {
        $user = SignatureUser::find($id);
        return $user != '[]' ? response()->json([
            'success' => true,
            'message' => $user,
        ]) : response()->json([
                        'success' => false,
                        'message' => $user,
                    ]);
    }
    public function create(SignatureUserRequest $request)
    {
        try {
            $ttdImageName = Str::random(32) . "." . $request->tanda_tangan->getClientOriginalExtension();

            //create post
            SignatureUser::create([
                'nama_lengkap' => $request->nama_lengkap,
                'tanda_tangan' => $ttdImageName,
            ]);

            //save image ttd in storege folder
            Storage::disk('public')->put('ttd/' . $ttdImageName, file_get_contents($request->tanda_tangan));

            //return response json
            return response()->json([
                "success" => true,
                "message" => "Tambah Tanda tangan berhasil.",
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                "success" => false,
                "message" => "Sesuatu terjadi kesalahan",
                "message2" => $e,
            ], 500);
        }
    }
}