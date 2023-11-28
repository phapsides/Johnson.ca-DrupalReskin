'use strict';

// # Globbing
// for performance reasons we're only matching one level down:
// 'test/spec/{,*/}*.js'
// use this if you want to recursively match all subfolders:
// 'test/spec/**/*.js'

module.exports = function (grunt) {

    // Load grunt tasks automatically
    require('load-grunt-tasks')(grunt);

    // Time how long tasks take. Can help when optimizing build times
    require('time-grunt')(grunt);

    // Configurable paths
    var config = {
        app: '',
        src: 'src',
        template_dir: 'themes/default',
    };

    // Define the configuration for all the tasks
    grunt.initConfig({

        // Project settings
        config: config,

        // Watches files for changes and runs tasks based on the changed files
        watch: {
            html:{
            files: ['<%= config.src %>/{,*/}*.html'],
            tasks: ['concat']
            },
            gruntfile: {
                files: ['Gruntfile.js']
            },
            livereload: {
                options: {
                    livereload: '<%= connect.options.livereload %>'
                },
                files: [
                    '<%= config.app %>/{,*/}*.html',
                    '.tmp/css/{,*/}*.css',
                    '<%= config.app %>/img/{,*/}*'
                ]
            },
            
            //js:{
            //    files: ['<%= config.src %>/js/{,*/}*.js'],
            //    tasks: ['copy:js']
            //},
            less:{
                files: ['<%= config.template_dir %>/less/{,*/}*.less'],
                tasks: ['less']
            }
        },

        // The actual grunt server settings
        connect: {
            options: {
                port: 8080,
                open: true,
                livereload: 35718,
                // Change this to '0.0.0.0' to access the server from outside
                hostname: 'localhost'
            },
            livereload: {
                options: {
                    middleware: function(connect) {
                        return [
                            connect.static('.tmp'),
                            connect.static(__dirname) // we want to look at the root for our server.
                        ];
                    }
                }
            }
        },

        concat:{
          target1: {
            files: {
               "<%= config.app %>home.html": ["<%= config.src %>/doctype.html", "<%= config.src %>/header.html", "<%= config.src %>/hero.html", "<%= config.src %>/wrapper_one.html", "<%= config.src %>/wrapper_two.html", "<%= config.src %>/wrapper_three.html", "<%= config.src %>/footer.html"],
               "<%= config.app %>product.html": ["<%= config.src %>/doctype.html", "<%= config.src %>/header.html", "<%= config.src %>/seccondaryNav.html", "<%= config.src %>/heroProd.html", "<%= config.src %>/product.html", "<%= config.src %>/footer.html"],
               "<%= config.app %>privacy.html": ["<%= config.src %>/doctype.html", "<%= config.src %>/header.html", "<%= config.src %>/privacy.html", "<%= config.src %>/footer.html"],
               "<%= config.app %>contactUs.html": ["<%= config.src %>/doctype.html", "<%= config.src %>/header.html", "<%= config.src %>/contact.html", "<%= config.src %>/footer.html"],
            }
          }
        },

        /*
        copy: {
            js: {
                cwd: '<%= config.src %>',
                src: 'js/*',
                dest: '<%= config.app %>',
                expand: true
            },
        },
        */
        less: {
            dist: {
                files: {
                    '<%= config.template_dir %>/css/style.css': '<%= config.template_dir %>/less/style.less'
                }
            }
        },

    });


    grunt.registerTask('serve', function (target) {
         grunt.task.run([
            'connect:livereload',
            'concat',
            'less',
            'watch'
        ]);

    });

    grunt.registerTask('server', function (target) {
        grunt.log.warn('The `server` task has been deprecated. Use `grunt serve` to start a server.');
        grunt.task.run([target ? ('serve:' + target) : 'serve']);
    });

    grunt.registerTask('default', [
        'serve'
    ]);
};
