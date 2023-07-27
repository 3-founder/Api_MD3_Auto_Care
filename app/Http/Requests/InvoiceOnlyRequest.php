<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceOnlyRequest extends FormRequest
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
                'no_invoice' => 'required|string|min:3|max:50',
                'yth' => 'required|string|min:3|max:50',
                'sales' => 'required|string|min:3|max:50',
                'tanggal' => 'required|date',
                'tanggal_jatuh_tempo' => 'required|date',
                'metode_pembayaran' => 'required',
                'id_user_signature' => 'required',
            ];
        } else {
            return [
                'no_invoice' => 'required|string|min:3|max:50',
                'yth' => 'required|string|min:3|max:50',
                'sales' => 'required|string|min:3|max:50',
                'tanggal' => 'required|date',
                'tanggal_jatuh_tempo' => 'required|date',
                'metode_pembayaran' => 'required',
                'id_user_signature' => 'required',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'no_invoice.required' => 'No Invoice Wajib di isi min 3 karakter',
                'yth.required' => 'Yth Wajib di isi min 3 karakter',
                'sales.required' => 'Sales Wajib di isi min 3 karakter',
                'tanggal.required' => 'Tanggal Wajib di isi',
                'tanggal_jatuh_tempo.required' => 'Tanggal Jatuh Tempo Wajib di isi',
                'metode_pembayaran.required' => 'Metode Pembayaran Wajib di isi',
                'id_user_signature.required' => 'Id User Ttd Wajib di isi',
            ];
        } else {
            return [
                'no_invoice.required' => 'No Invoice Wajib di isi min 3 karakter',
                'yth.required' => 'Yth Wajib di isi min 3 karakter',
                'sales.required' => 'Sales Wajib di isi min 3 karakter',
                'tanggal.required' => 'Tanggal Wajib di isi',
                'tanggal_jatuh_tempo.required' => 'Tanggal Jatuh Tempo Wajib di isi',
                'metode_pembayaran.required' => 'Metode Pembayaran Wajib di isi',
                'id_user_signature.required' => 'Id User Ttd Wajib di isi',
            ];
        }
    }
}