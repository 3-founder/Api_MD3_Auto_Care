<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenawaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
                'no_penawaran' => 'required',
                'hal_penawaran' => 'required|string|min:3|max:50',
                'nama_customer' => 'required|string|min:3|max:50',
                'tanggal' => 'required|date',
                'id_user_signature' => 'required',
            ];
        } else if (request()->isMethod('put')) {
            return [
                'no_penawaran' => 'required',
                'hal_penawaran' => 'required|string|min:3|max:50',
                'nama_customer' => 'required|string|min:3|max:50',
                'tanggal' => 'required|date',
                'id_user_signature' => 'required',
            ];
        } else {
            return [
                'no_penawaran' => 'required',
                'hal_penawaran' => 'required|string|min:3|max:50',
                'nama_customer' => 'required|string|min:3|max:50',
                'tanggal' => 'required|date',
                'id_user_signature' => 'required',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'no_penawaran' => 'No Penawaran Wajib di Isi, min 3 max 50 karakter',
                'hal_penawaran' => 'Hal Pernawaran Wajib di isi, min 3 max 50 karakter',
                'nama_customer' => 'Nama Customer Wajib di Isi, min 3 max 50 karakter',
                'tanggal' => 'Tanggal Wajib di isi',
                'id_user_signature' => 'Tanda tangan wajib di pilih',
            ];
        } else if (request()->isMethod('put')) {
            return [
                'no_penawaran' => 'No Penawaran Wajib di Isi, min 3 max 50 karakter',
                'hal_penawaran' => 'Hal Pernawaran Wajib di isi, min 3 max 50 karakter',
                'nama_customer' => 'Nama Customer Wajib di Isi, min 3 max 50 karakter',
                'tanggal' => 'Tanggal Wajib di isi',
                'id_user_signature' => 'Tanda tangan wajib di pilih',
            ];

        } else {
            return [
                'no_penawaran' => 'No Penawaran Wajib di Isi, min 3 max 50 karakter',
                'hal_penawaran' => 'Hal Pernawaran Wajib di isi, min 3 max 50 karakter',
                'nama_customer' => 'Nama Customer Wajib di Isi, min 3 max 50 karakter',
                'tanggal' => 'Tanggal Wajib di isi',
                'id_user_signature' => 'Tanda tangan wajib di pilih',
            ];
        }
    }
}