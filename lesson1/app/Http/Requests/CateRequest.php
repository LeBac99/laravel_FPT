<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class CateRequest extends FormRequest
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
        $validate = [
            'name' => [
                'required',
                Rule::unique('categories')->ignore($this->id),
            ],
            'description' =>[
                'required',

            ]

            
        ];
        if(!$this->id){
          
            $validate['image'] = 'required|file|mimes:jpeg,png';
        }
        return $validate;
    }
    public function messages(){
        return [
            'image.required'  =>'*Vui lòng nhập ảnh!',
            'image.mimes'=>'*Vui lòng chọn đúng định dạng jpg&png!',
            'name.required' => '*Vui lòng điền dữ liệu cho name!',
            'name.unique' => '*Tên đã tồn tại, vui lòng chọn tiêu đề khác!',
            'description.required' => '*Vui lòng không được để trống!',
        ];
    }
}

