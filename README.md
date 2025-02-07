## Requirements

1. PHP 8.2.x

### Laravel Reference Cheatsheet: 
https://quickref.me/laravel

### **Project Setup**
1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   ```
   - Replace `<repository-url>` with the URL of the repository you're cloning.
  
    **Example:**
   ```bash
   git clone https://github.com/HackRoot1/e-commerce.git
   ```

2. **Navigate into the project directory:**
   ```bash
   cd e-commerce
   ```
   - Change to the directory where the project files are located.

3. **Copy `.env.example` to `.env`:**
   ```bash
   cp .env.example .env
   ```
   - The `.env` file holds the environment variables like database credentials, API keys, etc.

4. **Install PHP dependencies:**
   ```bash
   composer install
   ```
   - This command installs all PHP dependencies listed in the `composer.json` file.

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```
   - This generates a new key in the `.env` file that is used for encryption.

6. **Run database migrations (if necessary):**
   ```bash
   php artisan migrate
   ```
   - This command applies the database migrations and sets up the necessary database structure.

7. **Serve the application:**
   ```bash
   php artisan serve
   ```
   - Starts the application on a local server (usually at `http://localhost:8000`).

---

### **Git Workflow for Task Management**
1. **Fetch the latest changes from the remote (github) repository:**
   ```bash
   git fetch origin
   ```
   - Fetches new branches and any changes from the remote (github) but doesn’t merge them into your local branch yet.

2. **Check the status of your working directory:**
   ```bash
   git status
   ```
   - This will show any modified, untracked, or staged files.

3. **Pull the latest changes (if required):**
   ```bash
   git pull 
   ```
   - If the current branch is behind the remote (github) branch, this will merge the latest changes into your local branch.

4. **Switch to the task branch:**
   ```bash
   git checkout BranchName
   ```
   - Replace `BranchName` with the actual name of the branch where you will perform your task.

    **Example:**
   ```bash
   git checkout 1-create-a-login-page
   ```
   
5. **Do your work.**
   - Modify files, write code, test changes, etc.

6. **Stage the changes:**
   ```bash
   git add .
   ```
   - This stages all modified files for commit.

7. **Commit your changes with a meaningful message:**
   ```bash
   git commit -m "Your meaningful message"
   ```
   - Write a clear message that describes what changes you made.

8. **Push your changes to the remote repository:**
   ```bash
   git push
   ```
   - Pushes your commits to the remote branch you are working on.


---


### **1. Create a Migration for the Table**
To create a migration file for a new table, use the following command:

```bash
php artisan make:migration create_table_name_table
```
- Replace `table_name` with the name of the table you want to create (e.g., `users`, `posts`).
- This will generate a migration file in the `database/migrations` directory.

**Example:**
   ```bash
  php artisan make:migration create_users_table
   ```

### **2. Define the Table Structure**
After creating the migration, you'll find the file in `database/migrations`. Open the migration file, and inside the `up()` method, define the columns for the table.

Example for creating a `users` table:
```php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();  // Primary key
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps(); // Adds created_at and updated_at columns
    });
}
```

### **3. Run the Migration**
Once the migration file is ready, run the following command to create the table in your database:

```bash
php artisan migrate
```
- This will execute the migration and create the table in the database.
