<?php
    namespace CosmoQuestMenuBuilder;

    /**
     * MenuItem
     */
    class MenuItem
    {
        private $title = "";
        private $url = "";
        private $isMegaMenu = false;

        private $isCategory = false;

        function __construct(string $title, string $url, bool $isMegaMenu = false, array $subItems = [])
        {
            $this->title = $title;
            $this->url = $url;
            $this->isMegaMenu = $isMegMenu;
            $this->subItems = [];
        }

        public function title()
        {
            return $this->title;
        }

        public function url()
        {
            return $this->url;
        }

        public function isMegaMenu()
        {
            return $this->isMegaMenu;
        }

        public function subItems()
        {
            return $this->subItems;
        }

        public function hasSubItems()
        {
            return sizeof($this->subItems) > 0;
        }
    }

 ?>
