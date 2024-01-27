
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

const mix = require('laravel-mix');
const glob = require('glob');
const path = require('path')

const mixConfig = require('./resources/webpack.js');

// Process general assets
const allEntries = [];

function logEntries(entries) {
    console.log('General directories getting compiled:');
    console.table(entries);
}

mixConfig.assets.forEach(asset => {
    const src = asset.src;
    const dest = asset.dest;

    allEntries.push({
        type: asset.type,
        src: src,
        dest: dest,
    });

    switch (asset.type) {
        case 'js':
            mix.js(src, dest);
            break;

        case 'sass':
            mix.sass(src, dest).options({
                processCssUrls: false
            });
            break;

        case 'copy':
            mix.copy(src, dest);
            break;

        case 'css':
            mix.css(src, dest);
            break;

        case 'ts':
            mix.ts(src, dest);
            break;

        case 'less':
            mix.less(src, dest, {
                strictMath: true,
            });
            break;
    }
});

logEntries(allEntries);

// Module compile
const mixConfigModules = glob.sync('Modules/*/webpack.js');

const modulePaths = mixConfigModules.map(moduleConfigPath => {
    const moduleName = path.basename(path.dirname(moduleConfigPath));
    const absolutPath = path.resolve(moduleConfigPath);

    return {
        moduleName: moduleName,
        path: absolutPath,
    };
});

console.log('Module directories are getting compiled:');
console.table(modulePaths);

mixConfigModules.forEach(moduleConfigPath => {

    const absolutPath = path.resolve(moduleConfigPath)
    const moduleConfig = require(absolutPath);

    if (moduleConfig) {
        const mainName = moduleConfig.name;

        moduleConfig.modules.forEach(module => {
            const moduleName = module.name;
            const name = moduleName || mainName;
            let src = module.src;
            let dest = module.dest;

            src = src.replace(/{{name}}/g, name);
            dest = dest.replace(/{{name}}/g, name);

            switch (module.type) {
                case 'js':
                    mix.js(src, dest);
                    break;

                case 'sass':
                    mix.sass(src, dest);
                    break;

                case 'copy':
                    mix.copy(src, dest);
                    break;

                case 'css':
                    mix.css(src, dest);
                    break;

                case 'ts':
                    mix.ts(src, dest);
                    break;

                case 'less':
                    mix.less(src, dest, {
                        strictMath: true,
                    });
                    break;
            }
        })
    }
});

mix.version().disableNotifications();
