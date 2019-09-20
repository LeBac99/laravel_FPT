<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
class AddFormRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('posts')->ignore($this->id),
            ],
            'content' =>[
                'required',

            ],


            
        ];
        if(!$this->id){
            $validate['publish_date'] = 'required|date|after:'.Carbon::now()->subDay()->format('Y-m-d');
            $validate['image'] = 'required|file|mimes:jpeg,png';
        }
        return $validate;
    }
    public function messages(){
        return [
            'image.required' =>'*Vui lòng nhập ảnh!',
            'image.mimes'=>'*Vui lòng chọn đúng định dạng jpg&png!',
            'title.required' => '*Vui lòng điền dữ liệu cho tiêu đề!',
            'title.unique' => '*Tiêu đề đã tồn tại, vui lòng chọn tiêu đề khác!',
            'content.required' => '*Vui lòng điền dữ liệu!',
            'publish_date.required'=>'*Vui lòng nhập publish_date!',
        ];
    }
}
