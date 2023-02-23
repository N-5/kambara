const mix = require('laravel-mix');
const autoprefixer = require('autoprefixer');
const cssMqpacker = require('css-mqpacker');
const postcssCustomMedia = require('postcss-custom-media');

mix.autoload({
  jquery: ['$', 'jQuery']
});

mix
.options({
  processCssUrls: false,
})
.js('src/js/app.js', 'assets/js')
.sass('src/scss/app.scss', 'assets/css')
.copyDirectory('src/images', 'assets/images')
.browserSync({
  files: [
      `**/*.php`,
      "src/**/*",
      "dist/**/*.*"
  ],
  proxy: {
      target: "http://kambara.local/",
  }
});

mix.options({
  cache: true,
  keepalive: true,
  processCssUrls: false,
  postCss: [
    autoprefixer,
    postcssCustomMedia,
    cssMqpacker({
      sort: true
    })
  ],
  clearConsole: true,
  autoprefixer: {
    options: {
      browsers: [
        '> 1%, last 8 versions, Firefox ESR, ie > 8'
      ]
    }
  }
});

if (mix.inProduction()) {
  mix.options({
    cache: false,
    postCss: [
      require('csswring')({
        removeAllComments: false
      })
    ]
  });
} else {
  mix
    .sourceMaps()
    .webpackConfig({
      devtool: 'inline-source-map'
    });
}

mix.disableNotifications();