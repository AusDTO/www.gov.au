module.exports = function(grunt) {

  // 1. All configuration goes here
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),



    // merge all JS into one file
    concat: {
      dist: {
        src: [
        'bower_components/jquery-legacy/dist/jquery.min.js',  // Just one specific file
        'bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',  // Just one specific file
        'js/src/*.js' // ALL .js files in the folder (note, order by alpha!)
        ],
        dest: 'js/combined.js',
      }
    },
    // then minify it
    uglify: {
      build: {
        src: 'js/combined.js',
        dest: 'js/combined.min.js'
      }
    },




    // Image optimisation
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'img/',
          src: ['*.{png,jpg,gif}'],
          dest: 'img/'
        }]
      }
    },
    // if this errors try:
    // npm uninstall grunt-contrib-imagemin && npm install grunt-contrib-imagemin




    // Cache buster
    // gets messy and kills our link to img, if going to use need to exclude it
    // cacheBust: {
    //   options: {
    //     encoding: 'utf8',
    //     algorithm: 'md5',
    //     length: 8
    //   },
    //   assets: {
    //     files: [{
    //       src: ['*.html', '*.php']
    //     }]
    //   }
    // },





    // Run a shell script
    // currently used to tidy up OS temp files
    run: {
      tool: {
        cmd: '/var/www/cleanup.sh',
      }
    },




    // Style Stuff
    // SASS replaced by Compass..
    // sass: {
    //   dist: {
    //     options: {
    //       style: 'compressed'
    //     },
    //     files: {
    //       'style.css': 'scss/style.scss'
    //     }
    //   }
    // },
    compass: {
      dist: {
        options: {
          sassDir: 'scss',
          cssDir: 'css',
          outputStyle: 'compressed',
          environment: 'production'
        }
      }
    },
    // autoprefixer: {
    //   // dist: {
    //   //   files: {
    //   //     'css/style.css': 'css/style.prefixed.css'
    //   //   }
    //   // }
    //   single_file: {
    //     options: {
    //       // Target-specific options go here.
    //     },
    //     src: 'css/style.css',
    //     dest: 'css/style.prefixed.css'
    //   },
    // },
    // cull unused css
    uncss: {
      dist: {
        options: {
          report: 'gzip'
        },
        files: {
          'css/style.un.css':[
          '/index.html',
          'http://www.gov.dev/',
          'http://www.gov.dev/about',
          'http://www.gov.dev/copyright',
          'http://www.gov.dev/privacy',
          'http://www.gov.dev/disclaimer',
          'http://www.gov.dev/404'
          ]
        }
      }
    },
    // minify uncss's output
    cssmin: {
      target: {
        options: {
          // ignore       : ['#added_at_runtime', /test\-[0-9]+/],
          stylesheets           : ['css/style.un.css'],
          keepSpecialComments   : 0,    // for keeping all (default), 1 for keeping first one only (WordPress etc), 0 for removing all
          ignoreSheets          : [/fonts.googleapis/]
        },
        files: {
          // 'output.css': ['input1.css', 'input2.css']
          'css/style.min.css': ['css/style.un.css']
        }
      }
    },




    // Minimize SVG files (none in this project, but good to have setup)
    svgmin: {
      options: {
        plugins: [
        { removeViewBox: false },
        { removeUselessStrokeAndFill: false }
        ]
      },
      dist: {
        expand: true,
        cwd: 'img/',
        src: ['*.svg'],
        dest: 'img/',
      }
    },





    // CasperJS tests to run locally
    casperjs: {
      // options: {
      //   async: {
      //     parallel: true  //defaults to false
      //   }
      // },
      files: ['tests/casperjs/**/*.js']
    },








    // This stuff will run when you run 'grunt watch' (which is set to run in background on new devBash setups)
    watch: {
      configFiles: {
        files: [ 'Gruntfile.js', 'config/*.js' ],
        options: {
          reload: true
        }
      },

      options: {
        livereload: true,
      },

      allFiles: {
        files: ['*'],
        tasks: ['run'],
        options: {
          spawn: false,
        },
      },

      images: {
        files: ['**/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
        options: {
          spawn: false,
        },
      },
      svg: {
        files: ['img/*.svg'],
        tasks: ['svgmin'],
        options: {
          spawn: false,
        },
      },

      scripts: {
        files: ['js/src/*.js'],
        tasks: ['concat', 'uglify'],
        options: {
          spawn: false,
        },
      },

      sass: {
        files: ['scss/*.scss'],
        // tasks: ['compass'],
        tasks: ['compass','uncss','cssmin'],
        options: {
          spawn: false,
        }
      },
      // these are done above
      // stylesUn: {
      //   files: ['css/style.css'],
      //   tasks: ['uncss']
      // }
      // stylesMin: {
      //   files: ['css/style.un.css'],
      //   tasks: ['cssmin']
      // }
    },

  });

  // 3. Where we tell Grunt we plan to use this plug-in.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  // grunt.loadNpmTasks('grunt-contrib-sass'); // replaced by compass (with  is sass and then some)
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  // grunt.loadNpmTasks('grunt-cache-bust');
  grunt.loadNpmTasks('grunt-run');
  grunt.loadNpmTasks('grunt-uncss');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-svgmin');
  grunt.loadNpmTasks('grunt-casperjs');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
  // grunt.registerTask('default', ['concat']);
  // grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass', 'cacheBust']);
  // grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'compass', 'autoprefixer', 'run', 'uncss', 'svgmin', 'cssmin']);
  grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'compass', 'run', 'uncss', 'svgmin', 'cssmin', 'casperjs']);

};
