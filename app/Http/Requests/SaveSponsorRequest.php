<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaveSponsorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $role = Auth::user()->roles->first()->name;

        if ($role == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'cif' => 'required|string',
            'address' => 'required|string',
            'is_active' => 'required|boolean',
            'main_plane' => 'required|boolean',
            'total_price' => 'nullable|integer',
        ];
    }
}