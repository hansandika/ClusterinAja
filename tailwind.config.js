const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                black: {
                    50: "#F7F7F8",
                    100: "#DDDDDF",
                    200: "#A9A9AD",
                    300: "#8E8E93",
                    400: "#636366",
                    500: "#48484A",
                    600: "#3A3A3C",
                    700: "#2C2C2E",
                    800: "#1A1C1E",
                },
                blue: {
                    100: "#F0F7FF",
                    200: "#CCE4FF",
                    300: "#99CAFF",
                    400: "#66AFFF",
                    500: "#3395FF",
                    600: "#007AFF",
                    700: "#0062CC",
                    800: "#004999",
                },
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
