<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class CattleStoreRequest extends FormRequest
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
                'name'        => 'required|string|min:3|max:50|regex:/^[A-Za-z ]+$/',
                'breed'       => 'required|string|min:3|max:30|regex:/^[A-Za-z ]+$/',
                'description' => 'nullable',
                'price'       => 'nullable|numeric',
                'weight'      => 'required|numeric',

                'teeth' => 'required|in:1,2,3,4,5,6,7,8',

                'status'         => 'required',
                'is_approved'    => 'required',
                'is_new_arrival' => 'required',
                'is_promoted'    => 'required',
                'is_auction'     => 'required',

                'image'         => 'required|array',
//                'image.*.title' => 'required|string|max:255',
                'image.*.url'   => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',

//                'video_title' => 'required',
//                'video_url'   => 'required|image|mimes:mp4|max:3072',
                'user_id'     => 'required',
            ];
        }

        public function messages(): array
        {
            return [
                'user_id.required' => 'COC Username required'
            ];
        }

        public function attributes()
        {
            return [
                'image.*.url' => 'custom image label',
                // Add other attribute replacements as needed...
            ];
        }
    }
