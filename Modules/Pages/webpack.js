module.exports = {
    name: 'Pages',
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
    ]
}
