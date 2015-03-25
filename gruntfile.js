module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dev: {
                options: {
                    quiet: true,
                    style: 'expanded'
                },
                files: {
                    'toaster.css':'scss/toaster.scss',
                }
            }
        },

        // uglify: {
        //     my_target: {
        //         files: {
        //             'js/minified/report-header.min.js': ['bower_components/swiper/dist/js/swiper.jquery.js']
        //         }
        //     }
        // },

    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', ['sass:dev']);
}
