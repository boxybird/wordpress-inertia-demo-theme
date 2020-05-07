const mix = require('laravel-mix')

mix.setPublicPath('./')

mix.js('resources/js/app.js', 'dist/js')
  .postCss('resources/css/app.css', 'dist/css', [
    require('tailwindcss'),
  ])
  .version()

