# Higher Education Abroad

Welcome to the **Higher Education Abroad** project! This platform is designed to help students explore, apply, and manage their higher education opportunities abroad while offering parents and administrators essential tools to monitor and manage activities seamlessly.

## Live Demo

You can view and test the live version of this project at the link below:

🔗 **Live URL:**  
https://highereducationinabroad.yzz.me/

---

## Features

### Student Features
- **Account Creation and Management:** Students can create and update their accounts with personal information.
- **Search Universities:** Search for universities based on criteria like:
  - Country
  - Tuition fees
- **Detailed University Information:**
  - Tuition fees
  - Hall costs
  - Availability of halls
- **Apply for Universities:**
  - Submit applications to universities directly from the platform.
- **Update Information:** Students can edit and update their profiles anytime.

### Parent Features
- **Monitor Activities:** Parents can monitor their child's activities, including:
  - University searches
  - Application status and progress

### Admin Features
- **University Management:**
  - Add new universities.
  - Delete existing universities.
  - Manage university details.
- **User Management:**
  - View and manage student accounts.
- **Application Processing:**
  - Review student applications.
  - Accept or reject applications based on requirements.
- **Notifications:**
  - Receive notifications for new student applications.
- **History Tracking:**
  - Maintain a history of approved and rejected applications with detailed user information.

## Tech Stack
This project is built using the following technologies:
- **Frontend:** HTML,CSS,Javascript
- **Backend:** PHP
- **Database:** MySQL

## Installation
Follow the steps below to run this project on your local machine using **XAMPP**.

### Prerequisites
- XAMPP installed (Apache & MySQL)
- Web browser
- Git (optional)

---

### Step 1: Clone or Download the Repository

**Option A: Clone using Git**
```bash
   git clone https://github.com/sakibhasan017/Project-of-Higher-Education-in-Abroad-Using-Database.git
```
**Option A: Download ZIP**
-Download the ZIP file from GitHub
-Extract the archive

### Step 2: Move Project to htdocs:
-Copy the Project Folder
-Paste it into
   ```bash
   C:/xampp/htdocs/
   ```
Example Structure:
```bash
C:/xampp/htdocs/your-project-folder/
│── index.php
│── project22.sql
│── other PHP files...
```

### Step 3: Start XAMPP Services

1.  Open **XAMPP Control Panel**
    
2.  Start:
    
    *   **Apache**
        
    *   **MySQL**
        

### Step 4: Create Database & Import SQL File

1.  ```bash http://localhost/phpmyadmin ```
    
2.  Click **New** and create a database(example: project22)
    
3.  Select the database
    
4.  Click **Import**
    
5.  ```bash project22.sql ```
    
6.  Click **Go**
    

### Step 5: Configure Database Connection (if required)

If your project contains a database configuration file (e.g. config.php, db.php), update it with the following default XAMPP credentials:

```bash
$host = "localhost";
$user = "root";
$password = "";
$database = "project22";

```
### Step 6: Run the Project

Open your browser and navigate to:
```bash http://localhost/your-project-folder/ ```
The project will start automatically via index.php.

### Notes

*   Apache and MySQL must be running before accessing the project
    
*   The project directory must be inside htdocs
    
*   The database must be imported before first use

## Usage
- Visit the local development server at `http://localhost:3000` (or the specified port).
- Create a student account to explore and apply to universities.
- Use a parent account to monitor student activities.
- Log in as an admin to manage universities and applications.


## Contact
For any queries or suggestions, please contact:
- **Project Owner:** Md Sakib Hasan
- **Email:** hassansakib512@gmail.com

We hope this platform serves as a valuable resource for students aspiring to study abroad, their parents, and the administrators managing the process!

**Admin Page**

1. Interface
   
![image](https://github.com/user-attachments/assets/97327356-89ad-43f5-83a3-088ed6cd9dec)

3. Insert University with requirements
   
![image](https://github.com/user-attachments/assets/f673ed81-6702-4eee-97b3-b2e44cdc530d)

4. University Details with information update section
   
![image](https://github.com/user-attachments/assets/18bd3e01-42e2-4994-899a-1f3bc77d26e1)

5. Notifications
   
![image](https://github.com/user-attachments/assets/33c3538e-bcfd-42cc-98c7-f8bebbfab1ca)

6. History of Accepted or Rejected application
   
![image](https://github.com/user-attachments/assets/4352dd7a-9277-41a0-a87e-85e5fbb23ffe)

6.Information of Student who already created account

![image](https://github.com/user-attachments/assets/21cc8a8a-56ee-4783-a238-b519ea7df3ef)

**Student Page**

1. University list with search filter
   
![image](https://github.com/user-attachments/assets/87040ae0-25d0-494f-8188-d0cac7ed0246)

3. Easy way to select University using chart
   
![image](https://github.com/user-attachments/assets/4ef6f4de-e16a-4f54-b1f9-2f98635b8349)

4. Show Information and requirments of University
   
![image](https://github.com/user-attachments/assets/46449509-a392-4912-a020-0dc600f11e6b)

5. Faculty information for a particular program
   
![image](https://github.com/user-attachments/assets/ebc8f871-2e9a-424c-b673-9652369edbfe)

6. Application Section
   
![image](https://github.com/user-attachments/assets/6ff73685-7ef1-4298-8534-fa81ede907d0)

7. Studet information
   
![image](https://github.com/user-attachments/assets/4390c803-6ac3-474b-abdc-d0d496a573da)

8. Application History with status
   
![image](https://github.com/user-attachments/assets/a9fe839a-6e68-403d-be63-c94cc8f7eb35)

**Others**

1. Registration Page
   
![image](https://github.com/user-attachments/assets/8c405cc4-4ffe-4d15-9a08-8af2f8c6c266)
![image](https://github.com/user-attachments/assets/db5fe1f0-fdd8-49e1-b018-22a670ea5bbb)

3. Forget Password section
   
![image](https://github.com/user-attachments/assets/3ba7d818-2618-4505-9cfd-0a37dbb6ddc8)

