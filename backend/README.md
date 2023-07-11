# Bookeend

Overviews
This is an overview of the Bookeeng API documentation. Throughout this document you can various of API method with each separated functional which are being used to provide the data to the front-end.

## API Documentations

-   [Register](#register)
-   [Login & Logout](#Login&Logout)

### Auth

| METHOD |    Description    |          Route |
| :----- | :---------------: | -------------: |
| POST   | Register new user | /auth/register |
| POST   |    Login user     |    /auth/login |
| POST   |    Logout user    |   /auth/logout |
|        |                   |                |
|        |                   |                |
|        |                   |                |
|        |                   |                |

#### **Register**

To bind the and validate the password with confirmation, the `confirmation_password` are needed to include in the front end int order to validate.

Data input for the register :

```php
        [
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'title' => $request['title'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'account_type' => $request['account_type'],
            'password' => $request['password'],
        ]
```

#### **Login&Logout**

Login request contain the values of `email` and `password`, which take the request form of post method. While as Login can be access publicaly, the `logout` can only access when the user is signed in with the token.
