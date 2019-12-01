
## System requirements

For local application starting (for development) make sure that you have locally installed next applications:

- `docker >= 18.0` _(install: `curl -fsSL get.docker.com | sudo sh`)_
- `docker-compose >= 1.22` _([installing manual][install_compose])_
- `make >= 4.1` _(install: `apt-get install make`)_

## Used services

This application uses next services:

- Redis (cache, internal queue)
- PostgreSQL (data storage)
- PHP FPM
- nginx

Declaration of all services can be found into `./docker-compose.yml` file.

## Work with application

Most used commands declared in `./Makefile` file. For more information execute in your terminal `make help`.

After application starting you can open [127.0.0.1:9999](http://127.0.0.1:9999/) in your browser.

### Fast application starting

Just execute into your terminal next commands:

```bash
$ git clone https://github.com/arkazas/airplanes.git ./airplanes && cd $_
$ make init
```