<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaveCourseRequest extends FormRequest
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
        //rules for title (string), url (string), description (string), elevation (integer), map_image_url (string), max_participants (integer), km (integer), date (date), start_point (string), poster_url (string), sponsorship_price (integer), photos_id (string)
        return [
            'title' => 'required',
            'url' => 'required',
            'description' => 'required',
            'elevation' => 'required|integer',
            'max_participants' => 'required|integer',
            'km' => 'required|integer',
            'date' => 'required|date',
            'start_point' => 'required',
            'sponsorship_price' => 'required|integer',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El proyecto necesita un título',
            'map_image.file' => 'La imatge ha de ser un fitxer',
            'map_image.image' => 'La imatge ha de ser una imatge',
            'map_image.max' => 'La imatge no pot pesar més de 5MB',
        ];
    }
}
