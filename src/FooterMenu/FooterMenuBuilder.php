<?php
    namespace CosmoQuestMenuBuilder\FooterMenu;
    use CosmoQuestMenuBuilder\MenuItem;

    /**
     *
     */
    class FooterMenuBuilder
    {
        public static function build(array $menuItems)
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
                <div class='col-md-5'>
                    <div class='cq-footer-widget'>
                        <p>CosmoQuest is supported in part by NASA under cooperative agreement award number NNX16AC68A. Any opinions, findings, and conclusions or recommendations expressed are those of this project and do not necessarily reflect the views of the National Aeronautics and Space Administration (NASA). For a complete listing of sponsors, see our credits page.</p>
                    </div>
                </div>
                <div class='col-md-5'>
                    <div class='cq-footer-widget'>
                        <p><a href='#'>CosmoQuest is a partnership of numerous institutions around the globe. Want to get involved?</a>
                        <a href='#'>Email info(at)cosmoquest(dot)org</a></p>
                        <p>
                            Unless otherwise stated, all content is licensed under a <span><a href='#'>Creative Commons Attribution-NonCommercial 4.0 International License.</a></span>
                        </p>
                        <a class='creative-commons' href='https://creativecommons.org/licenses/by-nc/4.0/'>
                            <img src='/images/cc_icon_cc.png'>
                            <img src='/images/cc_icon_cc_by.png'>
                        </a>
                    </div>
                </div>
            </div>
        </div>";
            return $html;
        }
    }
