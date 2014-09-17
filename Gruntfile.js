'use strict';

module.exports = function(grunt) {

  var theme = 'designderena';
  var folder = (theme + '.zip');

  // Load all tasks
  require('load-grunt-tasks')(grunt);
  // Show elapsed time
  require('time-grunt')(grunt);

  var jsFileList = [
    'assets/vendor/bootstrap/js/transition.js',
    //'assets/vendor/bootstrap/js/alert.js',
    'assets/vendor/bootstrap/js/button.js',
    //'assets/vendor/bootstrap/js/carousel.js',
    'assets/vendor/bootstrap/js/collapse.js',
    'assets/vendor/bootstrap/js/dropdown.js',
    'assets/vendor/bootstrap/js/modal.js',
    'assets/vendor/bootstrap/js/tooltip.js',
    'assets/vendor/bootstrap/js/popover.js',
    //'assets/vendor/bootstrap/js/scrollspy.js',
    //'assets/vendor/bootstrap/js/tab.js',
    'assets/vendor/bootstrap/js/affix.js',
    'assets/js/plugins/*.js',
    'assets/js/_*.js'
  ];

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.js',
        '!assets/**/*.min.*'
      ]
    },
    less: {
      dev: {
        files: {
          'assets/css/main.css': [
            'assets/less/main.less'
          ]
        },
        options: {
          compress: false,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: true,
          sourceMapFilename: 'assets/css/main.css.map',
          sourceMapRootpath: '/app/themes/roots/'
        }
      },
      build: {
        files: {
          'assets/css/main.min.css': [
            'assets/less/main.less'
          ]
        },
        options: {
          compress: true
        }
      }
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [jsFileList],
        dest: 'assets/js/scripts.js',
      },
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [jsFileList]
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
      },
      dev: {
        options: {
          map: {
            prev: 'assets/css/'
          }
        },
        src: 'assets/css/main.css'
      },
      build: {
        src: 'assets/css/main.min.css'
      }
    },
    compress: {
      'roots-zip': {
        options: {
          mode: 'zip',
          archive: 'dist/' + folder,
          //archive: 'dist/'(theme)'.zip',
          level: 9
        },
        expand: true,
        files: [
          {src: ['admin/**'], dest: ''},
          //{expand: true, cwd: 'assets/', src: ['**'], dest: 'assets/'}, // makes all src relative to cwd
          {flatten: true, src: ['assets/css/*main.min.css'], dest: '', filter: 'isFile'},
          {flatten: true, src: ['assets/css/*editor-style.css'], dest: '', filter: 'isFile'},
          {flatten: true, src: ['assets/css/*login-style.css'], dest: '', filter: 'isFile'},
          {flatten: true, src: ['assets/css/*admin-style.css'], dest: '', filter: 'isFile'},
          {flatten: true, src: ['assets/fonts/*'], dest: ''},
          {flatten: true, src: ['assets/img/**'], dest: ''},
          {flatten: true, src: ['assets/js/vendor/*'], dest: ''},
          {flatten: true, src: ['assets/js/*scripts.min.js'], dest: ''},
          {flatten: true, src: ['assets/vendor/dist/*jquery.min.js'], dest: '', filter: 'isFile'},
          //{flatten: true, src: ['assets/vendor/**'], dest: ''},
          {src: ['lang/*'], dest: ''},
          {src: ['lib/*'], dest: ''},
          {src: ['templates/*'], dest: ''},
          {expand: true, src: ['*.php'], dest: ''},
          {expand: true, src: ['*.css'], dest: ''},
          {expand: true, src: ['*.jpg'], dest: ''},
        ],
      },
    },
    modernizr: {
      build: {
        devFile: 'assets/vendor/modernizr/modernizr.js',
        outputFile: 'assets/js/vendor/modernizr.min.js',
        files: {
          'src': [
            ['assets/js/scripts.min.js'],
            ['assets/css/main.min.css']
          ]
        },
        uglify: true,
        parseFiles: true
      }
    },
    version: {
      default: {
        options: {
          format: true,
          length: 32,
          manifest: 'assets/manifest.json',
          querystring: {
            style: 'roots_css',
            script: 'roots_js'
          }
        },
        files: {
          'lib/scripts.php': 'assets/{css,js}/{main,scripts}.min.{css,js}'
        }
      }
    },
    watch: {
      less: {
        files: [
          'assets/less/*.less',
          'assets/less/**/*.less'
        ],
        tasks: ['less:dev', 'autoprefixer:dev']
      },
      js: {
        files: [
          jsFileList,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'assets/css/main.css',
          'assets/js/scripts.js',
          'templates/*.php',
          '*.php'
        ]
      }
    }
  });

  // Register tasks
  grunt.registerTask('default', [
    'dev'
  ]);
  grunt.registerTask('dev', [
    'jshint',
    'less:dev',
    'autoprefixer:dev',
    'concat'
  ]);
  grunt.registerTask('build', [
    'jshint',
    'less:build',
    'autoprefixer:build',
    'uglify',
    'modernizr',
    'version'
  ]);
  // Package creation task.
  grunt.registerTask('dist', 'Create archives for testing purposes.', [
    'build',
    'compress:roots-zip',
    //'compress:roots-tarball'
  ]);
};
