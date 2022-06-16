const mix = require("laravel-mix");
require("laravel-mix-jigsaw");

mix.disableSuccessNotifications();
mix.setPublicPath("source/assets/build");

mix.jigsaw()
    .js("source/_assets/js/main.js", "js")
    .copy(
        "source/_assets/json/particles.json",
        "source/assets/build/json/particles.json"
    )
    .postCss("source/_assets/css/main.css", "css", [
        require("postcss-import"),
        require("tailwindcss"),
    ])
    .options({
        processCssUrls: false,
    })
    .version();
