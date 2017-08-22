# Camagru
Non, c'est pas vrai, je fais pas du php

## Documentation
- [CLI builtin server](http://php.net/manual/en/features.commandline.webserver.php)
- [PHP PDO ??](http://php.net/manual/en/book.pdo.php)
- [Canvas handling webcam stream JS](https://developer.mozilla.org/fr/docs/Web/API/HTMLCanvasElement/getContext) && [Github example](https://github.com/codepo8/interaction-cam)

## Setup
- Setup db
```bash
$> make setup
```

- Drop db
```bash
$> make drop
```

## Routes
#### GET
- `/`
- `/galery`

#### POST
- `/register`
- `/login`
- `/logout`
- `/last_pictures`
- `/comment`
- `/like`
- `/picture`

#### TODO
- Design project structure
- Write down whole db schema
- Handle MySQL request with a beautiful wrapper (create/read/update/delete functions)
- Is MySQL easy to install ?
- Handle setup file or makefile with db creation / seed / drop
- Mails via specific controller (reinit pwd & account confirmation)

#### DB Models
> **User**
> - id (*integer*) -> unique
>  - username (*string*) -> unique
> - email (*string*) -> unique
> - password (*string*)
> - confirmed (*boolean*)
> - token (*string*)
> - expired_at (*date*)
 
> **Picture**
> - id (*integer*) -> unique
> - data (*binary*)

> **Like**
> - user_id (*integer*)
> - picture_id (*integer*)
> - user_id X picture_id -> unique

> **Comment**
> - user_id (*integer*)
> - picture_id (*integer*)
> - data (*text*)
