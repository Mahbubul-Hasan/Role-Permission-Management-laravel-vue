const mix = require("laravel-mix");

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
*/

mix.js(
    [
        "resources/js/app.js",
        "public/assets/backend/modules/nicescroll/jquery.nicescroll.min.js",
        "public/assets/backend/js/stisla.js",
        "public/assets/backend/js/scripts.js",
        "public/assets/backend/js/custom.js"
    ],
    "public/js"
)
    .vue()
    .sass("resources/sass/app.scss", "public/css")
    .styles(
        [
            "public/assets/backend/css/style.css",
            "public/assets/backend/css/components.css",
            "public/assets/backend/css/custom.css"
        ],
        "public/css/all.css"
    );
