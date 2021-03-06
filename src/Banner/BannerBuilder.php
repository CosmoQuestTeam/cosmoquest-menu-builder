<?php
    namespace CosmoQuestMenuBuilder\Banner;
    use CosmoQuestMenuBuilder\User;
    /**
     *
     */
    class BannerBuilder
    {
        public static function build(string $logoUrl, User $user = null, string $homeUrl)
        {
            $url = $logoUrl;
            $html = "<div class='staticBanner'>
                            <div class='bannerWrap'>
                                <span class='middleAlign'></span><a href='${homeUrl}'><img class='topLogo' src='${url}'></a>
                                    <script>
                                        function handleReloadModal(event) {
                                            jQuery('#box').empty();
                                            jQuery('#box').load('/accounts/banner');
                                        };
                                        jQuery(document).ready(function () {
                                            handleReloadModal(null);
                                            jQuery('#box').on('change', handleReloadModal);
                                        });
                                    </script>
                                <span id='box'></span>
                           </div>
                    </div>";

            return $html;
        }
    }

 ?>
