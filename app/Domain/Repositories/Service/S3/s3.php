<?php

    namespace App\Domain\Repositories\Service\S3;

    use App\Domain\Repositories\Service\Service;

    class s3 extends Service
    {

        /**
         * @var file
         */
        public $image_url;


        public function __construct(
            string $image_url,
        )
        {
            parent::__construct();

            $this->image_url = $image_url;
        }

        /**
         * @return object|false
         */
        public function request()
        {
            $action = "user/upload";
            $data   = [
                'file' => new \CURLFile($this->image_url)
            ];
            return $this->call($action, "POST", $data);
        }
    }
