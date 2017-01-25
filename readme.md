# Open Datalab website

## Dépendances

```
composer install
npm install
```

## Configuration

Configurer les fichiers:
* Laravel `.env`
* Angular `resources/app/env.js`

## Base de données

Faire les migrations Laravel:
```
php artisan migrate
```

## Droits UNIX

Ajouter les droits `777` sur les dossiers `bootstrap` et `storage`:
```
chmod -R 777 bootstrap
chmod -R 777 storage
```

## Compilation

Compiler le frontend:
```
Gulp
```
