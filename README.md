# Task Manager Application

This is a simple yet effective Task Manager web application designed and developed by Dagnis Iljins. The application allows users to view, add, and delete tasks, using a PHP backend and a MySQL database for storage.

## Features

- **View Tasks**: Lists all the tasks that are currently stored in the database.
- **Add New Tasks**: Includes a form to add new tasks, specifying task name and description.
- **Delete Tasks**: Each task has an associated delete option to remove tasks from the list.

## Installation

To set up this application, you'll need to have PHP and MySQL installed on your server. Follow these steps to get started:

1. **Clone the Repository**: First, clone this repository to your local machine or server using the following command:

    ```
    git clone https://github.com/dagnisiljins/IntelligentSystemsTask.git
    ```

2. **Database Setup**:
    - Create a MySQL database named `task_manager`.
    - Create a table named `tasks` with the following structure:
        - `id` (auto-incremented)
        - `task_name` (VARCHAR)
        - `task_description` (TEXT)
        - `created_at` (DATETIME)

   You can use the following SQL command to set up the table:

    ```sql
    CREATE TABLE tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        task_name VARCHAR(255) NOT NULL,
        task_description TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    ```

3. **Configuration**: Update the database connection settings in the PHP files with your MySQL server details.

4. **Run the Application**: Host the files on a PHP-enabled server and access the application through the server's address.
