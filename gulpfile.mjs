import gulp from 'gulp';
import gulpSass from 'gulp-sass';
import dartSass from 'sass';
import uglify from 'gulp-uglify-es';
import postcss from 'gulp-postcss';
import tailwind from 'tailwindcss';
import postcssImport from 'postcss-import';
import webp from 'gulp-webp';
import clean from 'gulp-clean';
import replace from 'gulp-replace';

const compileSass = gulpSass(dartSass);
const uglifyEs = uglify.default;
const path = './dist/';

gulp.task('clean', function () {
  return gulp.src('dist', { read: false, allowEmpty: true }).pipe(clean());
});

gulp.task('html', function () {
  return gulp.src('./src/**/*.php').pipe(gulp.dest(path));
});

gulp.task('styles', function () {
  return gulp
    .src('src/sass/style.scss')
    .pipe(compileSass().on('error', compileSass.logError))
    .pipe(compileSass({ outputStyle: 'compressed' }))
    .pipe(postcss([postcssImport, tailwind]))
    .pipe(replace(/-(webkit|moz)-[^;{}]+;?/g, '')) // Remove all -webkit- and -moz- properties
    .pipe(replace(/:-moz-[^,{]+,?/g, '')) // Remove all :-moz- pseudo-classes
    .pipe(replace(/:\s*{\s*[^}]*}/g, '')) // Remove orphaned pseudo-classes (fixes :{ outline: auto; })
    .pipe(replace(/::\s*{\s*[^}]*}/g, '')) // Remove orphaned pseudo-elements with leftover properties
    .pipe(replace(/::\s*{\s*}/g, '')) // Remove empty pseudo-elements
    .pipe(replace(/:\s*$/gm, '')) // 🔥 Final fix: Remove standalone orphaned `:` at end of lines
    .pipe(replace(/\n\s*\n/g, '\n')) // 🧹 Remove extra blank lines
    .pipe(gulp.dest(path));
});

gulp.task('js', function () {
  return gulp
    .src('src/**/*.js')
    .pipe(
      uglifyEs({
        compress: {
          global_defs: {
            DEBUG: process.env.DEBUG || false
          }
        }
      })
    )
    .pipe(gulp.dest(path));
});

gulp.task('json', function () {
  return gulp.src('src/**/*.json').pipe(gulp.dest(path));
});

gulp.task('images', function () {
  return gulp
    .src('src/img/*.{jpg,jpeg,png}', { encoding: false, allowEmpty: true })
    .pipe(webp())
    .pipe(gulp.dest(`${path}img`));
});

// Watch tasks - only for local development
gulp.task('watch', function () {
  gulp.watch('src/**/*.php', gulp.series('html', 'styles'));
  gulp.watch('src/**/*.scss', gulp.series('styles'));
  gulp.watch('src/**/*.js', gulp.series('js'));
  gulp.watch('src/**/*.json', gulp.series('json'));
  gulp.watch('src/img/*', gulp.series('images'));
});

// Run tasks - local development (with watch)
gulp.task(
  'default',
  gulp.series('clean', gulp.parallel('watch', 'html', 'styles', 'js', 'json', 'images'))
);

// Run tasks - build for deployment (without watch)
gulp.task('deploy', gulp.series('clean', gulp.parallel('html', 'styles', 'js', 'json', 'images')));
