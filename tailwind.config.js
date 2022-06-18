module.exports = {
    content: require("fast-glob").sync([
        "source/**/*.blade.php",
        "source/**/*.md",
        "source/**/*.html",
    ]),
    theme: {
        extend: {
            fontFamily: {
                raleway: ["Raleway", "sans-serif"],
                merriweather: ["Merriweather Sans", "sans-serif"],
                "yeseva-one": ["Yeseva One", "cursive"],
            },
            colors: {
                "bloodmyst-isle": {
                    light: "#fccece",
                    DEFAULT: "#F22929",
                    dark: "#600505",
                },
                "firecracker-salmon": {
                    light: "#fbcfcf",
                    DEFAULT: "#F26363",
                    dark: "#5e0707",
                },
                "frozen-blue": {
                    50: "#f6f9fb",
                    DEFAULT: "#A3C4D9",
                    dark: "#1d3748",
                },
                nero: {
                    DEFAULT: "#262626",
                },
                "white-smoke": {
                    DEFAULT: "#F2F2F2",
                },
            },
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