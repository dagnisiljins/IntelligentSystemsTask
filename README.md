# Task Manager Application

This is a simple yet effective Task Manager web application designed and developed by Dagnis Iljins. The application allows users to view, add, and delete tasks, using a PHP backend and a MySQL database for storage.

<img width="400" alt="Screenshot 2024-01-17 at 10 08 40" src="https://github.com/dagnisiljins/IntelligentSystemsTask/assets/140745133/b5bde40c-a63b-4761-97b8-8b4e1d069af1">


## Features

- **View Tasks**: Lists all the tasks that are currently stored in the database.
- **Add New Tasks**: Includes a form to add new tasks, specifying task name and description.
- **Delete Tasks**: Each task has an associated delete option to remove tasks from the list.

## Prerequisites

Before installing the application, ensure you have the following:
- PHP (version 7.3 or higher recommended)
- MySQL (version 5.7 or higher recommended)

## Installation

To set up this application, you'll need to have PHP and MySQL installed on your server. Follow these steps to get started:

1. **Clone the Repository**: First, clone this repository to your local machine or server using the following command:

    ```
    git clone https://github.com/dagnisiljins/IntelligentSystemsTask.git
    ```

2. **Database Setup**:
   
To set up the database for the Task Manager application, follow these steps:

2.1. **Create the Database**:
   - First, create a MySQL database named `task_manager`.
   - You can do this via your MySQL client or command line:
     ```sql
     CREATE DATABASE task_manager;
     ```

2.2. **Import the Database Schema**:
   - Use the `task_manager_schema.sql` file to create the `tasks` table with the correct structure.
   - Execute the following command in your MySQL command line:
     ```bash
     mysql -u root -p task_manager < path/to/task_manager_schema.sql
     ```
   - If your MySQL `root` user doesn't have a password, you can omit the `-p`.

This will set up the necessary table structure within your `task_manager` database, as defined in the `task_manager_schema.sql` file.

3. **Configuration**: Update the database connection settings in the PHP files with your MySQL server details.

4. **Run the Application**: Host the files on a PHP-enabled server and access the application through the server's address.
