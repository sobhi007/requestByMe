<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en' => 'required|unique:offers',
            'name_ar' => 'required|unique:offers',
            'description_en' => 'required',
            'description_ar' => 'required',
        ];
    }
   
}
