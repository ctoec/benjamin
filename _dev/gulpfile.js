/*
* * * * * ==============================
* * * * * ==============================
* * * * * ==============================
* * * * * ==============================
========================================
========================================
========================================
----------------------------------------
USWDS SASS GULPFILE
----------------------------------------
*/

var autoprefixer  = require('autoprefixer');
var autoprefixerOptions = require('./node_modules/uswds-gulp/config/browsers');
var cssnano       = require('cssnano');
var gulp          = require('gulp');
var mqpacker      = require('css-mqpacker');
var path          = require('path');
var pkg           = require('./node_modules/uswds/package.json');
var postcss       = require('gulp-postcss');
var rename        = require('gulp-rename');
var replace       = require('gulp-replace');
var sass          = require('gulp-sass');
var sourcemaps    = require('gulp-sourcemaps');
var uswds         = require('./node_modules/uswds-gulp/config/uswds');
var browserSync   = require('browser-sync');
var webpack       = require('webpack-stream');
var reload        = browserSync.reload;

/*
----------------------------------------
PROJECT SETTINGS 
----------------------------------------
- All paths are relative to the
  project root
- Don't use a trailing `/` for path
  names
----------------------------------------
*/
var project 		  = 'ctoec';
var url 	  	    = 'ctoec.dev';
var build 		    = './buildtheme/';
var buildInclude 	= [
                      // include common file types
                      '**/*.php',
                      '**/*.html',
                      '**/*.css',
                      '**/*.js',
                      '**/*.svg',
                      '**/*.ttf',
                      '**/*.otf',
                      '**/*.eot',
                      '**/*.woff',
                      '**/*.woff2',

                      // include specific files and folders
                      'screenshot.png',

                      // exclude files and folders
                      '!node_modules/**/*',
                      '!assets/bower_components/**/*',
                      '!style.css.map',
                      '!assets/js/custom/*',
                      '!assets/css/patrials/*'
                    ];

/*
----------------------------------------
PATHS
----------------------------------------
- All paths are relative to the
  project root
- Don't use a trailing `/` for path
  names
----------------------------------------
*/

// Project Sass source directory
const PROJECT_SASS_SRC = './src/scss';

// Project JS source directory
const PROJECT_JS_SRC = './src/js';

// Images destination
const IMG_DEST = '../assets/frontend/img';

// Fonts destination
const FONTS_DEST = '../assets/frontend/fonts';

// Javascript destination
const JS_DEST = '../assets/frontend/js';

// Compiled CSS destination
const CSS_DEST = '../assets/frontend/css';

/*
----------------------------------------
TASKS
----------------------------------------
*/

gulp.task('copy-uswds-setup', () => {
  return gulp.src(`${uswds}/scss/theme/**/**`)
  .pipe(gulp.dest(`${PROJECT_SASS_SRC}`));
});

gulp.task('copy-uswds-fonts', () => {
  return gulp.src(`${uswds}/fonts/**/**`)
  .pipe(gulp.dest(`${FONTS_DEST}`));
});

gulp.task('copy-uswds-images', () => {
  return gulp.src(`${uswds}/img/**/**`)
  .pipe(gulp.dest(`${IMG_DEST}`));
});

gulp.task('copy-uswds-js', () => {
  return gulp.src(`${uswds}/js/**/**`)
  .pipe(gulp.dest(`${JS_DEST}`));
});

gulp.task('build-js', function(done) {
  return gulp.src([
      `${PROJECT_JS_SRC}/uswds.js`
    ])
    .pipe(webpack({
      output: {
        filename: 'uswds.js',
      },
      mode: 'production'
    }))
    .pipe(gulp.dest(JS_DEST));
});

gulp.task('build-sass', function(done) {
  var plugins = [
    // Autoprefix
    autoprefixer(autoprefixerOptions),
    // Pack media queries
    mqpacker({ sort: true }),
    // Minify
    cssnano(({ autoprefixer: { browsers: autoprefixerOptions }}))
  ];
  return gulp.src([
      `${PROJECT_SASS_SRC}/*.scss`
    ])
    .pipe(sourcemaps.init({ largeFile: true }))
    .pipe(sass({
        includePaths: [
          `${PROJECT_SASS_SRC}`,
          `${uswds}/scss`,
          `${uswds}/scss/packages`,
        ]
      }))
    .pipe(replace(
      /\buswds @version\b/g,
      'based on uswds v' + pkg.version
    ))
    .pipe(postcss(plugins))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(`${CSS_DEST}`))
    .pipe(reload({stream:true}));
});


gulp.task('browser-sync', function() {
	var files = [
			          '**/*.php',
			          '**/*.{png,jpg,gif}'
              ];
              
	browserSync.init(files, {
		// Read here http://www.browsersync.io/docs/options/
		proxy: 'localhost:8080',

		// Inject CSS changes
		injectChanges: true
	});
});

gulp.task('init', gulp.series(
  'copy-uswds-setup',
  'copy-uswds-fonts',
  'copy-uswds-images',
  'copy-uswds-js',
  'build-sass',
));

gulp.task('watch-assets', function () {
  gulp.watch(`${PROJECT_JS_SRC}/**/*.js`, gulp.series('build-js'));
  gulp.watch(`${PROJECT_SASS_SRC}/**/*.scss`, gulp.series('build-sass'));
});

gulp.task('watch', gulp.series('build-sass', 'build-js', 'watch-assets'));

gulp.task('build', gulp.series('build-sass', 'build-js'));

gulp.task('default', gulp.series('watch'));
