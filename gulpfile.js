var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var concat = require('gulp-concat');

gulp.task('scss', function() {
  return gulp.src('./assets/scss/main.scss')
    .pipe(sass())
    .pipe(rename('compiled.css'))
    .pipe(gulp.dest('./assets/css'));
});

gulp.task('combine_css', function(){
  return gulp.src(['./bower_components/normalize.css/normalize.css', './assets/css/*.css'])
    .pipe(concat('main.css'))
    .pipe(gulp.dest('./css'));
});


gulp.task('watch',function() {
   gulp.watch('./assets/**/*.scss', ['scss']);
   gulp.watch('./assets/**/*.css', ['combine_css']);
});

gulp.task('default', ['scss', 'combine_css','watch']);
