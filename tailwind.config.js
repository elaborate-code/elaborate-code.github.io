module.exports = {
    content: require("fast-glob").sync([
        "source/**/*.blade.php",
        "source/**/*.md",
        "source/**/*.html",
    ]),
    theme: {
        extend: {
            colors: {
                "primary-1": "#103778",
                "primary-2": "#151F30",
                "secondary-1": "#FF7A48",
                "secondary-2": "#E3371E",
                terciary: "#0593A2",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
