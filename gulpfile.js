// Include gulp
var gulp        = require('gulp'); 
 

// Include plug-ins
var autoprefix  = require('gulp-autoprefixer'),
    browserify  = require('gulp-browserify');
    changed     = require('gulp-changed'),
    concat      = require('gulp-concat'),
    imagemin    = require('gulp-imagemin'),
    jshint      = require('gulp-jshint'),
    minifyCSS   = require('gulp-minify-css');
    minifyHTML  = require('gulp-minify-html'),
    sass        = require('gulp-sass'),    
    stripDebug  = require('gulp-strip-debug'),
    uglify      = require('gulp-uglify'),


// SCSS to CSS
gulp.task('styles', function() {
  return gulp.src('src/styles/**/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('build/styles/'));
});

// JS hint task
gulp.task('jshint', function() {
  gulp.src('./src/scripts/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// Minify new images
gulp.task('imagemin', function() {
  var imgSrc = './src/images/**/*',
      imgDst = './build/images';
 
  gulp.src(imgSrc)
    .pipe(changed(imgDst))
    .pipe(imagemin())
    .pipe(gulp.dest(imgDst));
});

// Minify new or changed HTML pages
gulp.task('htmlpage', function() {
  var htmlSrc = './src/*.html',
      htmlDst = './build';
 
  gulp.src(htmlSrc)
    .pipe(changed(htmlDst))
    .pipe(minifyHTML())
    .pipe(gulp.dest(htmlDst));
});

// JS concat, strip debugging and minify
gulp.task('scripts', function() {
  gulp.src(['./src/scripts/lib.js','./src/scripts/*.js'])
    .pipe(browserify({
      insertGlobals : true,
      debug : !gulp.env.production
    }))
    .pipe(concat('main.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(gulp.dest('./build/scripts/'));
});


// Copy font files
gulp.task('copyfonts', function() {
   gulp.src('./src/fonts/**/*.{ttf,woff,eof,svg}')
   .pipe(gulp.dest('./build/fonts'));
});


gulp.task('default', ['imagemin', 'htmlpage', 'scripts', 'styles'], function() {
  // Watch for HTML changes
  gulp.watch('./src/*.html', function() {
    gulp.run('htmlpage');
  });
 
  // Watch for JS changes
  gulp.watch('./src/scripts/*.js', function() {
    gulp.run('jshint', 'scripts');
  });
 
  // Watch for CSS changes
  gulp.watch('./src/styles/*.scss', function() {
    gulp.run('styles');
  });
});