const path = require('path');

module.exports = {
    mode: 'production',
    entry: {
        admin: './assets/admin/js/index.react.js',
        frontend: './assets/frontend/js/index.react.js',
    },
    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'dist'),
    },
    module: {
        rules: [
            {
                test: /\.react\.js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env', '@babel/preset-react'],
                        minified: true,
                        comments: false,
                        ignore: [
                            "./assets/vendor",
                            "./assets/admin/components",
                            "./assets/frontend/components",
                            "./assets/images"
                        ]
                    }
                }
            }
        ]
    }
};