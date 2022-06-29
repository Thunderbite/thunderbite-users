# Thunderbite Users

Manage internal users for Thunderbite easily with cli

## Installation

Add this private repo to your `composer.json`

```json
{
  "repositories": [
    {
      "type": "github",
      "url": "https://github.com/Thunderbite/thunderbite-users"
    }
  ]
}
```

You can install the package via composer:

```bash
composer require thunderbite/thunderbite-users
```
## Usage

### Invite new user

```bash
php artisan thunderbite:user-invite --name="Rohan Sakhale" --email="rohan@thunderbite.com" --level="Admin"
```

### Remove existing user

```bash
php artisan thunderbite:user-remove --email="rohan@thunderbite.com"
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Rohan Sakhale](https://github.com/RohanSakhale)
- [Thunderbite](https://github.com/Thunderbite)
- [All Contributors](../../contributors)
