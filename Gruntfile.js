module.exports = function(grunt) {

    // ===========================================================================
    // CONFIGURE GRUNT ===========================================================
    // ===========================================================================
    grunt.initConfig({

        // get the configuration info from package.json ----------------------------
        // this way we can use things like name and version (pkg.name)
        pkg: grunt.file.readJSON('package.json'),

        // compile less stylesheets to css -----------------------------------------
        less: {
            internal: {
                files: {
                    'styles/app.css': 'styles/app.less'
                }
            }
        },

        autoprefixer: {
            options: {
                browsers: ['last 3 version']
            },
            single_file: {
                src: 'styles/app.css'
            },
        },

        // configure watch to auto update ----------------
        watch: {

            // for stylesheets, watch css and less files
            // only run less and cssmin stylesheets: {
            files: ['styles/*.less'],
            tasks: ['less', 'autoprefixer']
        }
    });

    // ============= // CREATE TASKS ========== //
    grunt.registerTask('compile', ['less', 'autoprefixer']);

    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-autoprefixer');

};