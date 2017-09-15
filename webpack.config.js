
'use strict'; // eslint-disable-line

const path           = require('path');
const webpack        = require('webpack');
const glob           = require('glob');
const merge          = require('webpack-merge');
const CleanPlugin    = require('clean-webpack-plugin');
// const replace        = require('rollup-plugin-replace');
const BrowserSync    = require('./webpack/browser-sync');
const ExtractCSS     = require('./webpack/css.extract');
const UglifyJS       = require('./webpack/js.uglyfy');
const LintJS         = require('./webpack/js.lint');
const LintCSS        = require('./webpack/sass.lint');
const ProvidePlugin  = require('./webpack/provide-plugin');
const BubleLoader    = require('./webpack/buble-loader');
const EslintLoader   = require('./webpack/eslint-loader');
const Images         = require('./webpack/images');
const Fonts          = require('./webpack/fonts');
const Vue            = require('./webpack/vue');
// const HardSource     = require('./webpack/hard-source');
// const Sass           = require('./webpack/sass');
// const Css            = require('./webpack/css');

// PATHS______________________________________________________________________________________________________________

const PATHS = {
  partials: path.join(__dirname, './resources/views/partials'),
  assets: path.join(__dirname, './resources/assets'),
  dist: path.join(__dirname, './dist'),
};

const common = merge([
  {
    entry: {
      "main": [
        PATHS.assets + '/scripts/main.js',
        PATHS.assets + '/styles/main.scss',
      ],
      'components': glob.sync( PATHS.partials + '/**/*.js'),
    },
    output: {
      path: PATHS.dist,
      filename: 'scripts/[name].js',
      publicPath: '/dist/',
    },
    // cache: true,
    stats: { children: false },
    resolve: {
      extensions: ['.js', '.vue', '.css', '.json'],
      modules: [
        PATHS.assets,
        // PATHS.dist,
        PATHS.partials,
        'node_modules',
        'bower_components',
      ],
      enforceExtension: false,
      alias: {
        'scss': PATHS.assets + '/styles/common',
        'img': PATHS.dist + '/dist/img',
        'vue': 'vue/dist/vue.common.js',
      },
    },
    externals: {
      jquery: 'jQuery',
      // vue: 'Vue',
    },

    // PLUGINS________________________________________________________________________________________________________

    plugins: [
      new webpack.DefinePlugin({
        'process.env': {
          NODE_ENV: '"production"',
        },
      }),
      new webpack.optimize.ModuleConcatenationPlugin(), // WP3
      new CleanPlugin([PATHS.dist], { verbose: false }),
      new webpack.NoEmitOnErrorsPlugin(),
      new webpack.optimize.CommonsChunkPlugin({ name: 'vendor' }),
      new webpack.LoaderOptionsPlugin({
        test: /\.js$/,
        options: {
          eslint: { failOnWarning: false, failOnError: true },
        },
      }),
      // replace({
      //   'process.env.NODE_ENV': JSON.stringify('production'),
      // }),
    ],
  },

  // PLUGINS__________________________________________________________________________________________________________

  EslintLoader( PATHS.partials, PATHS.assets ),
  BubleLoader(),
  ProvidePlugin(),
  LintJS({ paths: PATHS.sources }),
  LintCSS(),
  Images('/node_modules|bower_components/'),
  Fonts( PATHS.assets ),
  Vue(),
  // HardSource(),
]);

// DEVELOPMENT / PRODUCTION __________________________________________________________________________________________

module.exports = function (env) {
  if (env === 'production') {
    return merge([
      common,
      ExtractCSS(env),
      UglifyJS( true ),
    ]);
  }
  if (env === 'development') {
    return merge([
      common,
      BrowserSync(),
      ExtractCSS(env),
      // Sass(),
      // Css( PATHS.partials ),
    ]);
  }
};