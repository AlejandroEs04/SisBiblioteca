const {src, dest, watch, parallel} = require('gulp');

const paths = {
    js: 'src/js/**/*.js'
}


function javascript() {
    return src(paths.js)
        .pipe(dest('./public/build/js'));
}

function watchArchivos() {
    watch(paths.js, javascript);
}

exports.default = parallel(javascript, watchArchivos);