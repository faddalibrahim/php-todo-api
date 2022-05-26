# PHP API for a todo application

vanilla php (with pdo) + mysql api for a todo application

## Routes

**GET**

| route               | action                                          |
| ------------------- | ----------------------------------------------- |
| /todos              | fetch all todos                                 |
| /todos?id=$id       | fetch todo with the correspong id               |
| /todos?search=$term | fetch all todos with the correspong search term |

**POST**

| route  | action        |
| ------ | ------------- |
| /todos | create a todo |

**PATCH / PUT**

| route  | action                                             |
| ------ | -------------------------------------------------- |
| /todos | update/patch todo with corresponding id in payload |

**DELETE**

| route  | action                                       |
| ------ | -------------------------------------------- |
| /todos | delete todo with corresponding id in payload |

## Checklists

- [x] versioning
- [x] health route

- [x] status codes
- [x] autoloader
- [x] swagger docs
- [x] .htaccess file
- [x] .env
- [x] error handling

- [x] composer

## Tips

[how to design better apis](https://r.bluethl.net/how-to-design-better-apis)  
[php proper documentation](https://flaviocopes.com/php-proper-documentation/)  
[document with swagger](https://app.swaggerhub.com/home)  
[document with swagger in php tut](https://www.youtube.com/watch?v=JnjlQBWvDAE)  
[.env](https://www.youtube.com/watch?v=txGL-Ld9zD8)  
[.htaccess long](https://www.youtube.com/watch?v=aU48yQHh9q4)  
[.htaccess short](https://www.youtube.com/watch?v=mD3jrHZ3gUw)  
[.htaccess snippets](https://css-tricks.com/snippets/htaccess/)
