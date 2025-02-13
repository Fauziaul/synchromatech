<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules() {
        $rules = [
            'deskripsi' => 'required',
        ];
    
        if ($this->isMethod('post')) {
            // Pada saat create, gambar wajib diisi
            $rules['picture'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        } else {
            // Pada saat update, gambar bersifat opsional
            $rules['picture'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }
    
        return $rules;
    }
    
    public function messages() {
        return [
            'deskripsi.required' => 'Deskripsi Harus Di Isi',
            'picture.required' => 'Gambar Harus Di Isi',
            'picture.image' => 'Gambar Harus berupa file gambar (JPEG, JPG, PNG)',
            'picture.mimes' => 'Format gambar harus berupa JPEG, JPG, atau PNG.',
            'picture.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ];
    }
}
