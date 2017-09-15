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
                    $html .= "<li><a href='${url}'><i class='fa fa-twitter'></i></a></li>";
                    break;
                  case "FACEBOOK":
                    $html .= "<li><a href='${url}'><i class='fa fa-facebook'></i></a></li>";
                    break;
                  case "GOOGLE+":
                    $html .= "<li><a href='${url}'><i class='fa fa-google-plus'></i></a></li>";
                    break;
                  default:
                    $html .= "<li><a href='${url}'>${title}</a></li>";
                    break;
                }
            }
            $html .= "<li class='item-search'>
                    <div class='search'>
                      <div id='cse' style='width: 100%;'>Loading</div>
                        <script src='//www.google.com/jsapi' type='text/javascript'></script>
                        <script type='text/javascript'>
                        google.load('search', '1', {language: 'en', style: src='css/gcse.css'});
                        google.setOnLoadCallback(function() {
                        var customSearchOptions = {};
                        var orderByOptions = {};
                        orderByOptions['keys'] = [{label: 'Relevance', key: ''} , {label: 'Date', key: 'date'}];
                        customSearchOptions['enableOrderBy'] = true;
                        customSearchOptions['orderByOptions'] = orderByOptions;
                        var imageSearchOptions = {};
                        imageSearchOptions['layout'] = 'google.search.ImageSearch.LAYOUT_POPUP';
                        customSearchOptions['enableImageSearch'] = true;
                        customSearchOptions['overlayResults'] = true;
                        var customSearchControl =   new google.search.CustomSearchControl('004401904339917838776:3zrwgrnv-hw', customSearchOptions);
                        customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
                        var options = new google.search.DrawOptions();
                        options.setAutoComplete(true);
                        customSearchControl.draw('cse', options);
                        }, true);
                        </script>
                    </div>
                </li>
            </ul>
        </div>";
            return $html;
        }
    }
