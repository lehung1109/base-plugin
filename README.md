# PLUGIN TEMPLATE FOR WORDPRESS PLUGIN

##INSTALLATION
1. Replace all base-plugin, BasePlugin and rename BasePlugin.php to your plugin name
2. ```composer install```
3. ```composer dumpautoload -o```
4. ```npm install```
5. ```npm run start:css``` - for watching css files
6. ```npm run start:js``` - for watching js files
7. ```npm run build``` - for build files for production

## STRUCTURE
- **assets**: containing css and js files
- **dist**: containing css and js files for production
- **src**: for include file
- **views**: for template files