const mix = require('laravel-mix');
const glob = require('glob');

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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/script.js', 'public/js')

glob.sync('resources/sass/*.scss').map(function(file) {
  mix.sass(file, 'public/css')
    .options({
      processCssUrls: false
    });
});

mix.webpackConfig({
  module: {
    rules: [
      { // Allow .scss files imported glob
        test: /\.scss/,
        loader: 'import-glob-loader'
      }
    ]
  }
})