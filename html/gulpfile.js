//Hi, This is our main framework for our sites. This gulp files was Build October 23, 2016.
//If you have any question contact your project manager. This files are not released to final client. Final client we only provide the "build folder"

//We defined the variables of plugins that we used on our project. 
var gulp = require('gulp')
var postcss = require('gulp-postcss')
var rucksack = require('rucksack-css')
var cssnext = require('postcss-cssnext')
var cssnested = require('postcss-nested')
var mixins = require('postcss-mixins')
var pxtoem = require('postcss-px-to-em')
var lost = require('lost')
var atImport = require('postcss-import')
var csswring = require('csswring')
var mqpacker = require('css-mqpacker')
var pug = require('gulp-pug')
var gulpif = require('gulp-if')
var useref = require('gulp-useref')
var uglify = require('gulp-uglify')
var imagemin = require('gulp-imagemin')
var htmlmin = require('gulp-htmlmin')
var cleanCSS = require('gulp-clean-css')
var cache = require('gulp-cache')
var browserSync = require('browser-sync').create()


//We create the server with browserSync, dev server.
gulp.task('serve', function(){
    browserSync.init({
        server: {
            baseDir: './app'
        }
    })
})

gulp.task('build-serve', function(){
    browserSync.init({
        port : 8080,
        server: {
            baseDir: './build'
        }
    })
})

//We compress our PostCSS to one final css
gulp.task('css', function(){
    var processor = [
        atImport(),
        mixins(),
        cssnested,
        lost(),
        rucksack(),
        pxtoem({base: 16}),
        cssnext({browsers: ['> 5%', 'ie 8']}),
        mqpacker,
        csswring()
    ]
    return gulp.src('./app/postcss/main.css')
        .pipe(postcss(processor))
        .pipe(gulp.dest('./app/css'))
        .pipe(browserSync.stream())
})

//We compress our Pug Files to real html files
gulp.task('pug', function () {
  return gulp
    .src('./app/pug/*.pug')
    .pipe(pug({pretty: true}))
    .pipe(gulp.dest('./app'))
    .pipe(browserSync.stream())
})

//Part of Build Task, we compress all the .js and .css files
gulp.task('compress', function () {
  gulp.src('app/*.html')
    .pipe(useref())
    .pipe(gulpif('*.js', uglify()))
    .pipe(gulpif('*.css', cleanCSS()))
    .pipe(gulp.dest('./build'))
})

gulp.task('html-build', function () {
  gulp.src('build/*.html')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('./build'))
})

//Part of Build Task, we optimize and move images.
gulp.task('images', function () {
  return gulp.src('app/img/**/*.+(png|jpg|jpeg|gif|svg)')
  .pipe(cache(imagemin({
    interlaced: true
  })))
  .pipe(gulp.dest('build/img'))
})

//Task Watch
gulp.task('watch', function(){
    gulp.watch('./app/postcss/**/*.css', ['css'])
    gulp.watch('./app/pug/**/*.pug', ['pug'])
})

//Final Tasks
gulp.task('default', ['watch', 'pug', 'css', 'serve'])
gulp.task('build', ['compress', 'images', 'html-build', 'build-serve'])


