let mix = require('laravel-mix');

/**
 * Define Vue Version
 * @type {{version: number}}
 */
const vueVersion = { version: 3 };

/**
 * Setup public path to generate assets
 */
mix.setPublicPath( 'assets' );

/**
 * Autoload jQuery
 */
mix.autoload({
    jquery: [ '$', 'window.jQuery', 'jQuery' ]
});

/**
 * Compile JavaScript
 */
mix.js('src/admin/admin.js', 'assets/js/admin.js')
    .sourceMaps( false )
    .extract( [ 'vue' ] )
    .vue( vueVersion );

mix.js('src/frontend/frontend.js', 'assets/js/frontend.js')
    .sourceMaps( false )
    .vue( vueVersion );

/**
 * Compile Sass
 */
mix.sass( 'assets/sass/admin.scss', 'assets/css/admin.css' );