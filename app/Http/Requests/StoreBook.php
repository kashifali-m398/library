<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Request;

class StoreBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check() && Auth::user()->role=='admin') return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(strpos(Request::path(), 'update')!==false){
            return [
                'rack_id' => 'required|int',
                'title' => 'required|max:255',
                'author' => 'required|max:255',
                'published_year' => 'required|max:255'
            ];
        }

        return [
            'rack_id' => 'required|int',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'published_year' => 'required|date_format:Y'
        ];
    }
}
