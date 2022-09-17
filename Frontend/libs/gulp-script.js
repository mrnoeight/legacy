// import libraries
var path = require('path');
var wait = require('gulp-wait'); // Wait before next
var concat = require('gulp-concat'); // Join all JS files together to save space
var stripDebug = require('gulp-strip-debug'); // Remove debugging stuffs
var uglify = require('gulp-uglify-es').default;
var using = require('gulp-using') // print filename :P
const globby = require('globby');
const ProgressCLI = require('cli-progress');

const babel = require('gulp-babel');

var javascriptObfuscator = require('gulp-javascript-obfuscator-nothrow');


// import dependencies 
var errorHandler = require('./error-handler')

// get configuration
var config = require('./gulp-config')
var dir = config.dir
var gulp = config.gulp
var browserSync = config.browserSync

const listAllFilesAndDirs = dir => globby(`${dir}/**/*.js`);

// constructor
var concatScripts = function () {
  return gulp
    .src('./src/assets/js/bundle/*.js')
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(concat('all.js'))
    .pipe(stripDebug())
    .pipe(gulp.dest(path.resolve(dir.debug, 'assets/js/bundle')))
    .pipe(uglify())
    .pipe(gulp.dest(path.resolve(dir.build, 'assets/js/bundle')))
    .on('end', function () {
      console.log("All scripts are bundled into 'assets/js/bundle/all.js'");
    });
};

var copyScriptTask = function () {
  return gulp.src('./src/assets/js/**/*')
    .pipe(gulp.dest(path.resolve(dir.debug, 'assets/js')))
    .pipe(browserSync.reload({ stream: true }));
};

var onCompile = function (pathsIn, pathOut) {
  pathsIn = pathsIn || ['./src/assets/js/**/*.js'];
  pathOut = pathOut || 'assets/js';

  var count = 0

  return gulp
    .src(pathsIn)
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(uglify())
    .pipe(gulp.dest(path.resolve(dir.build, pathOut)))
    .on('error', errorHandler)
    .on('data', function (data) {
      count++
      console.log("compiling script... " + count)
    })
    .on("end", function () {
      // console.log('end');
    })
    .on("finish", function () {

    });
};

var compileScriptsTask = function () {

  return onCompile(['./src/assets/js/**/*.js'], 'assets/js');

};


var mintopjs = function () {

  return onCompile(['./src/assets/js/digitop/**/*.js'], 'assets/js/digitop');

};



var optionsJavascriptObfuscator = {
  compact: true,
  unicodeEscapeSequence: false,
  transformObjectKeys: true,
  stringArray: true,
  stringArrayEncoding: 'base64',
  stringArrayThreshold: 0.3,
  rotateStringArray: true,
  identifierNamesGenerator: 'hexadecimal',
  sourceMap: false,
  renameGlobals: false
};

var obfuscatorScriptInPages = function () {
  return onCompile(['./src/assets/js/*.js', './src/assets/js/!(vendor)/**/*.js'], 'assets/js-obfuscator')
    .pipe(javascriptObfuscator(optionsJavascriptObfuscator))
    .pipe(gulp.dest('./build/assets/js-obfuscator/'))
    .on('end', function () {
      console.log('All scripts were obfuscator.');
    });
};

module.exports = {
  mintopjs: mintopjs,
  concat: concatScripts,
  copy: copyScriptTask,
  compress: compileScriptsTask,
  obfuscatorScriptInPages: obfuscatorScriptInPages,
}

// function (dir, cb) {
//   outputDir = dir
//   taskCallback = cb


// }