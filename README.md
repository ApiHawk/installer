<p align="center">
    <img title="AppCell" height="100" src="https://cdn.apihawk.com/welcome-images/appcell.png" />
</p>


<h4> MicroCell is a toolkit for writing AppCell plugins.</h4>


AppCell is an orchestrative software that incorporates a plugin architecture. It allows one software to communicate with multiple other such without coupling, modifying the main software source, or hard-coding plugins. This way the integration of various softwares and the migration of services between such will become faster, more secure and more easily accomplished.

- Built on top of the [Laravel](https://laravel.com) components.
- Optional installation of Laravel [Eloquent](https://laravel-zero.com/docs/database/), Laravel [Logging](https://laravel-zero.com/docs/logging/) and many others.
- Supports interactive [menus](https://laravel-zero.com/docs/build-interactive-menus/) and [desktop notifications](https://laravel-zero.com/docs/send-desktop-notifications/) on Linux, Windows & MacOS.
- Ships with a [Scheduler](https://laravel-zero.com/docs/task-scheduling/) and  a [Standalone Compiler](https://laravel-zero.com/docs/build-a-standalone-application/).
- Integration with [Collision](https://github.com/nunomaduro/collision) - Beautiful error reporting

------

## Documentation

For full documentation, visit [apihawk.com/help](https://www.apihawk.com/en/help/).

## Instalation

microcell is available on composer. To install it, type:

### Via ApiHawk Installer
```bash
composer global require "apihawk/installer"
```

Make sure to place composer's system-wide vendor bin directory in your `$PATH` so the ApiHawk executable can be located by your system. This directory exists in different locations based on your operating system. On macOS and GNU/Linux distributions, it's $HOME/.composer/vendor/bin.

Once installed, the `apihawk new-cell` command will create a fresh MicroCell installation in the directory you specify. For instance, apihawk new-cell YourVendorName will create a directory named YourVendorNameCell containing a fresh MircoCell installation with all of MicroCell's dependencies already installed:
```bash
apihawk new-cell YourVendorName
```

### Via Composer Create-Project
```bash
composer create-project --prefer-dist apihawk/microcell YourVendorName
```
