var Encore = require('@symfony/webpack-encore');
Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .addEntry('js/app', './assets/persona/js/app.js')
    // .addStyleEntry('css/app', './assets/css/app.scss')
     //.enableSassLoader()
    .autoProvidejQuery()
    .enableVueLoader()
;
module.exports = Encore.getWebpackConfig();