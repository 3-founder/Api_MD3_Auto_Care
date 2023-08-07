<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return $company == '[]' ? response()->json([
            "success" => false,
            "message" => "Data Company",
            "data" => $company,
        ]) : response()->json([
                        "success" => true,
                        "message" => "Data Company",
                        "data" => $company,
                    ]);
    }
    public function create(Request $request)
    {
        $fileName = "";
        if ($request->hasFile('logo')) {
            $fileName = $request->file('logo')->store('company-logo', 'public');
        } else {
            $fileName = null;
        }

        $data = [
            'logo' => $fileName,
            'nama_company' => $request->nama_company,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
        ];

        $result = Company::create($data);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Menambahkan Data Company",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Menambahkan Data Company",
            ]);
        }
    }
    public function edit($id)
    {
        $company = Company::findOrFail($id)->get();
        return response()->json([
            "success" => true,
            "data" => $company,
        ]);
    }
    public function update(Request $request, Company $company, $id)
    {
        $request->validate([
            'kota' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'nama_company' => 'required',
            'logo' => 'required',
        ]);

        $company = Company::find($id);

        $destination = "storage/" . $company->logo;
        $fileName = "";
        if ($request->hasFile('new_logo')) {
            if (File::exists($destination)) {
                File::delete($destination);
            } else {
                return "Salah";
            }

            $fileName = $request->file('new_logo')->store('company-logo', 'public');
        } else {
            $fileName = $request->logo;
        }

        $data = [
            'logo' => $fileName,
            'nama_company' => $request->nama_company,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
        ];

        $result = Company::where('id', $id)->update($data);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => "Berhasil Merubah Data Company",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Gagal Merubah Data Company",
            ]);
        }
    }
}