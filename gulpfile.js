const { dest, src, parallel, series, watch } = require('gulp');
const autoprefixer = require('autoprefixer');
const browserSync = require('browser-sync').create();
const cssnano = require('cssnano');
const Fiber = require('fibers');
const path = require('path');
const postcss = require('gulp-postcss');
const rollup = require('rollup');
const rimraf = require('rimraf');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const { nodeResolve } = require('@rollup/plugin-node-resolve');
const commonjs = require('@rollup/plugin-commonjs');
const { terser } = require('rollup-plugin-terser');

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

async function scripts() {
  const bundle = await rollup.rollup({
    input: './src/scripts/index.js',
    plugins: [nodeResolve(), commonjs(), terser()],
  });

  await bundle.write({
    file: path.join(__dirname, 'kirby', 'assets', 'main.js'),
    format: 'umd',
    name: 'library',
    sourcemap: true,
  });
}

const build = parallel(static, styles, scripts);

function watchTask() {
  watch(path.join(__dirname, 'src', 'styles', '**', '*.scss'), styles);
  watch(path.join(__dirname, 'src', 'scripts', '**', '*.js'), scripts);

  browserSync.init({
    open: false,
    proxy: '127.0.0.1:8000',
    notify: false,
  });

  watch(['kirby/**/*', '!kirby/cache/**/*', '!.lock']).on(
    'all',
    browserSync.reload
  );
}

exports.build = series(clean, build);
exports.default = series(clean, build, watchTask);
