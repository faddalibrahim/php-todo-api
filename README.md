# PHP API for a todo application

vanilla php (with pdo) + mysql api for a todo application

## Routes

**GET**

| route         | action                            |
| ------------- | --------------------------------- |
| /todos        | fetch all todos                   |
| /todos?id=$id | fetch todo with the correspong id |

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

## Important checklists

- [x] versioning
- [ ] health route
