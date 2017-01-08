const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
	mix.sass('app.scss')
		.scripts(['ajax.js'], 'public/js/ajax.js')
	    .scripts([
			'libs/jquery-3.1.1.min.js',
			'libs/bootstrap.min.js',			
			'libs/sweetalert-dev.js',
			'libs/lity.js'
		], './public/js/libs.js')
	    .styles([
			'libs/sweetalert.css',
			'libs/lity.css'
	    ], './public/css/libs.css');
});
