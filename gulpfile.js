'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var minify = require('gulp-minify');

var styles_src = './resources/assets/sass';
var styles_dist = './public/css';

gulp.task('sass', function () {
  return gulp.src(styles_src + '/main.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(styles_dist));
});

gulp.task('sass:watch', function () {
  gulp.watch(styles_src + '/**/*.scss', ['sass']);
});

gulp.task('js', function() {
  return gulp.src([
    './node_modules/jquery/dist/jquery.js',
    './node_modules/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js',
    './node_modules/bootstrap-sass/assets/javascripts/bootstrap/collapse.js'
  ])
  .pipe(concat('app.js'))
  .pipe(minify({
    ext:{
      min:'.min.js'
    },
    preserveComments: 'some'
  }))
  .pipe(gulp.dest('./public/js'));
});

gulp.task('default', [ 'js', 'sass', 'sass:watch' ]);
gulp.task('build', ['js', 'sass']);
