var gulp = require('gulp');
var argv = require('yargs').argv;
var ftp = require('vinyl-ftp');
var server = require('./server.json');

/* environment configuration */
var PRO = !!argv.production;
var ENV = PRO ? 'production' : 'staging';

gulp.task('deploy', function() {
  var conn = ftp.create({
    host: server[ENV].host,
    user: server[ENV].username,
    password: server[ENV].password,
    port: server[ENV].port || 21,
  }), globs = [''];
  return gulp.src(globs, {base: './dist/', buffer: false})
    .pipe(conn.newer(server[ENV].path))
    .pipe(conn.dest(server[ENV].path));
});

gulp.task('style', function() {
  return gulp.src('./src/scss/**/*.scss')
    .pipe($.autoprefixer)
});
