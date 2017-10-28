'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

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

gulp.task('default', [ 'sass', 'sass:watch' ]);
