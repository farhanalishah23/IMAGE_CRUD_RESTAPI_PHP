# PHP CRUD API with AJAX and Image Handling

This project provides a set of 5 APIs for managing user data along with image uploads using **PHP** and **AJAX**. The APIs include full **CRUD** (Create, Read, Update, Delete and Search) functionality for users, allowing users to manage their profile information and associated images. The system uses AJAX for smooth client-server communication without page reloads.




![PHP Logo](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQt3hqz7wJ_rKcYT9FliLC11fkJYrY-oRHzwsPEn6hoQ4-WepSkMsJLrAZtXNNW15NyHHk&usqp=CAU)  
![AJAX Logo](https://michaelsoriano.com/wp-content/uploads/2017/02/jquery-ajax.png)

## Features

- **Create User**: Allows creating a new user with name, email, and an image.
- **Read User**: Fetches user details along with their image.
- **Update User**: Allows updating user information and replacing their profile image.
- **Delete User**: Deletes user details and their associated image.
- **AJAX Integration**: Smooth interactions with the server using AJAX for all CRUD operations without page reloads.

## APIs Overview

This project includes the following 5 APIs:

### 1. **Create User API**
   - **Endpoint**: `/api/create.php`
   - **Method**: `POST`
   - **Parameters**: `name`, `email`, `image`
   - **Description**: Adds a new user to the database with the provided name, email, and an uploaded image.
   - **Response**: Success message with the ID of the newly created user.

### 2. **Read User API**
   - **Endpoint**: `/api/fetchapi.php`
   - **Method**: `GET`
   - **Parameters**: None
   - **Description**: Fetches all users from the database with their name, email, and associated image.
   - **Response**: A list of users in JSON format.

### 3. **Update User API**
   - **Endpoint**: `/api/updateapi.php`
   - **Method**: `POST`
   - **Parameters**: `id`, `name`, `email`, `image`
   - **Description**: Updates the information of an existing user. If a new image is uploaded, it will replace the old one.
   - **Response**: Success message confirming the update.

### 4. **Delete User API**
   - **Endpoint**: `/deleteapi/delete.php`
   - **Method**: `POST`
   - **Parameters**: `id`
   - **Description**: Deletes a user from the database and removes their associated image.
   - **Response**: Success message confirming the deletion.

### 5. **Fetch Single User API**
   - **Endpoint**: `/api/singlefetch.php`
   - **Method**: `POST`
   - **Parameters**: `id`
   - **Description**: Retrieves a specific user's information by their `id` for editing purposes.
   - **Response**: The user's data in JSON format.

## Installation

### Prerequisites

- A **PHP** environment.
- A **MySQL** database for storing user data and images.
  
### Step-by-Step Guide

#### 1. Clone the Repository

Clone the repository to your local machine using Git:

```bash
git clone https://github.com/farhanalishah23/IMAGE_CRUD_RESTAPI_PHP.git




