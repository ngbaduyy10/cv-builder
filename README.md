# 📄 Bright CV

Bright CV is an intuitive and user-friendly web application designed to assist individuals in crafting professional resumes effortlessly. In today's competitive job market, having a polished CV is crucial for making a great first impression with potential employers. This application aims to streamline the process of CV creation, ensuring users can focus on content rather than formatting. Whether you're a job seeker updating your resume for a new opportunity or an individual entering the workforce for the first time, Bright CV provides an array of customizable features tailored to your needs.

The application offers a variety of templates that users can choose from. Users can easily input their information, including personal details, work experience, education, skills, and more. Bright CV also includes a user-friendly interface designed to enhance the habitability of the platform, ensuring even those with little technical knowledge can navigate it without difficulty.

## ✨ Features

- Visitors have the ability to browse the website's information, explore available templates, and view public CVs if the corresponding links are provided.
- Registered users, upon logging in, have the option to create up to three distinct CVs.
- Each CV is printable in PDF format, ensuring a professional presentation.
- Users are able to save their documents under the "My CVs" section, allowing convenient editing and updates at any time.
- CVs can be made public, enabling users to share them with others through a direct link.
- Administrators manage user accounts and oversee the available templates.

## 🔧 Technologies Used
- **HTML/CSS**: For structuring and styling the web pages, ensuring a responsive and attractive UI/UX.
- **PHP**: The backbone of the application, handling server-side logic and processes.
- **MySQL**: Used for storing and managing user data securely.
- **jQuery**: For enhancing user interactions and providing dynamic content updates.
- **AJAX**: To facilitate asynchronous data loading, improving the user experience by allowing background data fetching without page reloads.

## 🛠 Getting Started

These instructions will help you set up and run the project on your local machine for development and testing purposes.

### 📥 Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/ngbaduyy10/cv-builder.git
    cd cv-builder
    ```

2. **Install dependencies using Composer:**

    ```bash
    composer install
    ```

3. **Database setup:**

    - Create a database named `cv-builder` in your MySQL server.
    - Import the provided SQL file (`cv-builder.sql`) to set up the necessary tables.

4. **Run the application:**

    - Ensure your web server is configured properly to serve the project.
    - Once configured, you can access the application by navigating to `http://localhost/cv-builder/index.php` in your web browser.
### 🚀 Usage

To access the application, visit `http://localhost/cv-builder/index.php` in your web browser.

- Create a new account to start creating your CVs or log in with our accounts to explore some sample CVs.
- Alternatively, log in with the admin account to manage user accounts and oversee the available templates.

#### 👤 User Account

- **Email**: `ngbaduyy@gmail.com`
- **Password**: `123456`

#### 🔑 Admin Account

- **Email**: `admin@gmail.com`
- **Password**: `123456`

### ☁️ Deployment

Our website is also deployed using Heroku and JawsDB, allowing users to experience the application in a live environment. This setup ensures scalability and reliability, making the Bright CV accessible from anywhere.

To access the live version of our application, visit the following link: [https://bright-cv-5dd136e7967b.herokuapp.com/](https://bright-cv-5dd136e7967b.herokuapp.com/).