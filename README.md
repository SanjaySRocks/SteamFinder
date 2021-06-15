# SteamFinder
A Steam Finder which search for all possible formats and get the steam details

http://findmysteam.herokuapp.com/
## Deployment

To deploy this project run

```bash
  sudo apt install curl php-cli php-mbstring git unzip
  apt install composer
  git clone https://github.com/SanjaySRocks/SteamFinder.git
  cd SteamFinder
  composer install
  cp .env.example .env
  php artisan key:generate
  php artisan serve
```

  
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`STEAM_API_KEY`

To get the api key https://steamcommunity.com/dev/apikey


## Screenshots

![App Screenshot](https://github.com/SanjaySRocks/SteamFinder/screenshot/s1.png)
![App Screenshot](https://github.com/SanjaySRocks/SteamFinder/screenshot/s2.png)
  


## Authors

- [@sanjaysrocks](https://www.github.com/sanjaysrocks)

  
## Support

This app was created for fun not to be used for production enviroment.
  
