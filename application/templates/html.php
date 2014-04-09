<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php print $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <!-- Home screen icon  Mathias Bynens mathiasbynens.be/notes/touch-icons -->
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
    <!-- For nokia devices and desktop browsers : -->
    <link rel="shortcut icon" href="/favicon.ico" />
    
    <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
    <meta http-equiv="cleartype" content="on">

    <?php if (ENVIRONMENT && ENVIRONMENT === 'development'): ?>
      <!-- jQuery Mobile CSS bits -->
      <link rel="stylesheet" href="/css/jquery-mobile-flat-ui-theme/generated/jquery.mobile.flatui.css" />
      <!-- Custom css -->
      <link rel="stylesheet" href="/css/custom.css" />
      <!-- Javascript includes -->
      <script src="/js/jquery-1.9.1.js"></script>
      <script src="/js/jquery.mobile-1.3.1.js"></script>
      <script src="/js/jquery.cookie.js"></script>
      <script src="/js/application.js"></script>
    <?php else: ?>
      <?php $build_version = "1382036104"; ?>
      <link rel="stylesheet" href="/css/built.min.css?<?php print $build_version; ?>" />
      <script src="/js/built.min.js?<?php print $build_version; ?>"></script>
    <?php endif; ?>

    <?php if (DISQUS_PUBLIC_KEY && DISQUS_PUBLIC_KEY !== ''): ?>
      <script type="text/javascript">
        DISQUS_PUBLIC_KEY = '<?php print DISQUS_PUBLIC_KEY; ?>';
      </script>
    <?php endif; ?>

    <!-- Startup Images for iDevices -->
    <script>(function(){var a;if(navigator.platform==="iPad"){a=window.orientation!==90||window.orientation===-90?"/startup-tablet-landscape.png":"/startup-tablet-portrait.png"}else{a=window.devicePixelRatio===2?"/startup-retina.png":"/startup.png"}document.write('<link rel="apple-touch-startup-image" href="'+a+'"/>')})()</script>
    <!-- The script prevents links from opening in mobile safari. https://gist.github.com/1042026 -->
    <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
  </head>
  <body>
    <div data-role="page" id="<?php print $page_id; ?>" data-external-page="false">

      <div id="panel" class="panel" data-role="panel" data-swipe-close="false" data-position-fixed="true">
        <?php print render('menu.php', array('full_site_url' => $full_site_url)); ?>
      </div>

      <?php print $content; ?>

    </div>
  </body>
</html>
