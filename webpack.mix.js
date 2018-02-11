const mix = require('laravel-mix');
const fs = require('fs');
const path = require('path');
const StringReplacePlugin = require('string-replace-webpack-plugin');
const webpack = require('webpack');
/**
 * Paths to module directories
 *
 * @type {[string,string]}
 */
const module_directories = [
    'modules',
    'workbench/Collejo/App/Module',
    'vendor/CodeBreez/collejo-app/modules'
];

const publicDir = 'public';
const collejoStorageDir = 'storage/collejo';
const resourcesDir = 'resources';

/**
 * Returns a list of directories from the given path
 *
 * @param p
 * @returns {*}
 */
const dirs = (p) => {
    if (!fs.existsSync(p)) {
        return [];
    }
    return fs.readdirSync(p).filter(f => fs.statSync(path.join(p, f)).isDirectory());
};

/**
 * Returns a list of files from the given path
 *
 * @param p
 * @returns {*}
 */
const files = (p) => {
    if(!fs.existsSync(p)){
        return [];
    }
    return fs.readdirSync(p).filter(f => !fs.statSync(path.join(p, f)).isDirectory() && f.charAt(0) !== '_')
};

/**
 * Filter and map the modules paths in to watchable objects
 *
 * @type {Array}
 */
const fileMap = module_directories.map(directory => {

    return dirs(directory).filter(module => {

        return fs.lstatSync(`${directory}/${module}`).isDirectory();

    }).map(module => {

		const modulePath = `${directory}/${module}`;

		if (fs.lstatSync(modulePath).isDirectory()) {

			const jsDir = `${modulePath}/resources/assets/js`;
			const sassDir = `${modulePath}/resources/assets/sass`;

			return {
				js: files(jsDir).map(file => {
					return {
						src: `${jsDir}/${file}`,
                        dest: `${publicDir}/assets/${module.toLowerCase()}/js/${path.basename(file, '.js')}.js`
					}
				}),
				scss: files(sassDir).map(file => {
					return {
						src: `${sassDir}/${file}`,
                        dest: `${publicDir}/assets/${module.toLowerCase()}/css/${path.basename(file, '.scss')}.css`
					}
				})
			}
		}
	})
});

fileMap.push([
    {
        js: files(`${resourcesDir}/assets/js`).map(file => {
            return {
                src: `${resourcesDir}/assets/js/${file}`,
                dest: `${publicDir}/js/${path.basename(file, '.js')}.js`
            }
        }),
        scss: files(`${resourcesDir}/assets/sass`).map(file => {
            return {
                src: `${resourcesDir}/assets/sass/${file}`,
                dest: `${publicDir}/css/${path.basename(file, '.scss')}.css`
            }
        })
    }
]);

/**
 * Webpack configuration
 *
 * @type {{module: {rules: [null]}, plugins: [null,null]}}
 */
const webpackConfig = {
    module: {
        rules: [
            {
                test: /\.js$/,
                loader: StringReplacePlugin.replace({
                    replacements: [
                        {
                            pattern: /<<ROUTES_OBJECT>>/ig,
                            replacement: (match, p1, offset, string) => {
                                return fs.readFileSync(`${collejoStorageDir}/routes.json`, 'utf8');
                            }
                        }
                    ]
                })
            }
        ]
    },
    plugins: [
        new StringReplacePlugin(),
        new webpack.optimize.CommonsChunkPlugin({
            name: 'commons',
            filename: 'public/assets/base/js/commons.js',
        })
    ]
};

/**
 * Copy language files
 */
mix.webpackConfig(webpackConfig).copy(`${collejoStorageDir}/trans`, `${publicDir}/js/trans`).version();

/**
 * Laravel Mix
 */
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
