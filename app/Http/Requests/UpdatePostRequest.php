<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePostRequest extends Request
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
            'title'         => 'required|max:255',
            // 'slug'          => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id'   => 'required|integer',
            'featured_image'=> 'sometimes|image',
            'body'          => 'required',
        ];
    }
}
