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

| route         | action                                  |
| ------------- | --------------------------------------- |
| /todos?id=$id | update/patch todo with corresponding id |

**DELETE**

| route         | action                            |
| ------------- | --------------------------------- |
| /todos?id=$id | delete todo with corresponding id |

## Important checklists

- [ ] versioning
- [ ] health route
