const path           = require('path');
const HardSourcePlugin = require('hard-source-webpack-plugin');

module.exports = function() {
  return {
    plugins: [
      new HardSourcePlugin({
        cacheDirectory: path.join(__dirname, 'node_modules/.cache/hardsource/[confighash]'),
        recordsPath: path.join(__dirname, 'node_modules/.cache/hardsource/[confighash]/records.json'),
        configHash: function(webpackConfig) {
          return require('node-object-hash')().hash(webpackConfig);
        },
      }),
    ],
  };
};