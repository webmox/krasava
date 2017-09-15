module.exports = function () {
  return {
    // devServer: {
    //     stats: 'errors-only',
    //     port: 9000
    // }
    // context: path.resolve(__dirname, 'build/footer.php'),
    devtool: 'eval-source-map',
    devServer: {
      inline: true,
      hot: true,
      stats: 'errors-only',
      proxy: {
        '**': {
          target: 'http://webpack.loc',
          secure: false,
          changeOrigin: true,
        },
      },
    },
  };
};