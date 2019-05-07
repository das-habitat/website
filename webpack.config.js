const path = require('path');
const AssetsPlugin = require('assets-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const sass = require('sass');

module.exports = (env = {}) => ({
	entry: {
		main: path.join(__dirname, 'src', 'index.js'),
	},

	output: {
		path: path.join(__dirname, 'dist', 'assets'),
		filename: '[name].[hash:5].js',
		chunkFilename: '[id].[hash:5].css',
	},

	module: {
		rules: [
			{
				test: /\.(sa|sc|c)ss$/,
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					{
						loader: 'sass-loader',
						options: {
							includePaths: ['node_modules/normalize.css'],
							implementaton: sass,
						},
					},
				],
			},
		],
	},

	plugins: [
		new AssetsPlugin({
			filename: 'webpack.json',
			path: path.join(process.cwd(), 'data'),
			prettyPrint: true,
		}),

		new MiniCssExtractPlugin(
			env.production
				? {
						filename: '[name].[hash:5].css',
						chunkFilename: '[id].[hash:5].css',
				  }
				: {
						filename: '[name].css',
						chunkFilename: '[id].css',
				  }
		),
	],
});
