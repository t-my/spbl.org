// Include gulp
var gulp        = require('gulp');


// Include plug-ins
var autoprefix    = require('gulp-autoprefixer'),
    browserify    = require('gulp-browserify');
    changed       = require('gulp-changed'),
    concat        = require('gulp-concat'),
    jshint        = require('gulp-jshint'),
    minifyCSS     = require('gulp-minify-css');
    minifyHTML    = require('gulp-minify-html'),
    sass          = require('gulp-sass'),
    stripDebug    = require('gulp-strip-debug'),
    uglify        = require('gulp-uglify'),
    entityconvert = require('gulp-entity-convert');

// Build site
gulp.task('build', 
  [ 'copyimages', 
    'copyphp', 
    'scripts', 
    'scss', 
    'copyfonts', 
    'copywordpress', 
    'copycss']);



// Default task: watch for changes.
gulp.task('default', ['build'], function() {

  // Watch for new css files
  gulp.watch('./styles/**/*.css', function() {
    gulp.run('copycss');
  });

  // Watch for new/modified images
  gulp.watch('./images/**/*', function() {
    gulp.run('copyimages');
  });

  // Watch for PHP changes
  gulp.watch('./src/**/*.php', function() {
    gulp.run('copyphp');
  });

  // Watch for JS changes
  gulp.watch('./src/scripts/*.js', function() {
    gulp.run('scripts');
  });

  // Watch for CSS changes
  gulp.watch('./src/styles/*.scss', function() {
    gulp.run('scss');
  });

  // Watch for new fonts
  gulp.watch('./src/fonts/**/*.{ttf,woff,eof,svg}', function() {
    gulp.run('copyfonts');
  });
});

// SCSS to CSS
gulp.task('scss', function() {
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

// Copy static CSS
gulp.task('copycss', function() {
  var src = './src/styles/**/*.css',
      dest = './build/styles';

  gulp.src(src)
    .pipe(changed(dest))
    .pipe(gulp.dest(dest));
});

// Copy images
gulp.task('copyimages', function() {
  var imgSrc = './src/images/**/*',
      imgDst = './build/images';

  gulp.src(imgSrc)
    .pipe(changed(imgDst))
    .pipe(gulp.dest(imgDst));
});

// Copy new or changed HTML pages to build
gulp.task('copyphp', function() {
  var src = './src/**/*.php',
      dest = './build';

  gulp.src(src)
    .pipe(entityconvert())
    .pipe(gulp.dest(dest));
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

// Copy wordpress files
gulp.task('copywordpress', function() {
  gulp.src('./wordpress/**/*')
  .pipe(gulp.dest('./build'))
});
