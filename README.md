# I. Front End
### Step 1: Install Dependency Packages
- [x] cd .\frontend\
> <code> npm install **or** npm i </code>

### Step 2: Update Environment Variables
- [x] Update <code>env.production</code> and <code>env.development</code> with IP Address of your Backend server

#### Example for <code>production </code> file:
```
VUE_APP_MODE=production
VUE_APP_API_URL=http://localhost:8000/api
```

#### Example for <code>developement</code> file:
```
VUE_APP_MODE=development
VUE_APP_API_URL=http://localhost:8000/api
```

### Step 3: Running Application
> <code>npm run serve </code> (Normal Vue JS)

# II. Backend
### Step 1: Install the Packages
- [x] cd .\backend\
> <code> composer install **or** composer i </code>

### Step 2: Update the Environment Variables
- [x] copy <code>.env.example </code> file **to** the <code>.env </code> file
```
DB_DATABASE= YOUR_DB_NAME
DB_USERNAME= root
```

### Step 3: Migrate migrateion table to database
> <code> php artisan migrate </code>

### Step 4: Migrate default admin user to database with seeder
> <code> php artisan db:seed </code>

### Step 5: Set up your email in .env file
#### Example:
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=587
MAIL_USERNAME=you@gmail.com
MAIL_PASSWORD=sadanfsnskadf
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=you@gmail.com
MAIL_FROM_NAME=PNCAA
```

### Step 6: Create app key
> <code> php artisan key:generate </code>


### Step 7: Running Application
- [x] If you are in local development environments
> <code> php artisan serve </code> --port=YOUR_PORT (port is optional) 

- [x] If you are in production environments
> <code> http:://YOUR_IP_ADDRESS:YOUR_PORT </code>
#### Example for <code>local development environments</code>:
```
http://127.0.0.1:8000
```