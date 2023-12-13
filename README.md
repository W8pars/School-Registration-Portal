# School-Registration-Portal
Website built as project using PHP, HTML, Bootstrap (CSS).

Registration Management System
Overview

This repository contains code for a Registration Management System designed as an extension of repository W8pars/employeeWebsiteProject. The system includes modules for user authentication, registration, and course management.
Key Features:
1. User Authentication (Login System)

    Security:
        Utilizes secure password hashing (password_verify) and prevents SQL injection through the use of prepared statements.

    Session Management:
        Initiates and manages user sessions for tracking authentication status throughout the user's interaction with the system.

2. Registration System

    User Registration:
        Implements a user registration system, allowing users to sign up for the application.

    Error Handling:
        Provides user-friendly error messages for registration-related issues, enhancing the user experience for testing via url notifications. this may be modified for pop up notifs if desired.

    Code Reusability:
        Separates concerns into classes, promoting code reusability and maintainability.

3. Course Management (Secretary Class)

    Add and Drop Courses:
        Utilizes a Secretary class to manage adding and dropping courses from a user's account.

    Database Interaction:
        Implements secure database interactions using PHP Data Objects (PDO) and prepared statements.

    Readability:
        Maintains code readability through clear variable names and organized code structure.

Usage

To integrate this Registration Management System into your web application:

    Clone this repository to your local machine.
    Configure the database connection parameters in db_config.php.
    Include the necessary files in your application, such as login.classes.php, registration.classes.php, and secretary.classes.php.
    Customize the error handling, user feedback, and additional functionalities based on your application's requirements.

Security Considerations

    Ensure that user inputs are properly sanitized and validated to prevent potential security vulnerabilities.
    Regularly update the code to incorporate the latest security best practices.
    Implement logging mechanisms to capture errors or unusual activities for debugging and monitoring.

Contributors

    William Parsons
    Dr. C. Butler
    Dr. N. Stewart

License

This Registration Management System is open-source, feel free to adapt any of the code here with reference to William Parsons.
