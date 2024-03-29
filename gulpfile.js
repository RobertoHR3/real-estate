//Dependencies for work with sass to CSS 
const {src, dest, watch, parallel} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');

//Dependencies for the performance of images
const webp = require('gulp-webp');
const avif = require('gulp-avif');
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');

//paths
const paths = {
    scss: 'src/scss/**/*.scss',
    images: 'src/img/**/*.{jpg,png}',
    js: 'src/js/**/*.js'
}
//Functions for work with the dependencies

const css = done => {
    src(paths.scss)
    .pipe( plumber() )
    .pipe( sass() )
    .pipe( dest('./public/build/css') )
    done()
}


const versionWebp = done => {
    const options = {
        quality: 50
    }
    src( paths.images )
    .pipe( webp(options) )
    .pipe( dest('./public/build/img') )
    done()
}

const versionAvif = done => {
    const options = {
        quality: 50
    }
    src( paths.images )
    .pipe( avif(options) )
    .pipe( dest('./public/build/img') )
    done()
}

const versionJpp = done => {
    const options = {
        optimizationLevel: 3
    }
    src( paths.images )
    .pipe( cache( imagemin(options) ) )
    .pipe( dest('./public/build/img') )
    done()
}

const javascript = done => {
    src(paths.js)
    .pipe( dest('./public/build/js') )
    done();
}

const dev = done => {
    watch( paths.scss, css)
    watch( paths.js, javascript)
    done();
}

exports.css = css;
exports.dev = dev;
exports.webp = versionWebp;
exports.avif = versionAvif;
exports.jpg = versionJpp;
exports.js = javascript;

exports.default = parallel(css, javascript, versionWebp, versionAvif, versionJpp);