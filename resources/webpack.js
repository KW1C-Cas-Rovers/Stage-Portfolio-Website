module.exports = {
    assets: [
        {
            type: 'js',
            src: 'resources/assets/js/app.js',
            dest: 'public/assets/js'
        },
        {
            type: 'sass',
            src: 'resources/assets/sass/app.scss',
            dest: 'public/assets/css'
        },
        {
            type: 'copy',
            src: 'resources/assets/media',
            dest: 'public/assets/media'
        }
    ]
}
