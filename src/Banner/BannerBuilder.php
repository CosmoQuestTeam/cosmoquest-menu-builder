<?php
    namespace CosmoQuestMenuBuilder\Banner;
    use CosmoQuestMenuBuilder\User;
    /**
     *
     */
    class Banner
    {
        private $user = null;
        private $logoUrl = "";

        function __construct(string $logoURL, User $user = null)
        {
            $this->user = $user;
            $this->logoUrl = $logoUrl;
        }

        private static function buildUserBanner()
        {
            $profileUrl = $this->user->profileUrl();
            $settingsUrl = $this->user->settingsUrl();
            $avatar = $this->user->avatar();
            $name = $this->user->name();

            $html = `<div class="loginBox">
              <span class="middleAlign"></span>
              <div class="boxes">
              <div class="avatar-holder">
                ${avatar}
              </div>
              <div style="float: right;">
                <a href="${profileUrl}">${name}</a>
                <a href="${settingsUrl}">Profile Settings</a>
                <a class="logout-button" href="/auth/logout">Logout</a>
              </div>
            </div>
          </div>`;
          return $html;

        }

        private static function buildLoginBanner()
        {
            return `<div class="loginBox">
                     <span class="middleAlign"></span>
                        <div class="boxes">
                          <button type="button" class="btn button" data-toggle="modal" data-target="#loginModal" id="login"><i class="fa fa-user" aria-hidden="true"></i>
                              Login
                          </button>
                        </div>
                    </div>`;
        }

        public static function build()
        {
            $url = $this->logoUrl;
            $html = `<div class="staticBanner">
                        <div class="bannerWrap">
                           <span class="middleAlign"></span><a href="/"><img class="topLogo" src="${url}"></a>`;
                          if($this->user == null)
                          {
                              $html .= self::buildLoginBanner();
                          }else {
                              $html .= self::buildUserBanner();
                          }
            $html .= `</div>
                    </div>`;

            return $html;
        }
    }

 ?>
