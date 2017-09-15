const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = function () {
  return {
    plugins: [
      new BrowserSyncPlugin({
        port: 3000,
        proxy: 'http://krasavabet.loc',
        // proxy: 'http://webpack.loc',
        files: [
          'app/**/*.php',
          'resources/assets/**/*.*',
          'resources/views/**/*.php',
          'resources/controllers/*.php',
        ],
        reloadDelay: 200,
      }),
    ],
  };
};