# Contacts Management App

A simple **Contacts Management** application built with Laravel and styled using the **GOV.UK Frontend** design system.

## Features
- 📝 **Add, Edit, Delete, and View Contacts**
- 📋 **Contacts List with Pagination**
- 🔍 **View Contact Details**
- 🎨 **GOV.UK Frontend Styling**
- ✅ **Form Validation**
- 🔄 **Success Messages & Error Handling**
- 🌐 **REST API Support (v1)**
- ⚡ **AJAX Delete with Confirmation**
- 🔎 **Live Search for Contacts**

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

### 6️⃣ Serve the Application
```sh
php artisan serve
```
Access the app at **`http://127.0.0.1:8000/contacts`**.

## Usage
### Web Application
- **View Contacts** → `/contacts`
- **Add New Contact** → Click "Add New Contact"
- **Edit Contact** → Click "Edit" on a contact row
- **Delete Contact (AJAX)** → Click "Delete" (confirmation required)
- **Live Search** → Type in the search bar to filter contacts
- **View Contact Details** → Click "Details"

### API Endpoints (v1)
The application provides a REST API under `/api/v1`. Example endpoints:

#### 📌 List Contacts
```sh
GET /api/v1/contacts
```
Response:
```json
{
    "data": [...],
    "links": {...},
    "meta": {...}
}
```

#### 📌 View a Contact
```sh
GET /api/v1/contacts/{id}
```
Response:
```json
{
    "id": 22,
    "forenames": "Aiden",
    "surname": "Saunders",
    "address_line_1": "8 Jackson Port",
    "address_line_2": "Studio 47",
    "address_line_3": "Chelseamouth",
    "address_line_4": "Hampshire",
    "postcode": "RH9 8DR",
    "telephone": "+44622834228",
    "mobile": "+44245769631",
    "email": "jessica32@example.org",
    "created_at": "2025-02-13T22:27:05.000000Z",
    "updated_at": "2025-02-13T22:27:05.000000Z"
}
```

#### 📌 Create a New Contact
```sh
POST /api/v1/contacts
Content-Type: application/json

{
    "forenames": "Aiden",
    "surname": "Saunders",
    "email": "jane@example.com",
    "address_line_1": "8 Jackson Port",
    "address_line_2": "Studio 47",
    "address_line_3": "Chelseamouth",
    "address_line_4": "Hampshire",
    "postcode": "RH9 8DR",
    "telephone": "+44622834228",
    "mobile": "+44245769631"
}
```

#### 📌 Update a Contact
```sh
PUT /api/v1/contacts/{id}
Content-Type: application/json

{
    "forenames": "Update Forenames",
}
```

#### 📌 Delete a Contact
```sh
DELETE /api/v1/contacts/{id}
```
Response:
```json
{
    "message": "Contact deleted successfully"
}
```

#### 📌 Error Handling (Not Found)
If a contact is not found, the API returns:
```json
{
    "message": "Contact not found"
}
```

## Technologies Used
- **Laravel** (PHP Framework)
- **SQLite** (Database)
- **GOV.UK Frontend** (Styling & UI Components)
- **Vite** (Asset Compilation)
- **Blade Templates** (View Rendering)
- **REST API** (Versioned under `/api/v1`)
- **JavaScript (AJAX & Live Search)**

## Folder Structure
```
contacts-management/
├── app/                # Laravel App Logic (Controllers, Models, Requests)
├── database/           # Migrations & Seeders
├── resources/
│   ├── views/         # Blade Templates
│   ├── css/           # Styling (GOV.UK & Custom CSS)
│   ├── js/            # JavaScript Files
├── routes/
│   ├── web.php        # Web Routes
│   ├── api.php        # API Routes
├── public/            # Public Assets
├── .env.example       # Environment Variables Template
├── README.md          # Project Documentation
```

## Future Enhancements 🚀
- 🛠 **User Authentication (Login & Registration)**
- 🔍 **Advanced Search Functionality**
- 📡 **API Authentication (OAuth2, JWT)**

## License
This project is licensed under the **MIT License**.

---
I generated this README.md file using  **Chat GPT**.
