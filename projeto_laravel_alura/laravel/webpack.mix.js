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

mix
// Sass
.sass(
    "resources/sass/app.scss",
    "public/css/app.css"
)
// Scripts
.scripts(
    "node_modules/jquery/dist/jquery.js",
    "public/js/jquery.js"
)
.scripts(
    "node_modules/bootstrap/dist/js/bootstrap.js",
    "public/js/bootstrap.js"
)
.scripts(
    "node_modules/bootstrap/dist/js/bootstrap.min.js",
    "public/js/bootstrap.min.js"
)
.scripts(
    "node_modules/bootstrap/dist/js/bootstrap.bundle.js",
    "public/js/bootstrap.bundle.js"
);
