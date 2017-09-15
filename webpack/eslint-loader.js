module.exports = function (PATHS) {
  return {
    module: {
      rules: [
        {
          test: /\.js?$/,
          include: PATHS,
          use: 'eslint-loader',
          enforce: 'pre',
        },
      ],
    },
  };
};

