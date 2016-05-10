module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    /**
     * Watch task 
     */  
    sass: {                              // Task 
        dev: {                            // Target
            options: {                       // Target options
                style: 'expanded',
                sourcemap: 'none',
            },
            files: {                         // Dictionary of files
                'assets/stylesheets/css/global.css': 'assets/stylesheets/global/global.scss'
                       // 'destination': 'source'
            }
        },
        dist: {                            // Target
            options: {                       // Target options
                style: 'compressed',
                sourcemap: 'none',
            }, 
            files: {                         // Dictionary of files
                'assets/stylesheets/css/global.min.css': 'assets/stylesheets/global/global.scss'       // 'destination': 'source'
            }
        }
    },

    
  
    /**
     * Watch task 
     */
    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['sass'],
      },
    },

  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-sass');

   

  grunt.loadNpmTasks('grunt-contrib-watch');



  // Default task(s).
  grunt.registerTask('default',['watch']);

};