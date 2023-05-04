//Dependencies for work with sass to CSS 
const {src, dest, watch} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');

//paths
const paths = {
    scss: 'src/scss/**/*.scss'
}
//Functions for work with the dependencies

const css = done => {
    src(paths.scss)
    .pipe( plumber() )
    .pipe( sass() )
    .pipe( dest('build/css') )
    done()
}

const dev = done => {
    watch( paths.scss, css)
    done;
}


exports.css = css;
exports.dev = dev;