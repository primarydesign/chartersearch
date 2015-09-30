var gulp = require('gulp');
var argv = require('yargs').argv;
var ftp = require('vinyl-ftp');
var server = require('./server.json');
var $ = require('gulp-load-plugins')();

/* environment configuration */
var PRO = !!argv.production;
var ENV = PRO ? 'production' : 'staging';

gulp.task('deploy', function() {
  var conn = ftp.create({
    host: server[ENV].host,
    user: server[ENV].username,
    password: server[ENV].password,
    port: server[ENV].port || 21,
  }), globs = ['./app/**/*'];
  return gulp.src(globs, {base: './app/', buffer: false})
    .pipe(conn.newer(server[ENV].path))
    .pipe(conn.dest(server[ENV].path));
});

gulp.task('style', function() {
  return gulp.src('./src/scss/index.scss')
    .pipe($.cssGlobbing({extensions:['.scss']}))
    .pipe($.sass({outputStyle:'nested'}))
    .pipe($.autoprefixer())
    .pipe($.rename('style.css'))
    .pipe(gulp.dest('./app/'));
});

gulp.task('php', function() {
  return gulp.src('./src/**/*.php')
    .pipe(gulp.dest('./app/'));
});

gulp.task('image', function() {
  return gulp.src('./src/images/**/*')
    .pipe($.imagemin({
      progressive: true
    }))
    .pipe(gulp.dest('./app/images/'))
});
