/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#0E5CA9",
                secondary: "#EB6A28",
                biru: "#2C2A6B",
            },
        },
        container: {
            center: true,
            padding: "16px",
        },
    },
    plugins: [],
};
