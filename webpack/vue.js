const ExtractTextPlugin = require('extract-text-webpack-plugin');
const webpack           = require('webpack');

module.exports = function () {
  return {
    module: {
      rules: [
        {
          test: /\.vue$/,
          loader: 'vue-loader',
          options: {
            loaders: {
              css: ExtractTextPlugin.extract({
                use: 'css-loader',
                fallback: 'vue-style-loader', // <- this is a dep of vue-loader, so no need to explicitly install if using npm3
              }),
            },
          },
        },
      ],
    },
    plugins: [
      new webpack.LoaderOptionsPlugin({
        vue: {
          loaders: {
            scss: 'style!css!sass',
          },
        },
      }),
      // new ExtractTextPlugin('./styles/[name].css'),
    ],
  };
};
