<?php
    namespace CosmoQuestMenuBuilder\FooterMenu;
    use CosmoQuestMenuBuilder\MenuItem;

    /**
     *
     */
    class FooterMenuBuilder
    {
        public static function build(array $menuItems, string $leftWidget = null, string $rightWidget = null)
        {
            $html ="<div class='section'>
            <div class='cq-footer-widget-section'>
                <div class='col-md-2'>
                    <ul class='cq-footer-navigation-items'>";
                        foreach ($menuItems as $item) {
                            $title = $item->title();
                            $url = $item->url();
                            $html .= "<li><a href='${url}'>${title}</a></li>";
                        }
                        $html .= "<li class='social-media'>
                            <a class='ic-facebook' href='https://www.facebook.com/CosmoQuestX/'><i class='fa-2x fa fa-facebook-official' aria-hidden='true'></i></a>
                            <a class='ic-twitter' href='http://twitter.com/CosmoQuestX'><i class='fa-2x fa fa-twitter' aria-hidden='true'></i></a>
                            <a class='ic-google' href='https://plus.google.com/+CosmoQuest'><i class='fa-2x fa fa-google-plus' aria-hidden='true'></i></a>
                        </li>
                    </ul>
                </div>
                <div class='col-md-5'>";
                    if($leftWidget != null)
                    {
                        $html .= "<div class='cq-footer-widget'>
                            ${leftWidget}
                        </div>";
                    }
                $html .= "<div class='footer-logos'>
                    <a href='https://cosmoquest.org'><img src='/static/csb/images/cosmoquest-footer-logo.png'></a>
                    <a href='https://www.astrosociety.org/'><img src='/static/csb/images/asp-footer-logo.png'></a>
                </div></div>
                <div class='col-md-5'>";
                if($rightWidget != null)
                {
                    $html .= "<div class='cq-footer-widget'>
                        ${rightWidget}
                    </div>";
                }
                $html .= "
                
                </div>
            </div>
        </div>";
            return $html;
        }
    }
