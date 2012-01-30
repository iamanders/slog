# Helper class for printing to console when using PHP 5.4 built in webserver

## Install:

```PHP
include('slog.php');
```

## Using:

```PHP
slog::get_instance()->info('This is an example!');
//Outputs in console: [Sun Jan 29 18:56:12 2012] INFO: This is an example!
slog::get_instance()->warning('This is an warning!');
slog::get_instance()->error('This is an error!');
```
