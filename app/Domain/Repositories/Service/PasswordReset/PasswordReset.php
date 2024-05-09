<?php

    namespace App\Domain\Repositories\Service\PasswordReset;

    use App\Domain\Repositories\Service\Service;

    class PasswordReset extends Service
    {

        /**
         * @var string
         */
        public $username;

        /**
         * @var string
         */
        public $password;

        /**
         * @var string
         */
        public $password_confirmation;


        public function __construct(
            string $username,
            string $password,
            string $password_confirmation
        )
        {
            parent::__construct();

            $this->username              = $username;
            $this->password              = $password;
            $this->password_confirmation = $password_confirmation;
        }

        /**
         * @return object|false
         */
        public function request()
        {
            $action = "user/reset/password";
            $data   = [
                'username'              => $this->username,
                'password'              => $this->password,
                'password_confirmation' => $this->password,            ];
            return $this->call($action, "POST", $data);
        }
    }
