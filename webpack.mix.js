const mix = require('laravel-mix');
const fs = require('fs');
const path = require('path');
const StringReplacePlugin = require("string-replace-webpack-plugin");

const dirs = (p) => {
	if(!fs.existsSync(p)){
		return [];
	}
	return fs.readdirSync(p).filter(f => fs.statSync(path.join(p, f)).isDirectory());
};

const files = (p) => {
    if(!fs.existsSync(p)){
        return [];
    }
    return fs.readdirSync(p).filter(f => !fs.statSync(path.join(p, f)).isDirectory() && f.charAt(0) !== '_')
};

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

const module_directories = [
	'modules',
	'workbench/Collejo/App/Modules',
	//'vendor/CodeBreez/collejo-app/modules'
];

const webpackConfig = {
	module: {
		rules: [
			{
				test:/\.js$/,
				loader: StringReplacePlugin.replace({
					replacements: [
						{
							pattern: /<<ROUTES_OBJECT>>/ig,
							replacement:  (match, p1, offset, string) => {
								return fs.readFileSync('storage/collejo/routes.json', 'utf8');
							}
						}
					]})
			}
		]
	},
	plugins: [
		new StringReplacePlugin()
	]
};

const fileMap = module_directories.map(directory => {

	return dirs(directory).map(module => {

		const modulePath = `${directory}/${module}`;

		if (fs.lstatSync(modulePath).isDirectory()) {

			const jsDir = `${modulePath}/resources/assets/js`;
			const sassDir = `${modulePath}/resources/assets/sass`;

			return {
				js: files(jsDir).map(file => {
					return {
						src: `${jsDir}/${file}`,
						dest: `public/assets/${module.toLowerCase()}/js/${path.basename(file, '.js')}.js`
					}
				}),
				scss: files(sassDir).map(file => {
					return {
						src: `${sassDir}/${file}`,
						dest: `public/assets/${module.toLowerCase()}/css/${path.basename(file, '.scss')}.css`
					}
				})
			}
		}
	})
});

mix.webpackConfig(webpackConfig).copy('storage/collejo/trans', 'public/js/trans').version();

fileMap.forEach(dir => {

	dir.forEach(module => {

		module.js.forEach(file => {

			mix.webpackConfig(webpackConfig).js(file.src, file.dest).version();
		});

		module.scss.forEach(file => {

			mix.webpackConfig(webpackConfig).sass(file.src, file.dest).version();
		})
	})
});
