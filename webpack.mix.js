const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue()

    .js('resources/plugins/global/plugins.bundle.js', 'public/plugins/global/')
    .js('resources/plugins/custom/prismjs/prismjs.bundle.js', 'public/plugins/custom/prismjs/')
    .js('resources/js/scripts.bundle.js', 'public/js/')
    .js('resources/plugins/custom/fullcalendar/fullcalendar.bundle.js', 'public/plugins/custom/fullcalendar/')

    .js('resources/js/adapter-latest.js', 'public/js/')
    .js('resources/js/RecordRTC.js', 'public/js/')
    .js('resources/js/gif-recorder.js', 'public/js/')
    .js('resources/js/getScreenId.js', 'public/js/')
    .js('resources/js/DetectRTC.js', 'public/js/')
    .js('resources/js/socket.io.js', 'public/js/')

    /* Theme Pages Scripts */
    .js('resources/js/pages/widgets.js', 'public/js/pages')
    .js('resources/js/pages/custom/login/login-general.js', 'public/js/pages')
    .js('resources/js/pages/crud/forms/widgets/select2.js', 'public/js/pages')
    .js('resources/js/pages/crud/forms/widgets/input-mask.js', 'public/js/pages')
    .js('resources/js/pages/custom/projects/add-project.js', 'public/js/pages')
    .js('resources/js/pages/crud/forms/widgets/form-repeater.js', 'public/js/pages')
    .js('resources/js/pages/crud/forms/editors/summernote.js', 'public/js/pages')
    .js('resources/js/pages/crud/forms/widgets/clipboard.js', 'public/js/pages')

    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])

    /* Theme Plugins */
    .postCss('resources/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css', 'public/plugins/custom/fullcalendar/', [])
    .postCss('resources/plugins/global/plugins.bundle.rtl.css', 'public/plugins/global/', [])
    .postCss('resources/plugins/custom/prismjs/prismjs.bundle.rtl.css', 'public/plugins/custom/prismjs/', [])
    .postCss('resources/css/style.bundle.rtl.css', 'public/css', [])
    .postCss('resources/css/all.css', 'public/css', [])

    /* Theme Pages Styles */
    .postCss('resources/css/pages/login/login-2.rtl.css', 'public/css/pages/', [])
    .postCss('resources/css/pages/wizard/wizard-1.rtl.css', 'public/css/pages/', [])

    /* Theme Files */
    .postCss('resources/css/themes/layout/header/base/light.rtl.css', 'public/css/header/base/', [])
    .postCss('resources/css/themes/layout/header/menu/light.rtl.css', 'public/css/header/menu/', [])
    .postCss('resources/css/themes/layout/brand/dark.rtl.css', 'public/css/brand/', [])
    .postCss('resources/css/themes/layout/aside/dark.rtl.css', 'public/css/aside/', []).version()
    ;