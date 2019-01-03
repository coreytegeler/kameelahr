// var argv = require('yargs').argv;
// var gulpif = require('gulp-if');
// var rename = require('gulp-rename');
// var gulp = require('gulp');
// var gutil = require('gulp-util');
// var plumber = require('gulp-plumber');
// var sass = require('gulp-sass');
// var coffee = require('gulp-coffee');
// var rupture = require('rupture');
// var autoprefixer = require('gulp-autoprefixer');
// var htmlmin = require('gulp-htmlmin');
// var replace = require('gulp-replace');
// var htmlreplace = require('gulp-html-replace');


var argv = require('yargs').argv;
var gulpif = require('gulp-if');
var rename = require('gulp-rename');
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var pug = require('gulp-pug');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var cleanCSS = require('gulp-clean-css');
var coffee = require('gulp-coffee');
var uglify = require('gulp-uglify');
var gutil = require('gulp-util');
var php = require('gulp-connect-php');

var paths = {
  templates: './site/**/*.php',
  sass: './assets/sass/*.scss',
  coffee: './assets/coffee/*.coffee',
}

var dest = {
  css: './assets/css/',
  js: './assets/js/',
  templates: './site',
  images: '../../assets/images/'
}

function compileSass()  {
  var sassOptions = {
    compress: argv.prod ? true : false
  };
  var apOptions = {
    browsers: ['> 0.5%', 'last 5 versions', 'Firefox ESR', 'not dead']
  };
  return gulp.src('./assets/sass/style.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass(sassOptions))
    .pipe(autoprefixer(apOptions))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./assets/css/'))
  .on('end', function() {
    log('Sass done');
    if (argv.prod) log('CSS minified');
  });
}

function compileCoffee()  {
  return gulp.src('./assets/coffee/*.coffee', { sourcemaps: true })
    .pipe(coffee({bare: true}))
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./assets/js/'))
  .on('end', function() {
    log('Coffee done');
    if (argv.prod) log('JS minified');
  });
}

function watchFiles() {
  gulp.watch(paths.sass, compileSass);
  gulp.watch(paths.coffee, compileCoffee);
}

function servePHP() {
  php.server({
    base: './',
    port: 8080,
    keepalive: true,
    stdio: 'ignore'
  });
}

gulp.task('watch', gulp.parallel(compileSass, compileCoffee, watchFiles, servePHP));

gulp.task('build', gulp.parallel(compileSass, compileCoffee));


function log(message) {
  gutil.log(gutil.colors.bold.green(message));
}