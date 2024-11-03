# Cambizs Solicitor Project

This project is a front-end build setup for the Cambizs Solicitor website, using Gulp for task automation. It includes tools for compiling Sass, optimizing files, and live-reloading during development.

## Features

-   **Sass Compilation**: Compiles SCSS files to CSS.
-   **BrowserSync**: Provides live-reloading during development.
-   **File Optimization**: Minifies CSS, JavaScript, and other files for production.
-   **Modular Structure**: Organized with a task-based Gulp setup for easy maintenance and scalability.

## Prerequisites

-   **Node.js**: Make sure you have [Node.js](https://nodejs.org/) installed.
-   **Ruby**: Required to use some Sass packages. Download it from [Ruby Installer](https://rubyinstaller.org/).
-   **Gulp CLI**: You can install Gulp globally if it's not already installed:

    ```bash
    npm install -g gulp-cli
    ```

## Getting Started

### 1. Clone the Repository

Clone the project repository to your local machine:

```bash
git clone https://github.com/yourusername/cambizs-solicitor.git
cd cambizs-solicitor
```

### 2. Install Dependencies

Install the necessary npm packages:

```
npm install
```

### 3. Install Ruby and Sass

If you don't already have Ruby installed, download it from Ruby Installer.

After installing Ruby, install the Sass package:

```
gem install sass
```

### 4. Run Gulp Tasks

To start development with live-reloading:

```
gulp
```

This command will:

-   Clean the dist directory.

-   Compile SCSS files from resources/scss to minified CSS files in public/assets/css.

-   Minify JavaScript files from resources/js to public/assets/js.

-   Copy and optimize images from resources/images to public/assets/images.

-   Copy and optimize vendor files from resources/vendors to public/assets/vendors.

-   Start a local server with BrowserSync for live-reloading.

### 5. Build for Production

To build and optimize files for production:

```
gulp
```

This command performs the same tasks as above, ensuring all files are optimized for deployment.

### Gulp Task Structure

The Gulp tasks are organized to process files from the resources folder and output them to the public folder. Here’s a breakdown of the main tasks:

-   cleanInit: Deletes the dist directory to start with a clean state.
-   bootstrapSCSSInit: Compiles Bootstrap SCSS files, autoprefixes, and minifies them.
-   customSCSSInit: Compiles custom SCSS files, autoprefixes, and minifies them.
-   imagesInit: Copies images from resources/images to public/assets/images.
-   jsInit: Minifies JavaScript files from resources/js to public/assets/js.
-   vendorsInit: Processes vendor CSS, JS, images, and fonts.

## File Structure

-   resources/ - Contains source files to be processed by Gulp.

-   scss/ - SCSS files for stylesheets.

-   js/ - JavaScript files.

-   images/ - Image assets.

-   vendors/ - Third-party CSS, JS, and fonts.

-   public/ - Contains processed files ready for deployment.

-   assets/css/ - Compiled and minified CSS files.
-   assets/js/ - Minified JavaScript files.
-   assets/images/ - Optimized images.
-   assets/vendors/ - Minified and optimized vendor files.

## Troubleshooting

If you encounter issues with Gulp not running, ensure all prerequisites are installed.

Make sure Ruby is installed and available in your system's PATH if you need to use Ruby Sass.

If you encounter errors with certain plugins, try reinstalling them with npm install.

## Additional Notes

To modify the local server's proxy URL, update the proxy option in the browserSyncInit task in the gulpfile.cjs.

Customize paths in the gulpfile.cjs to suit your project's file structure if needed.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

This README provides a clear, step-by-step guide for setting up and running the project, a
