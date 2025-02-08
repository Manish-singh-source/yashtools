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

### **Git Pull Steps**
1. **Fetch the latest changes from the remote (github) repository:**
   ```bash
   git fetch origin
   ```
   - Fetches new branches and any changes from the remote (github) but doesn’t merge them into your local branch yet.

2. **Pull the latest changes (if required):**
   ```bash
   git pull 
   ```
    - If the current branch is behind the remote (github) branch, this will merge the latest changes into your local branch.

3. **Migrate Tables:**
   ```bash
   php artisan migrate 
   ```
   

### **Before Doing Any Task Steps**
1. **Switch to the task branch:**
   ```bash
   git checkout BranchName
   ```
   - Replace `BranchName` with the actual name of the branch where you will perform your task.

    **Example:**
   ```bash
   git checkout 1-create-a-login-page
   ```
   
2. **Do your work.**
   - Modify files, write code, test changes, etc.




### **After Task Done Steps**
1. **Stage the changes:**
   ```bash
   git add .
   ```
   - This stages all modified files for commit.

2. **Commit your changes with a meaningful message:**
   ```bash
   git commit -m "Your meaningful message"
   ```
   - Write a clear message that describes what changes you made.

3. **Push your changes to the remote repository:**
   ```bash
   git push
   ```
   - Pushes your commits to the remote branch you are working on.

4. **Change Branch To Main Branch:**
   ```bash
   git checkout main
   ```
