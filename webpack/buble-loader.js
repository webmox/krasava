module.exports = function () {
  return {
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: [/(node_modules|bower_components)(?![/|\\](bootstrap|foundation-sites))/],
          loader: 'buble-loader',
          options: {objectAssign: 'Object.assign'},
        },
      ],
    },
  };
};

