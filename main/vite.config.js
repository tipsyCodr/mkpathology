import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/app.js", "resources/css/app.css"],
            refresh: true,
        }),
        // Serve static assets from the correct public directory
        {
            name: "public-dir",
            configureServer(server) {
                server.middlewares.use((req, res, next) => {
                    if (req.url.startsWith("/build/")) {
                        req.url = `/../public${req.url}`;
                    }
                    next();
                });
            },
        },
    ],
    // Define where to output built assets
    build: {
        outDir: "../public/build",
        emptyOutDir: true,
    },
});
