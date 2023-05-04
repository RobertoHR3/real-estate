//Dependencies for work with sass to CSS 
const {src, dest} = require('gulp');
const sass = require('gulp-sass')(require('sass'));

//paths
const paths = {
    scss: 'src/scss/**/*.scss'
}
//Functions for work with the dependencies

const css = done => {
    src(paths.scss)
    .pipe( sass() )
    .pipe( dest('build/css') )
    done()
}


exports.css = css;