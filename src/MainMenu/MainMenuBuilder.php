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

        public static function build(array $mainMenuItems)
        {
            $html = "<div class='navbar-container'>
                        <nav class='navbar' role='navigation'>
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
