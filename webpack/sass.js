module.exports = function (paths) {
  return {
    devtool: 'source-map',
    module: {
      rules: [
        {
          test: /\.scss$/,
          include: paths,
          use: [
            'style-loader',
            'css-loader',
            'sass-loader',
          ],
        },
      ],
    },
  };
};

// https://github.com/webpack/webpack/issues/4190

// {
//   test: /\.(css|scss)$/,
//     include: PATHS.resources,
//   use: ExtractTextPlugin.extract({
//   fallback: 'style-loader',
//   publicPath: '../',
//   use: [
//     'css-loader?sourceMap&modules&importLoaders=1&localIdentName=[name]__[local]___[hash:base64:5]',
//     // 'css-loader?sourceMap&importLoaders=1&localIdentName=[name]__[local]___[hash:base64:5]',
//     'postcss-loader?sourceMap&sourceComments',
//     'resolve-url-loader?sourceMap',
//     'sass-loader?sourceMap',
//   ],
// }),
// },