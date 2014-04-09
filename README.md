
Car Talk Mobile Site
====================

A mobile companion site to <http://wwww.cartalk.com>.  This site consumes an
API exposed by the main site and displays it in a jQuery Mobile wrapper.

Environment-specific configuration files are in `application/config`.

Works with `Memcached` if it is available and is configured in `settings.php`.

## Build CSS & JS

    $ php application/scripts/build-assets.php
