module.exports = {
    name: 'Users',
    modules: [
        {
            type: 'js',
            src: 'Modules/{{name}}/resources/assets/js/app.js',
            dest: 'public/Modules/{{name}}/js'
        },
        {
            type: 'sass',
            src: 'Modules/{{name}}/resources/assets/sass/app.scss',
            dest: 'public/Modules/{{name}}/css'
        },
        {
            type: 'copy',
            src: 'Modules/{{name}}/resources/assets/media',
            dest: 'public/Modules/{{name}}/media'
        },
    ]
}
