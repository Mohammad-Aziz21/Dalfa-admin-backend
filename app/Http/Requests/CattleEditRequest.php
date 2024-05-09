<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\Rule;

    class CattleEditRequest extends FormRequest
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
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
        public function rules(): array
        {
            return [
                'name'   => 'required|string|min:3|max:30|regex:/^[A-Za-z ]+$/',
                'breed'  => 'required|string|min:3|max:30|regex:/^[A-Za-z ]+$/',
                'price'  => 'nullable|numeric',
                'weight' => 'required|numeric',

                'teeth' => 'required|in:1,2,3,4,5,6,7,8',

                'status'         => 'required',
                'is_approved'    => 'required',
                'is_new_arrival' => 'required',
                'is_promoted'    => 'required',
                'is_auction'     => 'required',

                'image'           => 'nullable|array',
                'existing_image'  => 'nullable|array',
                //            'image.*.title'  => 'nullable|string|max:255',
                'image.*.url'     => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',

                //            'video_title'    => 'required',
                //            'video_url'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
                'user_id'         => 'required',
                'validate_images' => Rule::requiredIf(function () {
                    return empty($this->input('image')) && empty($this->input('existing_image'));
                }),
            ];
        }

        public function messages(): array
        {
            return [
                'image.*.url.required'     => 'The image at position :key is not uploaded. Please upload it',
                'validate_images.required' => 'The image not uploaded. Please upload it',
            ];
        }

        public function attributes(): array
        {
            return [
                'validate_images' => 'Image',
            ];
        }
    }
