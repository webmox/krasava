const webpack = require('webpack');

module.exports = function (useSourceMap) {
  return {
    plugins: [
      new webpack.optimize.UglifyJsPlugin({
        sourceMap: useSourceMap,
        minimize: true,
        beautify: false,
        comments: false,
        compress: {
          sequences    : true,
          booleans     : true,
          loops        : true,
          unused       : true,
          warnings     : false,
          drop_console : true,
          unsafe       : true,
        },
      }),
    ],
  };
};