const { series, task, watch } = require('gulp');
const cp = require('child_process');
const BrowserSync = require('browser-sync');
const rimraf = require('rimraf');

const browserSync = BrowserSync.create();
const webpackOptions = ['--colors', '--display-error-details'];
const hugoOptions = ['-v'];

function runHugo(options) {
	return cp.spawn('hugo', hugoOptions.concat(options || []), {
		stdio: 'inherit',
	});
}

function runWebpack(options) {
	return cp.spawn('yarn', ['webpack'].concat(webpackOptions, options || []), {
		stdio: 'inherit',
	});
}

task(
	'webpack',
	series(
		cb => rimraf('./dist', cb),
		() => runWebpack(['--mode=production', '--profile', '--env.production'])
	)
);

task(
	'build',
	series(
		cb => rimraf('./dist', cb),
		() => runWebpack(['--mode=production', '--profile', '--env.production']),
		() => runHugo('--environment=production')
	)
);

task(
	'watch',
	series(
		cb => rimraf('./dist', cb),
		() => {
			runWebpack(['--mode=development', '--watch']);
			runHugo(['--buildDrafts', '--buildFuture', '--watch', '--environment=development']);

			browserSync.init({
				server: {
					baseDir: './dist',
				},
			});

			watch('./dist/**/*').on('change', browserSync.reload);
		}
	)
);
