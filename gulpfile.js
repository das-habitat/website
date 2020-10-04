const { dest, src, parallel, series, watch } = require('gulp');
const autoprefixer = require('autoprefixer');
const browserSync = require('browser-sync').create();
const cssnano = require('cssnano');
const Fiber = require('fibers');
const path = require('path');
const postcss = require('gulp-postcss');
const rimraf = require('rimraf');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');

sass.compiler = require('sass');

function clean(cb) {
  return rimraf(path.join(__dirname, 'kirby', 'assets', '**', '*'), cb);
}

function styles() {
  const plugins = [autoprefixer()];

  plugins.push(cssnano());

  return src(path.join(__dirname, 'src', 'styles', '**', '*.scss'))
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        fiber: Fiber,
        includePaths: ['node_modules/normalize.css/'],
      }).on('error', sass.logError)
    )
    .pipe(postcss(plugins))
    .pipe(dest(path.join(__dirname, 'kirby', 'assets')))
    .pipe(sourcemaps.write())
    .pipe(browserSync.stream());
}

function static() {
  return src(path.join(__dirname, 'src', 'static', '**', '*')).pipe(
    dest(path.join(__dirname, 'kirby', 'assets'))
  );
}

const build = parallel(static, styles);

function watchTask() {
  watch(path.join(__dirname, 'src', 'styles', '**', '*.scss'), styles);

  browserSync.init({
    open: false,
    proxy: 'localhost:8000',
  });

  watch('kirby/**/!(*.lock)').on('change', browserSync.reload);
}

exports.build = build;
exports.default = series(clean, build, watchTask);
