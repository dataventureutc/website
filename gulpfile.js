const elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

var gulp = require('gulp'),
    notify = require('gulp-notify'),
    del = require('del'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps');
    sass = require('gulp-sass'),
    rename = require("gulp-rename"),
    cleanCSS = require('gulp-clean-css');

var src = 'resources';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
  mix.task('default')
});

gulp.task('default', ['clean'], function() {
  gulp.start('sources');
  gulp.start('materialize');
});

gulp.task('clean', function() {
    return del(['public/assets']);
});

gulp.task('watch', function() {
  gulp.watch([src + '/**/*', '!' + src + '/assets/sass/{materialize.scss,components/**/*}'], ['sources']);
  gulp.watch(src + '/assets/sass/{materialize.scss,components/**/*}', ['materialize']);
});

gulp.task('materialize', function() {

  del(['public/assets/css/materialize.min.css']);

  gulp.src(src + '/assets/sass/materialize.scss')
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(cleanCSS())
  .pipe(sourcemaps.write())
  .pipe(rename('materialize.min.css'))
  .pipe(gulp.dest('public/assets/css'));

});

gulp.task('sources', function() {

  gulp.src(src + '/assets/sass/style.scss')
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(cleanCSS())
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('public/assets/css'));

  // assets
  gulp.src([src + '/assets/**/*', '!' + src + '/assets/{sass,sass/**}'])
  .pipe(gulp.dest('public/assets'))

  // app
  gulp.src([src + '/app/**/*'])
  .pipe(gulp.dest('public/app'))

});
