<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\Rule;

    class UserStoreRequest extends FormRequest
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
                'email'         => 'required|unique:users,email',
                'first_name'    => 'required|string|min:3|max:30|regex:/^[A-Za-z ]+$/',
                'last_name'     => 'required|string|min:3|max:30|regex:/^[A-Za-z ]+$/',
                'username'      => 'required|unique:users,username|string|min:3|max:16|regex:/^[A-Za-z0-9]+$/',
                'farm_title'    => 'required|string|min:3|max:50|regex:/^[A-Za-z ]+$/|' . Rule::unique('user_details', 'farm_title'),
                'address'       => 'required|string|min:3|max:200|regex:/^[A-Za-z0-9 ]+$/',
                'description'   => 'required|string|min:3|max:150',
                'gender'        => 'required|in:male,female',
                'password'      => 'required|string|min:8|max:30|regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,52}$/',
                'role_id'       => 'numeric',
                'phone'         => 'digits:11',
                'image_url'     => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
                'farm_logo_url' => 'required|image|mimes:jpeg,png,jpg,gif',

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
                'password.regex'   => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character (#?!@$%^&*-), and be between 8 and 52 characters in length.',
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
            ];
        }
    }
