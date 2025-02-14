# Contacts Management App

A simple **Contacts Management** application built with Laravel and styled using the **GOV.UK Frontend** design system.

## Features
- 📝 **Add, Edit, Delete, and View Contacts**
- 📋 **Contacts List with Pagination**
- 🔍 **View Contact Details**
- 🎨 **GOV.UK Frontend Styling**
- ✅ **Form Validation**
- 🔄 **Success Messages & Error Handling**

## Installation

### 1️⃣ Clone the Repository
```sh
git clone https://github.com/inaam84/contactswebapp.git
cd contactswebapp
```

### 2️⃣ Install Dependencies
```sh
composer install
npm install
```

### 3️⃣ Configure the Environment
Copy the `.env.example` file and configure your database:
```sh
cp .env.example .env
```
Then update the `.env` file to use SQLite:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

Create the SQLite database file:
```sh
touch database/database.sqlite
```

### 4️⃣ Generate the Application Key
```sh
php artisan key:generate
```

### 5️⃣ Run Migrations and Seed Data
```sh
php artisan migrate --seed
```

### 6️⃣ Compile Assets (CSS & JS)
```sh
npm run dev
```

### 7️⃣ Serve the Application
```sh
php artisan serve
```
Access the app at **`http://127.0.0.1:8000/contacts`**.

## Usage
- **View Contacts** → `/contacts`
- **Add New Contact** → Click "Add New Contact"
- **Edit Contact** → Click "Edit" on a contact row
- **Delete Contact** → Click "Delete" (confirmation required)
- **View Contact Details** → Click "Details"

## Technologies Used
- **Laravel** (PHP Framework)
- **SQLite** (Database)
- **GOV.UK Frontend** (Styling & UI Components)
- **Vite** (Asset Compilation)
- **Blade Templates** (View Rendering)

## Folder Structure
```
contactswebapp/
├── app/                # Laravel App Logic (Controllers, Models, Requests)
├── database/           # Migrations & Seeders
├── resources/
│   ├── views/         # Blade Templates
│   ├── css/           # Styling (GOV.UK & Custom CSS)
│   ├── js/            # JavaScript Files
├── routes/
│   ├── web.php        # Web Routes
├── public/            # Public Assets
├── .env.example       # Environment Variables Template
├── README.md          # Project Documentation
```

## Future Enhancements 🚀
- 🛠 **User Authentication (Login & Registration)**
- 📁 **Contact Categories & Filtering**
- 🔍 **Search Functionality**

## License
This project is licensed under the **MIT License**.

---
🎉 **Happy Coding!**

