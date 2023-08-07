<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductInvoiceOnlyRequest extends FormRequest
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
                'deskripsi_barang' => 'required|string|min:3|max:50',
                'qty' => 'required',
                'harga' => 'required|string|min:3|max:50',
                'total' => 'required|string|min:3|max:50',
                'id_invoice_only' => 'required|string',
            ];
        } else {
            return [
                'deskripsi_barang' => 'required|string|min:3|max:50',
                'qty' => 'required',
                'harga' => 'required|string|min:3|max:50',
                'total' => 'required|string|min:3|max:50',
                'id_invoice_only' => 'required|string',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'deskripsi_barang.required' => 'Deskripsi Barang Wajib di isi min 3 karakter',
                'qty.required' => 'Qty Barang Wajib di isi',
                'harga.required' => 'Harga Wajib di isi min 3 karakter',
                'total.required' => 'Total Wajib di isi min 3 karakter',
                'id_invoice_only.required' => 'Id Invoice Only Wajib di isi',
            ];
        } else {
            return [
                'deskripsi_barang.required' => 'Deskripsi Barang Wajib di isi min 3 karakter',
                'qty.required' => 'Qty Barang Wajib di isi',
                'harga.required' => 'Harga Wajib di isi min 3 karakter',
                'total.required' => 'Total Wajib di isi min 3 karakter',
                'id_invoice_only.required' => 'Id Invoice Only Wajib di isi',
            ];
        }
    }
}