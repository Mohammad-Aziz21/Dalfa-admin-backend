<?php

    namespace App\Domain\Repositories\Service\Registration;

    use App\Domain\Repositories\Service\Service;

    class UserRegistration extends Service
    {

        /**
         * @var file
         */
        public $image_url;

        /**
         * @var file
         */
        public $role_id;

        /**
         * @var string
         */
        public $first_name;

        /**
         * @var string
         */
        public $last_name;

        /**
         * @var string
         */
        public $username;

        /**
         * @var string
         */
        public $email;

        /**
         * @var string
         */
        public $password;

        /**
         * @var string
         */
        public $password_confirmation;

        /**
         * @var string
         */
        public $farm_title;

        /**
         * @var string
         */
        public $address;

        /**
         * @var string
         */
        public $description;

        /**
         * @var string
         */
        public $phone;

        /**
         * @var string
         */
        public $farm_logo_url;

        /**
         * @var string
         */
        public $gender;

        public function __construct(
            string $role_id,
            string $image_url,
            string $first_name,
            string $last_name,
            string $gender,
            string $username,
            string $email,
            string $password,
            string $password_confirmation,
            string $farm_title,
            string $address,
            string $description,
            string $phone,
            string $farm_logo_url
        )
        {
            parent::__construct();

            $this->role_id               = $role_id;
            $this->image_url             = $image_url;
            $this->first_name            = $first_name;
            $this->last_name             = $last_name;
            $this->gender                = $gender;
            $this->username              = $username;
            $this->email                 = $email;
            $this->password              = $password;
            $this->password_confirmation = $password_confirmation;
            $this->farm_title            = $farm_title;
            $this->address               = $address;
            $this->description           = $description;
            $this->phone                 = $phone;
            $this->farm_logo_url         = $farm_logo_url;
        }

        /**
         * @return object|false
         */
        public function request()
        {
            $action = "user/register";
            $data   = [
                'role_id'               => $this->role_id,
                'image_url'             => $this->image_url,
                'first_name'            => $this->first_name,
                'last_name'             => $this->last_name,
                'gender'                => $this->gender,
                'username'              => $this->username,
                'email'                 => $this->email,
                'password'              => $this->password,
                'password_confirmation' => $this->password,
                'farm_title'            => $this->farm_title,
                'address'               => $this->address,
                'description'           => $this->description,
                'phone'                 => $this->phone,
                'farm_logo_url'         => $this->farm_logo_url,
            ];
            return $this->call($action, "POST", $data);
        }
    }
