# SteamFinder
A Steam Finder which search for all possible formats and get the steam details

Feel free to contribute this open source project.

http://findmysteam.herokuapp.com/
## Deployment

To deploy this project run

Minimum requirement to run this app: php7.4 

```bash
  apt -y install php7.4 php7.4-{bcmath,bz2,intl,gd,mbstring,mysql,zip,gmp,dom,fpm}
  apt install composer
  git clone https://github.com/SanjaySRocks/SteamFinder.git
  cd SteamFinder
  composer install
  cp .env.example .env
  php artisan key:generate
  chmod -R 777 storage
```

Apache2 config
```bash
<VirtualHost *:80>
        ServerName localhost
        ServerAlias www.steamfinder.in
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/path/to/gitfolder/SteamFinder/public/

        <Directory "/var/www/html/path/to/gitfolder/SteamFinder/public">
        Allowoverride All
        </Directory>

</VirtualHost>
```
  
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`STEAM_API_KEY`

To get the api key https://steamcommunity.com/dev/apikey


## Screenshots

![App Screenshot](https://github.com/SanjaySRocks/SteamFinder/blob/main/screenshots/s1.png)
![App Screenshot](https://github.com/SanjaySRocks/SteamFinder/blob/main/screenshots/s2.png)
  


## Authors

- [@sanjaysrocks](https://www.github.com/sanjaysrocks)

  
## Support

This app was created for fun not to be used for production enviroment.
  
