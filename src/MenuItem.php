<?php
    namespace CosmoQuestMenuBuilder;

    /**
     * MenuItem
     */
    class MenuItem
    {
        public $title = "";
        public $url = "";
        public $isMegaMenu = false;
        public $subItems = [];

        function __construct(string $title, string $url, bool $isMegaMenu = false, array $subItems = [])
        {
            $this->title = $title;
            $this->url = $url;
            $this->isMegaMenu = $isMegaMenu;
            $this->subItems = $subItems;
        }

        public function setIsMegaMenu(bool $isMegaMenu)
        {
          $this->isMegaMenu = $isMegaMenu;
        }

        public function appendSubItem(MenuItem $item)
        {
          array_push($this->subItems, $item);
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
