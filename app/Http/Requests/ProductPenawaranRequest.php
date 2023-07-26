<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPenawaranRequest extends FormRequest
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
                'produk_item' => 'required|string|min:3|max:100',
                'tipe_item' => 'required|string|min:3|max:50',
                'kemasan' => 'required|string|min:3|max:50',
                'tipe_kemasan' => 'required|string|min:3|max:50',
                'mesin' => 'required|string|min:3|max:50',
                'tipe_mesin' => 'required|string|min:2|max:50',
                'harga' => 'required|int',
                'id_penawaran' => 'required',
                'type_product' => 'required',
            ];
        } else {
            return [
                'produk_item' => 'required|string|min:3|max:100',
                'tipe_item' => 'required|string|min:3|max:50',
                'kemasan' => 'required|string|min:3|max:50',
                'tipe_kemasan' => 'required|string|min:3|max:50',
                'mesin' => 'required|string|min:3|max:50',
                'tipe_mesin' => 'required|string|min:2|max:50',
                'harga' => 'required|int|min:3|max:15',
                'id_penawaran' => 'required',
                'type_product' => 'required',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'produk_item.required' => 'Produk Item Tidak boleh kosong, min 3 max 50 karakter',
                'tipe_item.required' => 'Tipe Item Tidak boleh kosong, min 3 max 50 karakter',
                'kemasan.required' => 'Kemasan Tidak boleh kosong, min 3 max 50 karakter',
                'tipe_kemasan.required' => 'Tipe Kemasan Tidak boleh kosong, min 3 max 50 karakter',
                'mesin.required' => 'Mesin Tidak boleh kosong, min 3 max 50 karakter',
                'tipe_mesin.required' => 'Tipe Mesin Tidak boleh kosong, min 3 max 50 karakter',
                'harga.required' => 'Harga Tidak boleh kosong, min 3 angka',
                'id_penawaran.required' => 'Id Penawaran Tidak boleh kosong',
                'type_product.required' => 'Tipe Produk harus di pilih',
            ];
        } else {
            return [
                'produk_item.required' => 'Produk Item Tidak boleh kosong, min 3 max 50 karakter',
                'tipe_item.required' => 'Tipe Item Tidak boleh kosong, min 3 max 50 karakter',
                'kemasan.required' => 'Kemasan Tidak boleh kosong, min 3 max 50 karakter',
                'tipe_kemasan.required' => 'Tipe Kemasan Tidak boleh kosong, min 3 max 50 karakter',
                'mesin.required' => 'Mesin Tidak boleh kosong, min 3 max 50 karakter',
                'tipe_mesin.required' => 'Tipe Mesin Tidak boleh kosong, min 3 max 50 karakter',
                'harga.required' => 'Harga Tidak boleh kosong, min 3 angka',
                'id_penawaran.required' => 'Id Penawaran Tidak boleh kosong',
                'type_product.required' => 'Tipe Produk harus di pilih',
            ];
        }
    }
}