"use strict";

/*
<--!----------------------------------------------------------------!-->
<--! Gulp Modules !-->
<--!----------------------------------------------------------------!-->
*/
const { src, dest, series, parallel, watch } = require("gulp");
//const lodash = require("lodash");
const clean = require("gulp-clean");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const concat = require("gulp-concat");
//const rtlcss = require("gulp-rtlcss");
const jsonmin = require("gulp-jsonmin");
const cleanCSS = require("gulp-clean-css");
const sourcemaps = require("gulp-sourcemaps");
const mergeStream = require("merge-stream");
const beautify = require("gulp-jsbeautifier");
const fileinclude = require("gulp-file-include");
const autoprefixer = require("gulp-autoprefixer");
const sass = require("gulp-sass")(require("sass"));
const browserSync = require("browser-sync").create();

/*
<--!----------------------------------------------------------------!-->
<--! Clean !-->
<--!----------------------------------------------------------------!-->
*/
function cleanInit() {
    return src("dist/", { read: false, allowEmpty: true })
        .pipe(clean({ force: true }))
        .pipe(dest("dist/"));
}

/*
<--!----------------------------------------------------------------!-->
<--! Bootstrap SCSS !-->
<--!----------------------------------------------------------------!-->
*/
function bootstrapSCSSInit() {
    var requiredBootstrapSCSS = ["resources/scss/bootstrap/bootstrap.scss"];
    const bootstrapSCSSStreamInit = src(requiredBootstrapSCSS)
        .pipe(sourcemaps.init())
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(rename({ suffix: ".min" }))
        .pipe(sourcemaps.write("./"))
        .pipe(dest("public/assets/css/"));
    return mergeStream(bootstrapSCSSStreamInit);
}

/*
<--!----------------------------------------------------------------!-->
<--! Custom SCSS !-->
<--!----------------------------------------------------------------!-->
*/
function customSCSSInit() {
    var requiredCustomSCSS = ["resources/scss/theme.scss"];
    const customSCSSStreamInit = src(requiredCustomSCSS)
        .pipe(sourcemaps.init())
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(rename({ suffix: ".min" }))
        .pipe(sourcemaps.write("./"))
        .pipe(dest("public/assets/css/"));
    return mergeStream(customSCSSStreamInit);
}

/*
<--!----------------------------------------------------------------!-->
<--! Images !-->
<--!----------------------------------------------------------------!-->
*/
function imagesInit() {
    // required theme images
    var requiredThemeImages = ["resources/images/**/*"];
    const themeImageInit = src(requiredThemeImages).pipe(
        dest("public/assets/images/")
    );
    // merge-stream
    return mergeStream(themeImageInit);
}

/*
<--!----------------------------------------------------------------!-->
<--! JS !-->
<--!----------------------------------------------------------------!-->
*/
function jsInit() {
    // required theme js
    var requiredThemeJS = ["resources/js/**/*.js"];
    const jsThemeInit = src(requiredThemeJS)
        .pipe(rename({ suffix: ".min" }))
        .pipe(uglify())
        .pipe(dest("public/assets/js/"));

    // merge-stream
    return mergeStream(jsThemeInit);
}

/*
<--!----------------------------------------------------------------!-->
<--! Vendors !-->
<--!----------------------------------------------------------------!-->
*/
function vendorsInit() {
    // vendors required css
    var vendorsCSSassets = [
        "resources/vendors/css/animate.css",
        "resources/vendors/css/bsicon.css",
        "resources/vendors/css/feather.css",
        "resources/vendors/css/fontawesome.css",
        "resources/vendors/css/flagicon.css",
        "resources/vendors/css/sweetalert2.css",
    ];
    const vendorsCSS = src(vendorsCSSassets)
        .pipe(sourcemaps.init())
        .pipe(rename({ suffix: ".min" }))
        .pipe(cleanCSS())
        .pipe(concat("vendors.min.css"))
        .pipe(sourcemaps.write("./"))
        .pipe(dest("public/assets/vendors/css/"));
    // vendors required js
    var vendorsJSassets = [
        "resources/vendors/js/jquery.js",
        "resources/vendors/js/jquery-ui.js",
        "resources/vendors/js/moment.js",
        "resources/vendors/js/pace.js",
        "resources/vendors/js/nxlNavigation.js",
        "resources/vendors/js/bootstrap.js",
        "resources/vendors/js/perfect-scrollbar.js",
        "resources/vendors/js/full-screen-helper.js",
        "resources/vendors/js/sweetalert2.js",
    ];
    const vendorsJS = src(vendorsJSassets)
        .pipe(rename({ suffix: ".min" }))
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat("vendors.min.js"))
        .pipe(sourcemaps.write("./"))
        .pipe(dest("public/assets/vendors/js/"));
    // vendors required css copy
    var vendorsCSSassetsCopy = ["resources/vendors/css/**/*"];
    const vendorsCSSCopy = src(vendorsCSSassetsCopy)
        .pipe(sourcemaps.init())
        .pipe(rename({ suffix: ".min" }))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write("./"))
        .pipe(dest("public/assets/vendors/css/"));
    // vendors required js
    var vendorsJSassetsCopy = ["resources/vendors/js/**/*"];
    const vendorsJSCopy = src(vendorsJSassetsCopy)
        .pipe(rename({ suffix: ".min" }))
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write("./"))
        .pipe(dest("public/assets/vendors/js/"));
    // vendors required img
    var vendorsIMGassets = ["resources/vendors/img/**/*.+(png|jpg|gif|svg)"];
    const vendorsIMG = src(vendorsIMGassets).pipe(
        dest("public/assets/vendors/img/")
    );
    // vendors required fonts
    var vendorsFONTassets = [
        "resources/vendors/fonts/*.+(eot|svg|ttf|woff|woff2)",
    ];
    const vendorsFont = src(vendorsFONTassets).pipe(
        dest("public/assets/vendors/fonts/")
    );
    // merge-stream
    return mergeStream(
        vendorsCSS,
        vendorsJS,
        vendorsCSSCopy,
        vendorsJSCopy,
        vendorsIMG,
        vendorsFont
    );
}

/*
<--!----------------------------------------------------------------!-->
<--! BrowserSync !-->
<--!----------------------------------------------------------------!-->
*/
function browserSyncInit(done) {
    browserSync.init({
        proxy: "http://solicitor.dev",
    });
    done();
}
function reloadSyncInit(done) {
    browserSync.reload();
    done();
}

/*
<--!----------------------------------------------------------------!-->
<--! Watch !-->
<--!----------------------------------------------------------------!-->
*/
function watchInit() {
    watch("src/templates/**/*", series(htmlInit, reloadSyncInit)); // watch HTML template files
    watch(
        "resources/scss/bootstrap/**/*",
        series(bootstrapSCSSInit, reloadSyncInit)
    ); // watch bootstrap SCSS files
    watch("resources/scss/themes/**/*", series(customSCSSInit, reloadSyncInit)); // watch custom SCSS files
    watch("resources/images/**/*", series(imagesInit, reloadSyncInit)); // watch images files
    watch("resources/js/**/*", series(jsInit, reloadSyncInit)); // watch js files
    watch("resources/vendors/**/*", series(vendorsInit, reloadSyncInit)); // watch vendors files
}

/*
<--!----------------------------------------------------------------!-->
<--! Run Default {cmd:gulp} !-->
<--!----------------------------------------------------------------!-->
*/
exports.default = series(
    cleanInit,
    series(
        htmlInit,
        bootstrapSCSSInit,
        customSCSSInit,
        imagesInit,
        jsInit,
        vendorsInit,
        parallel(watchInit, browserSyncInit)
    )
);
