<?php
    namespace CosmoQuestMenuBuilder\Banner;
    use CosmoQuestMenuBuilder\User;
    /**
     *
     */
    class BannerBuilder
    {
        private static function buildUserBanner(User $user)
        {
            $profileUrl = $user->profileUrl();
            $settingsUrl = $user->settingsUrl();
            $avatar = $user->avatar();
            $name = $user->name();

          //   $html = "<div class='loginBox'>
          //     <span class='middleAlign'></span>
          //     <div class='boxes'>
          //     <div class='avatar-holder'>
          //       ${avatar}
          //     </div>
          //     <div style='float: right;'>
          //       <a href='${profileUrl}'>${name}</a>
          //       <a href='${settingsUrl}'>Profile Settings</a>
          //       <a class='logout-button' href='/auth/logout'>Logout</a>
          //     </div>
          //   </div>
          // </div>";

          $html = "<div id='usersettings' class='cq-navigation-dropdown'>
             <a href='#' class='user-menu cq-dropdown-button'>
                 <div class='button-inside'>
                     ${avatar}
                     <div class='counter' id='nav-notification-counter'
                          v-show='notificationCount > 0'
                          v-html='notificationCount'
                          style='display:none;'>
                     </div>
                 </div>
                 <i class='fa fa-angle-down fa-2x' aria-hidden='true'></i>
             </a>
             <ul id='cqdropdown' class='cq-navigation-dropdown-content'>

                     <div class='profile-settings-header'>
                         <div class='col-sm-4 flex button-inside'>
                             ${avatar}
                         </div>
                         <div class='col-sm-8 flex'>
                             <a href='${profileUrl}' class='username'>${name}</a>
                                 <span>
                                        <img class='cq-ach' v-for='badge in badges' :src='badge.image_location'>
                                 </span>
                         </div>
                     </div>

                     <div id='notifications' v-if='notificationCount > 0'>
                         <div class='counter' id='nav-menu-notification-counter'>{ notificationCount }</div>
                         <li>
                             <a class='notification' href='/notifications' v-html='notifications[0].message'></a>
                         </li>
                     </div>
                     <li><a href='/user/settings'>Profile settings</a></li>
                     <li><a href='/auth/logout'>Log out</a></li>
             </ul>
         </div>";
          return $html;

        }

        private static function buildLoginBanner()
        {
            return "<div class='loginBox'>
                     <span class='middleAlign'></span>
                        <div class='boxes'>
                          <button type='button' class='btn button' data-toggle='modal' data-target='#loginModal' id='login'><i class='fa fa-user' aria-hidden='true'></i>
                              Login
                          </button>
                        </div>
                    </div>";
        }

        public static function build(string $logoUrl, User $user = null, string $homeUrl)
        {
            $url = $logoUrl;
            $html = "<div class='staticBanner'>
                        <div class='bannerWrap'>
                           <span class='middleAlign'></span><a href='${homeUrl}'><img class='topLogo' src='${url}'></a>";
                          if($user == null)
                          {
                              $html .= self::buildLoginBanner();
                          }else {
                              $html .= self::buildUserBanner($user);
                          }
            $html .= "</div>
                    </div>";

            return $html;
        }
    }

 ?>
