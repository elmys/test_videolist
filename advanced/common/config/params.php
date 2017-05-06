<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'videohosts' => [
        'youtube' => [
            'mask' => '/https:\/\/www\.youtube\.com\/watch\?v=([a-zA-Z0-9]+)/',
            'code' => '<iframe width="640" height="360" src="https://www.youtube.com/embed/%videoId%" frameborder="0" allowfullscreen></iframe>',
        ],
        'vimeo' => [
            'mask' => '/https:\/\/vimeo\.com\/([0-9]+)/',
            'code' => '<iframe src="https://player.vimeo.com/video/%videoId%" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
        ],
        'facebook' => [
            'mask' => '/https:\/\/www\.facebook\.com\/([a-zA-Z0-9_\.]+\/videos\/[0-9]+\/)/',
            'code' => '<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, \'script\', \'facebook-jssdk\'));</script>
  <div class="fb-video" data-href="%videoId%" data-width="640" data-show-text="false">
    <div class="fb-xfbml-parse-ignore">
      <blockquote cite="https://www.facebook.com/%videoId%"></blockquote>
    </div>
  </div>',
        ],
        'vkontakte' => [
            'mask' => '/https:\/\/vk\.com\/(video[0-9]+_[0-9]+)/',
            'code' => '<iframe src="//vk.com/video_ext.php?oid=%videoId%&id=%videoId1%&hash=0&hd=1" width="640" height="360" frameborder="0" allowfullscreen></iframe>',
        ],
        'coub' => [
            'mask' => '/http:\/\/coub.com\/view\/([a-z0-9]+)/',
            'code' => '<iframe src="//coub.com/embed/%videoId%?muted=false&autostart=false&originalSize=false&startWithHD=false" allowfullscreen="true" frameborder="0" width="640" height="360"></iframe>',
        ],
    ],
];
