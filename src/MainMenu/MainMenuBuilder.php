<?php
    namespace CosmoQuestMenuBuilder\MainMenu;
    use CosmoQuestMenuBuilder\MenuItem;

    /**
     *
     */
    class MainMenuBuilder
    {

        private static function buildTargetMenu(MenuItem $target)
        {
            if($target->isMegaMenu())
            {
                $title = $target->title();
                $url = $target->url();
                $html = "<li class='dropdown'>
                   <a href='#' class=''>${title}<span><i class='fa fa-angle-down' aria-hidden='true'></i></span></a>
                  <ul class='dropdown-menu dropdown-full'>
                     <div class='container'>";
                     foreach ($target->subItems() as $item) {
                         $title = $item->title();
                         $url = $item->url();
                         $html .= "<div class='col-md-3 col-sm-12'>
                             <p class='menuHeader' href='${url}'>${title}</p>
                             <ul>";
                             foreach ($item->subItems() as $subItem) {
                                 $html .= self::buildTargetMenu($subItem);
                             }
                             $html .= "</ul>
                                     </div>";
                     }
                $html .= "</div>
                  </ul>
                </li>";
                return $html;

            }else if($target->hasSubItems()){
                $title = $target->title();
                $url = $target->url();
                $html = "<li class='dropdown'>
                           <a href='${url}' class=''>${title}<span><i class='fa fa-angle-down' aria-hidden='true'></i></span></a>
                              <ul class='dropdown-menu'>
                                 <div class='container'>
                                                        <ul>";
                                                        foreach ($target->subItems() as $item) {
                                                            $html .= self::buildTargetMenu($item);
                                                        }
                                                        $html .= "</ul>
                                                </div>
                              </ul>
                        </li>";
                        return $html;

            }else {
                $title = $target->title();
                $url = $target->url();
                return "<li><a href='${url}'>${title}</a></li>";
            }

        }

        public static function build(array $mainMenuItems, array $toppMenuItems)
        {

            $html = "<div class='navbar-container'>
                     <div class='mobile-topNav'>
                        <ul class='rightNav'>";
            foreach ($topMenuItems as $item) {
                $url = $item->url;
                $title = $item->title;
                $html .= "<li><a href='${url}'>${title}</a></li>";
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
                        $html .= "<nav class='navbar' role='navigation'>
                            <div class='navbar-header'>
                              <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                                 <i class='fa fa-bars'></i>
                                 Menu
                              </button>
                            </div>
                            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                                <ul class='nav-menu navbar-nav'>";
                                  foreach ($mainMenuItems as $menuItem) {
                                      $html .= self::buildTargetMenu($menuItem);
                                  }
                      $html .= "</ul>
                            </div>
                        </nav>
                    </div>";
            return $html;
        }
    }

 ?>
