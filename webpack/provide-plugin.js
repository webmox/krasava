const webpack = require('webpack');

module.exports = function () {
  return {
    plugins: [
      new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
        Tether: 'tether',
        'window.Tether': 'tether',
      }),
    ],
  };
};