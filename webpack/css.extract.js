const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = function (env) {
  return {
    devtool: env === 'development' ? 'source-map' : '',
    module: {
      rules: [
        {
          test: /\.scss$/,
          // include: paths,
          use: ExtractTextPlugin.extract({
            publicPath: '../',
            fallback: 'style-loader',
            use: [
              'css-loader?sourceMap',
              'postcss-loader?sourceMap',
              'resolve-url-loader',
              'sass-loader?sourceMap',
            ],
          }),
        },
        {
          test: /\.css$/,
          // include: paths,
          use: ExtractTextPlugin.extract({
            fallback: 'style-loader',
            use: 'css-loader',
          }),
        },
      ],
    },
    plugins: [
      new ExtractTextPlugin('./styles/[name].css'),
    ],
  };
};
