module.exports = function(PATHS) {
  return {
    module: {
      rules : [
        {
          test: /\.(png|woff|woff2|eot|ttf|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
          include: PATHS,
          loader: 'file-loader',
          options: {
            name: 'fonts/[name].[ext]',
          },
        },
        // {
        //   test: /\.woff2?$/,
        //   include: PATHS.assets,
        //   loader: 'url-loader',
        //   options: {
        //     limit: 10000,
        //     mimetype: 'application/font-woff',
        //     name: 'fonts/[name].[ext]',
        //   },
        // },
        // {
        //   test: /\.(ttf|eot|woff2?)$/,
        //   include: /node_modules|bower_components/,
        //   loader: 'file-loader',
        //   options: {
        //     name: 'vendor/[name].[ext]',
        //   },
        // },
      ],
      loaders: [

        // {
        //   test: /\.woff(\?v=\d+\.\d+\.\d+)?$/,
        //   loader: 'file-loader?limit=100000&mimetype=application/font-woff&name=fonts/[name].[ext]',
        // },
        // {
        //   test: /\.woff2(\?v=\d+\.\d+\.\d+)?$/,
        //   loader: 'url-loader?limit=100000&mimetype=application/font-woff&name=fonts/[name].[ext]',
        // },
        // {
        //   test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
        //   loader: 'file-loader?limit=100000&mimetype=application/octet-stream&name=fonts/[name].[ext]',
        // },
        // {
        //   test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
        //   loader: 'file-loader?name=fonts/[name].[ext]',
        // },
        // {
        //   test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        //   loader: 'url-loader?limit=100000&mimetype=image/svg+xml&name=fonts/[name].[ext]',
        // },

        // { test: /\.(png|woff|woff2|eot|ttf|svg)$/, loader: 'url-loader?limit=100000' },
        // { test: /\.(png|woff|woff2|eot|ttf|svg)$/, loader: 'file-loader?limit=100000' },

      ],
    },
  };
};