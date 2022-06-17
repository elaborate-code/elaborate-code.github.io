module.exports = {
    content: require("fast-glob").sync([
        "source/**/*.blade.php",
        "source/**/*.md",
        "source/**/*.html",
    ]),
    theme: {
        extend: {
            colors: {},
            backgroundImage: {
                "hero-image": "url('/assets/images/hero-bg.jpg')",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
