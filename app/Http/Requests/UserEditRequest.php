<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\Rule;

    class UserEditRequest extends FormRequest
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
            $userId       = $this->input('user_id');
            $userDetailId = $this->input('user_details_id');

            return [
                'email'      => [
                    'required',
                    Rule::unique('users', 'email')->ignore($userId),
                ],
                'username'   => [
                    'required',
                    Rule::unique('users', 'username')->ignore($userId),
                    'string',
                    'min:3',
                    'max:16',
                    'regex:/^[A-Za-z0-9]+$/',
                ],
                'farm_title' => [
                    'required',
                    Rule::unique('user_details', 'farm_title')->ignore($userDetailId),
                    'string',
                    'min:3',
                    'max:50',
                    'regex:/^[A-Za-z ]+$/',
                ],

                'first_name'    => 'required|string|min:3|max:30|regex:/^[A-Za-z ]+$/',
                'last_name'     => 'required|string|min:3|max:30|regex:/^[A-Za-z ]+$/',
                'address'       => 'required|string|min:3|max:200|regex:/^[A-Za-z0-9 ]+$/',
                'description'   => 'required|string|min:3|max:150',
                'gender'        => 'required|in:male,female',
                'role_id'       => 'numeric',
                'is_active'     => 'required',
                'phone'         => 'digits:11',
                'image_url'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
                'farm_logo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif',

            ];
        }

        public function messages(): array
        {
            return [
                'first_name.regex' => 'First Name can only contain letters and spaces',
                'last_name.regex'  => 'First Name can only contain letters and spaces',
                'farm_title.regex' => 'Username can only contain letters and spaces',
                'username.regex'   => 'Username can only contain letters and numbers',
                'address.regex'    => 'Username can only contain letters, spaces and numbers',
            ];
        }

        public function attributes(): array
        {
            return [
                'first_name'    => 'First Name',
                'last_name'     => 'Last Name',
                'email'         => 'Email',
                'username'      => 'Username',
                'farm_title'    => 'Farm Title',
                'address'       => 'Address',
                'description'   => 'Description',
                'gender'        => 'Gender',
                'password'      => 'Password',
                'image_url'     => 'User Image',
                'farm_logo_url' => 'Farm Image',
                'is_active'     => 'Status',
            ];
        }
    }
