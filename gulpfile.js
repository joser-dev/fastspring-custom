'use strict';
var gulp        = require('gulp');
var sass        = require('gulp-sass');
var glog        = require('gulp-logger');
var concat      = require('gulp-concat');
var exists      = require('files-exist');
var prefix      = require('gulp-autoprefixer');
var zip         = require('gulp-zip');

gulp.task('scss', function(done) {
  return gulp.src ( './fastspring-cerberus/scss/fastspring-cerberus.scss' )
    .pipe( glog({
      before: "Starting SASS compilation (non-compressed...)",
      after:  "Completed SASS compliation..."
    }) )
    .pipe( sass().on('error', function(error) {
        sass.logError;
        done(error);
     }))
    .pipe(prefix({
       grid: "autoplace"
     }))
    .pipe( gulp.dest('./fastspring-cerberus/css/'))
});



function js_source_files() {
  var js_filenames = [
    'inview.min.js',
    'fastspring-layout-helper.js',
    'fastspring-helpers.js'
  ];
  var src_js = [];

  for (var i = 0; i < js_filenames.length; i++) {
    src_js[i] = "./fastspring-cerberus/scripts/" + js_filenames[i];
  }; 
  return src_js;
};

gulp.task('js_concat', function() {
  return gulp.src( exists(js_source_files() ) )
    .pipe(glog({
      before: "Starting to concatenate WordPress JS files..",
      after:  "Completed concatenating!"
    }))
    .pipe(concat('fastspring-cerberus-bundle.js'))
    .pipe(gulp.dest('./fastspring-cerberus/scripts/'));
});

gulp.task('compile', function() {
  var compileSrc = [
    './**/*',
    '!node_modules',
    '!./node_modules/**/*',
    '!./fastspring-cerberus-custom.zip'
  ];
  return gulp.src(compileSrc)
    .pipe(zip('fastspring-cerberus-custom.zip'))
    .pipe(gulp.dest('./'))
});

gulp.task('watch', function() {
  gulp.watch( '**/*.scss',        gulp.series([ 'scss'  ]) );
  gulp.watch( js_source_files(),  gulp.series([ 'js_concat'     ]) );
});
