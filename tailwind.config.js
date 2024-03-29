/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Models/*",
    ],
    theme: {
        extend: {
            // backgroundImage: {
            //     "top-banner": "url('/images/homepage-top-banner.png')",
            //     "middle-banner": "url('/images/banner-2.png')",
            // },
            colors: {
                indigo: "#6366f1",
            },
        },
        plugins: [
            // require('@tailwindcss/line-clamp')
        ],
    },
};
