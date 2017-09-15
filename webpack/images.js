const ImageminPlugin    = require('imagemin-webpack-plugin').default;
const imageminMozjpeg   = require('imagemin-mozjpeg');

module.exports = function() {
  return {
    module: {
      rules: [
        {
          test: /\.(jpe?g|png|svg|gif|ico)$/,
          use: 'file-loader?name=img/[name].[ext]',
        },
      ],
    },
    plugins: [
      new ImageminPlugin({
        // test: /\.(jpe?g|png|gif|svg)$/i,
        optipng: { optimizationLevel: 7 },
        gifsicle: { optimizationLevel: 3 },
        pngquant: { quality: '65-90', speed: 4 },
        svgo: { removeUnknownsAndDefaults: false, cleanupIDs: false },
        plugins: [imageminMozjpeg({ quality: 75 })],
        disable: process.env.NODE_ENV !== 'production',
      }),
    ],
  };
};
//&publicPath=resources/dist/