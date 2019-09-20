<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class ProductRequest extends FormRequest
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
                Rule::unique('products')->ignore($this->id),
            ],
            'price' => [
                'required',
                'min:1',
                'between:1,999999',
                'numeric'
               
                 
            ],
            'detail'=>[
                'required',
            ],
            'amount'=> [
                'required',
                'min:1',
                'between:1,999999',
                'numeric',
                
            ]
            
        ];

        if(!$this->id){
            $validate['image'] = 'required|file|mimes:jpeg,png';
        }
        return $validate;
     }
      public function messages(){
            return [
                'image.required' =>'*Vui lòng nhập ảnh!',
                'image.mimes'=>'*Vui lòng chọn đúng định dạng jpg&png!',
                'name.required' => '*Vui lòng điền dữ liệu!',
                'name.unique' => '*Tên sản phẩm đã tồn tại, vui lòng chọn tiêu đề khác!',
                'price.required'=>'*Bạn không được để trống, vui lòng nhập giá!',
                // 'price.max'=> '*Bạn không được nhập quá 8 ký tự',
                'price.min'=> '*Bạn phải nhập số nguyên dương!',
                'price.numeric'=> '*Bạn phải nhập số!',
                'price.between'=> '*Bạn không được nhập quá 6 ký tự!',
                'detail.required'=>'*Bạn không được để trống, vui lòng nhập mô tả!',
                'amount.required' => '*Vui lòng điền dữ liệu cho amount!',
                'amount.between'=>'*Bạn không được nhập quá 6 ký tự!',
                'amount.min'=>'*Bạn phải nhập số nguyên dương!',
                'amount.numeric'=>'*Bạn phải nhập số!',
                
            ];
    }

    
}
