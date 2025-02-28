# user-admin-php
Admin dashboard for users using codeigniter 3

# How to run - Development

This project uses .devcontainer and docker to run a development environment. Follow these steps to run your project:

1. Install the devcontainer vscode extension;
2. Run the "dev containers: reopen in a container" command;
3. Wait for the build to finish;
4. Run the "composer install" command;
5. Run the following command to run the project on port 8080:
```bash
php -S localhost:8080
```

Now the project is running on http://localhost:8080/.

## Import database

The database and data are in the /db path.

db.sql - Is the main file that build the database.
data.sql - Has the user data, the default password for the users is "123"
