const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CompressionPlugin = require('compression-webpack-plugin');
const BuildNotifier = require('webpack-build-notifier');
const isDev = process.env.NODE_ENV === 'development';
var webpack = require('webpack');

module.exports = {
	devtool: isDev ? "source-map" : false,
	entry: ['./src/index.js','./src/sass/style.scss'],
  	output: {
    	filename: 'js/script.js',
    	path: path.resolve(__dirname, 'assets'),
  	},
  	module:{
  		rules:[
  			{
  				test: /\.scss$/,
  				use: [
  					MiniCssExtractPlugin.loader,
					// Translates CSS into CommonJS
					{
						loader: "css-loader",
						options: {
							sourceMap: isDev,
						},
					},
					// Compiles Sass to CSS
					{
						loader: "sass-loader",
						options: {
							sourceMap: isDev,
						},
					},
				],
  			},
  			{
				test: /\.js$/,
				exclude: /\.module.(s(a|c)ss)$/,
				use: ["babel-loader"]
			}
  		]
  	},
  	resolve:{
  		extensions: ['.js','.scss']
  	},
  	optimization: {
  		minimize: !isDev,
  		minimizer: [
  			new CssMinimizerPlugin({
  				sourceMap: isDev,
  				minimizerOptions:{
  					preset: [
	  					'default',
	  					{
	  						discardComments:{ removeAll: !isDev}
	  					}
	  				]
  				}
  			}),
  			new TerserPlugin({
  				extractComments:{
  					condition:true,
  					filename: (fileData)=>{
  						return `${fileData.filename}.LICENSE.txt${fileData.query}`
  					},
  					banner:(commentsFile) =>{
  						return `
  							Slider Post Full Page Scripts JS, 
  							Licence ${commentsFile}
  							@Copyright Sviluppo Web
  						`;
  					}
  				}
  			})
  		]
  	},
  	plugins: [
  		new MiniCssExtractPlugin({
  			filename: isDev ? 'css/[name].css' : 'css/[name].min.css',
  			chunkFilename: isDev ? 'css/[id].css' : 'css/[id].[contenthash].css'
  		}),
  		new webpack.SourceMapDevToolPlugin({
			filename: '[file].map'
		}),
      new webpack.ProvidePlugin({
        $:'jquery',
        jQuery:'jquery'
      }),
		new BuildNotifier({
			title: "SPFP Compile",
			logo:""
		}),
		new CompressionPlugin()
  	]
};