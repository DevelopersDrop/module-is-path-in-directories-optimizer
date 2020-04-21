# Drop_IsPathInDirectoriesOptimizer
A Magento 2 module that backport to Magento 2.2 of MAGETWO-96314: Fix performance on MAGETWO-81469 commit

## Installation
- Install module through composer (recommended):
```sh
$ composer config repositories.drop.mipido vcs https://github.com/DevelopersDrop/module-is-path-in-directories-optimizer
$ composer require drop/module-is-path-in-directories-optimizer
```

- Install module manually:
    - Copy these files in app/code/Drop/IsPathInDirectoriesOptimizer/

- After installing the extension, run the following commands:
```sh
$ php bin/magento module:enable Drop_IsPathInDirectoriesOptimizer
$ php bin/magento setup:upgrade
$ php bin/magento setup:di:compile
$ php bin/magento setup:static-content:deploy
$ php bin/magento cache:clear
```

## Requirements
- PHP >= 7.0.0

## Compatibility
- Magento >= 2.2
- Not tested on 2.1 and 2.0

## Support
If you encounter any problems or bugs, please create an issue on [Github](https://github.com/DevelopersDrop/module-is-path-in-directories-optimizer/issues) 

## License
[GNU General Public License, version 3 (GPLv3)] http://opensource.org/licenses/gpl-3.0

## Copyright
(C) 2019 Drop S.R.L.
