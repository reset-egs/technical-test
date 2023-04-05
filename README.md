
# Room reservation system

This project was created based on requirements given by SafeJournal and is a simple room reservation system for a hotel. It utilizes the MVC pattern and is built with Laravel, Eloquent, SQLite and Vue.js


## Installation

The project has to be installed with Node package manager to install all necessary dependencies and packages.

```bash
  npm install
```

After that, the Vite development server can be run using:
```bash
  npm run dev
```
Finally, the following commands can be ran to finish the installation:
```bash
  composer install
  php artisan serve
```
There is a SQLite database in the directory, but the path to it needs to be changed to the absolute path of the respective system in the .env file.
If for some reason this doesn't work, one can generate a new database using the following commands:
```bash
  php artisan key:generate
  php artisan migrate
  php artisan serve
```
## Authors

- Szymon Zwara - student at Zealand [@reset-egs](https://www.github.com/reset-egs) 

