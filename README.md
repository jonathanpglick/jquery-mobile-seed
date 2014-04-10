Mobile Site Skeleton
====================

**Mobile Site Skeleton** is a starter project for creating data-driven Mobile
websites. Its PHP backend allows cross-domain API consumption and the
templating system reduces the code duplication that is common in jQuery Mobile
projects.  It follows a simplified MVC structure with an `API` class
representing the model and routing via the [GluePHP](http://gluephp.com/)
library. The front-end uses jQuery Mobile for smooth app-like navigation and
ready-to-use mobile widgets.

It was developed as a way to provide mobile experiences for desktop sites that
are too complex or heavy to re-skin to make responsive.

## Features

- **jQuery Mobile** for ready-to-use mobile UI and widgets.
- **jQuery Mobile Flat UI Theme** provides a better baseline for customizing jQuery Mobile styles.
- **Memcached** to speed up page loads after data is pulled from an API.
- **Google Analytics** page tracking, even when pages are loaded via AJAX.
- **Disqus** comments and comment counts.


## Installation

Clone the repository and download/update the submodules with:

    $ git submodule update --init --recursive

Copy of one of the settings files in `/application/config/` to
`/application/config/settings.php`.

Run your web server from the `/public` directory and have it rewrite non-static
requests to `/public/index.php`.  An `.htacess` file is provided that will do
this for Apache.


## Configuration

The following settings are available in the `/config/settings.php` file:

- `ENVIRONMENT`: Used to configure the app based on the current environment.
  Any value but 'development' will reference the built version of the CSS & JS.
- `SITE_TITLE`: The site title.
- `API_URL`: The base URL to use for the API.  Often the full site that this is
  app is providing a mobile view of.
- `DISQUS_PUBLIC_KEY`: The public key of a disqus account.  This is used to
  display comment counts.
- `GOOGLE_ANALYTICS_ACCOUNT`: The Google Analytics key to use to track page
  views.
- `$memcached_server`: If set, the app will try to connect to this Memcached
  server before running.


## Structure

### `/public`

Contains web public code including the jQuery Mobile library and theme.  The
most significant files are:

- `/public/js/application.js`: Contains code to customize and add functionality
  to jQuery Mobile.
- `/public/css/custom.less`: Custom styles for the project go here and should
  be rendered into css for inclusion in the page.

### `/application/includes`

This directory contains the app-specific backend code for a project.

Routes are defined in `Routes.php`.  The routes are regular expressions that
are matched against the request path.  When a matching route is found, the
associated controller is instantiated and the class method corresponding to the
request method ('GET', 'POST', etc.) is called (`$myController->GET($params)`).
Data captured from the route regex, including named captures, are passed as an
array to the controller method. See the [GluePHP
documentation](http://gluephp.com/documentation.html) for more information.

`Controllers.php` contains the controller classes for this project.  The
controller methods should call the `self::send()` method to render data into
templates and return it to the browser.

The `API.php` file contains a singleton class of the same name that does the
work of retrieving and caching data.  This singleton should be used by
controller methods to get data for a given request.

### `/application/lib`

External libraries and application base classes are in here.

### `/application/scripts`

Command-line scripts pertaining to this project.

### `/application/templates`

Put application templates to be rendered by controllers here.


## Building Assets

This project includes a script that uses the YUI Compressor to concatenate and
minify the CSS and Javascript used.

    $ php application/scripts/build-assets.php

If additional CSS or Javascript files are added to the `index.php` file,
they'll also have to be added in the `build-assets.php` file to be included.
The `build-assets.php` script also updates a cache-busting value in the
`html.php` template so newly deployed code is always reloaded from the server.


## Libraries and Dependencies

- GluePHP
- jQuery Mobile 1.3.1
- jQuery Mobile Flat UI Theme
- YUI Compressor
