const path = require('path');
const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const sass = require('sass');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const ShellPlugin = require('webpack-shell-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

const theme = 'habitat';
const hugoBinary = process.platform.startsWith('win')
	? path.join('.hugo', 'hugo.exe')
	: './.hugo/hugo';
const useLocalHugo = fs.existsSync(hugoBinary);

function setEnv() {
	const binary = useLocalHugo ? hugoBinary : 'hugo';

	if (process.env.APP_ENV === 'dev') {
		return {
			watch: true,
			filename: '[name]',
			command: `${binary} serve --buildDrafts=true --buildFuture=true --baseURL=http://localhost:1313`,
		};
	}

	return {
		watch: false,
		filename: '[name].[contenthash:5]',
		command: binary,
	};
}

module.exports = (env = setEnv()) => {
	const config = {
		watch: env.watch,

		mode: process.env.APP_ENV === 'dev' ? 'development' : 'production',

		context: __dirname,

		resolve: {
			extensions: ['.js', '.scss', '.css'],
		},

		entry: {
			main: path.resolve(__dirname, 'themes', theme, 'assets', 'index'),
		},

		output: {
			path: path.resolve(__dirname, 'themes', theme, 'static', 'assets'),
			filename: `${env.filename}.js`,
			chunkFilename: '[id].chunk.js',
		},

		module: {
			rules: [
				{
					test: /.(jpg|jpeg|png|svg)$/,
					use: [
						{
							loader: 'file-loader',
						},
					],
				},
				{
					test: /\.(sa|sc|c)ss$/,
					use: [
						MiniCssExtractPlugin.loader,
						'css-loader',
						{
							loader: 'sass-loader',
							options: {
								implementation: sass,
								sassOptions: {
									includePaths: ['node_modules/normalize.css'],
								},
							},
						},
					],
				},
			],
		},

		plugins: [
			new CleanWebpackPlugin({
				dry: false,
				dangerouslyAllowCleanPatternsOutsideProject: true,
				cleanOnceBeforeBuildPatterns: [
					'**/*',
					'!fonts/**',
					'!ui/**',
					'../../../../dist/**',
				],
				cleanAfterEveryBuildPatterns: ['**/*', '!fonts/**', '!ui/**'],
			}),

			new ShellPlugin({
				onBuildEnd: [env.command],
			}),

			new MiniCssExtractPlugin({
				filename: `${env.filename}.css`,
				chunkFilename: `${env.filename}.css`,
			}),

			new ManifestPlugin({
				fileName: '../../../../data/manifest.json',
			}),
		],
	};

	if (process.env.APP_ENV === 'dev') {
		config.plugins.pop(); // remove manifest plugin
	}

	return config;
};
