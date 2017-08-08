<?php
    namespace CosmoQuestMenuBuilder;

    use CosmoQuestMenuBuilder\Banner\BannerBuilder;
    use CosmoQuestMenuBuilder\TopMenu\TopMenuBuilder;
    use CosmoQuestMenuBuilder\User as CQMenuBuilderUser;
    use CosmoQuestMenuBuilder\MainMenu\MainMenuBuilder;
    use CosmoQuestMenuBuilder\FooterMenu\FooterMenuBuilder;


    /**
     *
     */
    class Builder
    {
        public static function buildNav(array $topMenuItems, array $mainMenuItems,string $logoUrl, CQMenuBuilderUser $user = null, string $homeUrl = "/")
        {
            $topMenu = TopMenuBuilder::build($topMenuItems);
            $banner = BannerBuilder::build($logoUrl, $user, $homeUrl);
            $mainMenu = MainMenuBuilder::build($mainMenuItems);

            $html = "<div class='megaWrap'>
                        <div class='navWrap'>
                            ${topMenu}
                        </div>
                        ${banner}
                        ${mainMenu}
                        </div>";

            return $html;

        }

        public static function buildFooter(array $footerItems, string $leftWidget = null, string $rightWidget = null)
        {
            $footerMenu = FooterMenuBuilder::build($footerItems, $leftWidget, $rightWidget);
            $html = "${footerMenu}";
            return $html;
        }
    }

 ?>
