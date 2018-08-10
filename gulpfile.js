let gulp        = require('gulp');
let browserSync = require('browser-sync').create();
let sass        = require('gulp-sass');

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "/Applications/MAMP/htdocs/outilSav/web/app_dev.php"
    });

    gulp.watch("src/SAV/ProcessBundle/Resources/sass/*.scss", ['sass']).on('change', browserSync.reload);
    gulp.watch("src/SAV/**/Resources/views/**/*.html.twig").on('change', browserSync.reload);
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:8888/outilSav/web/app_dev.php"
    });

    gulp.watch("src/SAV/ProcessBundle/Resources/public/css/*.css").on('change', browserSync.reload);
    gulp.watch("src/SAV/**/Resources/views/**/*.html.twig").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("src/SAV/ProcessBundle/Resources/sass/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("src/SAV/ProcessBundle/Resources/public/css"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);