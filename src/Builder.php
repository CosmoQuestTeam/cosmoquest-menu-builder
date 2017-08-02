<?php
    namespace CosmoQuestMenuBuilder;

    use CosmoQuestMenuBuilder\TopMenu\TopMenuBuilder;
    use CosmoQuestMenuBuilder\MainMenu\MainMenuBuilder;
    use CosmoQuestMenuBuilder\Banner\BannerBuilder;
    use CosmoQuestMenuBuilder\User as CQMenuBuilderUser;


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
    }

 ?>
