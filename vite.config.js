import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/css/app.css",
                "resources/css/bootstrap.min.css",
                "resources/css/style.css",
                "resources/css/responsive.css",
                "resources/css/custom.css",
                "resources/lib/animate/animate.min.css",
                "resources/lib/owlcarousel/assets/owl.carousel.min.css",
                "resources/lib/owlcarousel/assets/owl.theme.green.css",

                "resources/js/app.js",
                "resources/js/bootstrap.bundle.min.js",
                "resources/js/main.js",
                "resources/js/bootstrap.js",
                "resources/lib/wow/wow.min.js",
                "resources/lib/easing/easing.min.js",
                "resources/lib/waypoints/waypoints.min.js",
                "resources/lib/counterup/counterup.min.js",
                "resources/lib/owlcarousel/owl.carousel.min.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": "/resources",
        },
    },
    // Define where to output built assets
    build: {
        outDir: "public/build",
        emptyOutDir: true,
        sourcemap: true,
    },
});
