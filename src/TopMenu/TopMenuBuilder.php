<?php
    namespace CosmoQuestMenuBuilder\TopMenu;

use CosmoQuestMenuBuilder\MenuItem;

    /**
     *
     */
    class TopMenuBuilder
    {
        public static function build(array $topMenuItems)
        {
            $html = '<div class="topNav">
            <ul class="rightNav">';
            foreach ($topMenuItems as $item) {
                $url = $item->url;
                $title = $item->title;
                // $html .= "<li><a href='${url}'><i class='fa-2x fa fa-twitter' aria-hidden='true'></i></a></li>";
                // $html .= "<li><a href='${url}'><i class='fa-2x fa fa-facebook-official' aria-hidden='true'></i></a></li>";
                // $html .= "<li><a href='${url}'><i class='fa-2x fa fa-google-plus' aria-hidden='true'></i></a></li>";
                switch (strtoupper($title)) {
                  case "TWITTER":
                    $html .= "<li class='top-menu-sm'><a href='${url}'><i class='fa fa-twitter'></i></a></li>";
                    break;
                  case "FACEBOOK":
                    $html .= "<li class='top-menu-sm'><a href='${url}'><i class='fa fa-facebook'></i></a></li>";
                    break;
                  case "GOOGLE+":
                    $html .= "<li class='top-menu-sm'><a href='${url}'><i class='fa fa-google-plus'></i></a></li>";
                    break;
                  default:
                    $html .= "<li class='top-menu-item'><a href='${url}'>${title}</a></li>";
                    break;
                }
            }
            $html .= "<li class='item-search'>
                    <div class='search'>
                    <script>
                        (function() {
                          var cx = '004401904339917838776:3zrwgrnv-hw';
                          var gcse = document.createElement('script');
                          gcse.type = 'text/javascript';
                          gcse.async = true;
                          gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                          var s = document.getElementsByTagName('script')[0];
                          s.parentNode.insertBefore(gcse, s);
                        })();
                      </script>
                      <gcse:search></gcse:search>
                    </div>
                </li>
            </ul>
        </div>";
            return $html;
        }
    }
