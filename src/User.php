<?php
    namespace CosmoQuestMenuBuilder;

    /**
     * User
     */
    class User
    {

        private $name = "";
        private $avatarUrl = "";

        private $imageClass = "img-circle";

        function __construct(string $name, string $avatarUrl)
        {
            $this->name = $name;
            $this->avatarUrl = $avatarUrl;
        }

        public function name()
        {
            return $this->name;
        }

        public function profileUrl()
        {
            $name = $this->name;
            return `/user/${name}`;
        }

        public function settingsUrl()
        {
            $name = $this->name;
            return `/user/${name}/settings`;
        }

        public function avatar($width = "35px", $height = "35px")
        {
            $url = $this->avatarUrl;
            $class = $this->imageClass;
            return "<img src='${url}' class='img-circle' width='${width}' height='${height}'>";
        }
    }

 ?>
