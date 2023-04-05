# Symfony 6, development and deploy stack

*Keywords: Symfony 6.2, PHP8.2, Apache 2.4, Postgres 15.2, Docker, Redis, PHPStan (with Doctrine support), PHPUnit, ECS*

### Init application on localhost
```sh
$ cd docker
$ docker compose up
```

### Config files
| Path | Usage |
| ------ | ------ |
|./.env| build env variables for build via docker-compose|
|./app/.env| app env variables for local development|
|./app/.env.test| app env variables for test development|

```
Run composer commands / symfony commands in webroot directory in PHP container:
```sh
$ composer ci       <-- all
$ composer tests    <-- tests
$ composer ecs      <-- code style check
$ composer ecs-fix  <-- code style check + fix
$ composer phpstan  <-- phpstan (level 7)
$ bin/console       <-- classic Symfony console
```

## Push docker images to GitHub registry
### Enable docker container registry for your account
1. go to https://github.com/settings/tokens and generate new token for "repo", "write:packages", "read:packages"
2. on github.com click to your account -> *Feature preview* and click to "Enable"

#### Acces to github private registry from localhost
On your localhost run command (as password paste token from first step):
```sh
$ docker login ghcr.io -u [github_username]
```
