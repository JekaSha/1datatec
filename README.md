
# Simple Laravel API with Job Queue, Database, and Event Handling

## Author
**Evgen Shaposhnyk https://www.linkedin.com/in/evgen-shaposhnyk/ **  
Aspiring to work as a Full Stack Developer at 1datatec with a stack of Laravel + VueJs/NuxtJs.

## Description
This is a sample Laravel API demonstrating the use of job queues, database operations, migrations, and event handling. The application implements a single API endpoint `/submit` that accepts a POST request with user data, validates it, saves it to the database, and processes it asynchronously using job queues and events.

## Requirements
- PHP >= 7.4
- Composer
- MySQL
- Laravel 8.x

## Installation
1. **Clone the repository:**
   ```sh
   git clone https://github.com/yourusername/yourrepository.git
   cd yourrepository
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Configure the .env file:**
   Copy the `.env.example` file to `.env` and configure your database and other services.
   ```sh
   cp .env.example .env
   ```

4. **Generate application key:**
   ```sh
   php artisan key:generate
   ```

5. **Set up the database:**
   Update your database connection details in the `.env` file:
   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_db
   DB_USERNAME=root
   DB_PASSWORD=secret
   ```
   QUEUE_CONNECTION=database

6. **Run database migrations:**
   Execute the migrations to create the necessary tables:
   ```sh
   php artisan migrate
   ```

7. **Create jobs table:**
   Run the command to create the migration file for the `jobs` table, then apply the migrations:
   ```sh
   php artisan queue:table
   php artisan migrate
   ```

8. **Start the queue worker:**
   To process tasks in the queue, start the worker:
   ```sh
   php artisan queue:work
   ```

## Testing
To run the tests, use the following command:
```sh
php artisan test
```

## Testing the API
To test the `/submit` endpoint, you can use cURL or Postman:

### cURL example:
```sh
curl -X POST https://1datatec.12q.dev/api/submit \
-H "Content-Type: application/json" \
-d '{
    "name": "Jekas",
    "email": "jekas@example.com",
    "message": "1datatec Test message."
}'
```


## Application Architecture
- **Controller**:
    - `SubmissionController` handles incoming requests, validates data, and queues tasks.

- **Job**:
    - `ProcessSubmission` handles data processing and triggers an event after successful saving.

- **Event**:
    - `SubmissionSaved` is triggered after data is saved.

- **Listener**:
    - `ProcessSubmissionStatistics` handles the event and performs necessary logic (e.g., logging).

## Contact
If you have any questions or suggestions, please contact me:

- Email: shaposhnyk@gmail.com
- LinkedIn: [Evgen Shaposhnyk](https://www.linkedin.com/in/evgen-shaposhnyk/)

---

This project demonstrates my skills in using Laravel to create scalable and efficient APIs. I aspire to work as a Full Stack Developer at 1datatec, using Laravel and Nuxt.js.
