### Amal E-learning Platform


## Project Docs

### Project Middleware
    authentificated : let any authentificated user to in
    admin : let only authentificated Admins to in
    student : let only authentificated Studens to in


### Helpers

- AuthHelper 
    - getGuard() : return role of current user (or null in case guest user)
    - loggedUSer() : return current user from corespondent table ( or null in case guest user )