module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        postcss: {
            build: {
                files: [{
                    expand: true,
                    src: 'assets/**/*.css',
                    dest: 'dist',
                    cwd: '.',
                    rename: function (dst, src) {
                        return dst + '/' + src.replace('assets/', '');
                    }
                }],
                options: {
                    processors: [
                        require('autoprefixer')(),
                        require('cssnano')(),
                        require('postcss-nested')()
                    ]
                }
            },
            dev: {
                options: {
                    map: true
                },
                files: [{
                    expand: true,
                    src: 'assets/**/*.css',
                    dest: 'dist',
                    cwd: '.',
                    rename: function (dst, src) {
                        return dst + '/' + src.replace('assets/', '');
                    }
                }],
            }
        },
        watch: {
            scripts: {
                files: ['assets/**/*.css'],
                tasks: ['postcss:dev'],
                options: {
                    spawn: false,
                },
            },
        },
    });

    // Load the plugin that provides the "watch" task.
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Load the plugin that provides the "postcss" task.
    grunt.loadNpmTasks('@lodder/grunt-postcss');

    // Default task(s).
    grunt.registerTask('default', ['postcss:build']);

    // dev task(s).
    grunt.registerTask('start', ['postcss:dev', 'watch']);

};