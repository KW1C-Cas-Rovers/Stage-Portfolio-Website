## Setup

1. ### Clone the Repository:

   ```bash
   git clone https://github.com/KW1C-Cas-Rovers/Stage-Portfolio-Website.git
   ```

2. ### Install Dependencies:
    ```bash
    cd Stage-Portfolio-Website
    npm install && composer install
    ```

3. ### Database Configuration

   #### Set up the .env file:

   + Windows:

    ```bash
    copy .env.example .env
    ```
   + Linux & macOS:
   ```bash
   cp .env.example .env
   ```
   
   #### Update the `.env` file with your database credentials:
   ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
   ```
   
    #### Application key:
    ```bash
    php artisan key:generate
    ```
   
4. ### Run the Migrations and Seeders

    #### The migrations:
    
    ```bash
    php artisan migrate
    ```
   
    #### The seeders:
    ```bash
    php artisan db:seed
    ```

5. ### Access the application:
    
    To access your application you need to run this command in the console:
    ```bash
    php artisan serve
    ```
   After running the server, you'll receive the following message in the console:
    ```bash
    INFO  Server running on [http://127.0.0.1:8000].
    ```
   To open the application in your browser, simply do one of the following:
   - Copy and paste the URL `http://127.0.0.1:8000` into your browser's address bar.
   - Click on the link provided in the console output.

6. ### Additional Notes:
    - Make sure to have Node.js and Composer installed on your system before running the installation commands.
    - If you are using a local development server ensure that your web server (Apache, Nginx, etc.) is configured to point to the `public` directory of the application.
    - You may need to set up file permissions and other server configurations based on your environment.

   #### Admin panel:
    to access the admin panel of this application go to the `/admin` in your browser, The credentials are already seeded into the database the e-mail address is `development@dev.com` and the password is `password` **(change this password if the application is going into production)**

7. ### Contributing:
   Contributions are welcome! Feel free to submit pull requests or raise issues if you encounter any problems.
8. ### License:
   This project is licensed under the [MIT License](LICENSE).
