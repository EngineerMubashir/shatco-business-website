# 🚀 Shatco – Dynamic Business Website

A modern, fully dynamic business website built with **Laravel**, **Tailwind CSS** (compiled using **Node.js**), and **MySQL**.

All frontend content — including logo, text sections, services, testimonials, and SEO metadata — is dynamically managed through a secure admin panel.

## 📌 Project Overview

Shatco is a fully data-driven corporate website designed to eliminate hardcoded frontend content. Every visible section of the site is managed from an administrative dashboard.

This project demonstrates:

* Full-stack Laravel development
* Dynamic content architecture
* Clean MVC structure
* Production-ready deployment
* Scalable admin-controlled CMS functionality

---

## 🎯 Core Objectives

* Build a fully dynamic corporate website
* Implement complete admin-driven content management
* Ensure maintainable and scalable code structure
* Use modern frontend tooling with Tailwind
* Prepare application for production deployment

---

## 🛠️ Technology Stack

| Layer             | Technology    |
| ----------------- | ------------- |
| Backend Framework | Laravel (PHP) |
| Frontend Styling  | Tailwind CSS  |
| Build Tool        | Vite          |
| Node Environment  | Node.js + NPM |
| Database          | MySQL         |
| ORM               | Eloquent      |
| Templating Engine | Blade         |
| Authentication    | Laravel Auth  |

---

## 🧩 Key Features

### 🌐 Fully Dynamic Frontend

✔ Dynamic logo & favicon
✔ Editable homepage sections
✔ Services management
✔ About & company profile sections
✔ Testimonials & team members
✔ Contact information
✔ Social media links
✔ SEO metadata configuration

No hardcoded UI content — everything is database-driven.

---

### 🔐 Admin Panel Capabilities

* Secure authentication system
* CRUD operations for all site sections
* Media upload management
* SEO configuration panel
* Contact form message management
* Website settings control

---

## 🏗️ System Architecture

```
User Browser
     ↓
Laravel Routes
     ↓
Controllers
     ↓
Eloquent Models
     ↓
MySQL Database
     ↓
Blade Views (Dynamic Rendering)
```

Frontend assets are compiled via:

```
Tailwind CSS → Vite → Public Build Assets
```

---

## 📁 Project Structure

```
app/                # Core application logic
bootstrap/
config/
database/           # Migrations & seeders
public/             # Public entry & compiled assets
resources/
  ├── css/          # Tailwind source
  ├── js/
  └── views/        # Blade templates
routes/
storage/
tailwind.config.js
vite.config.js
```

---

## 🚀 Installation Guide

### 1️⃣ Clone Repository

```bash
git clone https://github.com/EngineerMubashir/shatco.git
cd shatco
```

### 2️⃣ Install PHP Dependencies

```bash
composer install
```

### 3️⃣ Install Node Dependencies

```bash
npm install
npm run dev      # Development
# or
npm run build    # Production
```

### 4️⃣ Configure Environment

Copy environment file:

```bash
cp .env.example .env
```

Update database credentials:

```
APP_NAME=Shatco
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5️⃣ Generate Key & Run Migrations

```bash
php artisan key:generate
php artisan migrate --seed
```

### 6️⃣ Run Application

```bash
php artisan serve
```

Access at:
`http://localhost:8000`

---

## 🔐 Security Implementation

* CSRF protection enabled
* Server-side validation
* Secure file upload handling
* Environment-based configuration
* No credentials stored in repository

## 📈 Production Optimization Recommendations

For enterprise-level deployment:

* Enable route & config caching
* Use Laravel queues for contact processing
* Configure HTTPS (SSL certificate)
* Use managed database service
* Enable server-side caching
* Configure proper file permissions

---

## 🌍 Deployment Compatibility

Can be deployed on:

* AWS EC2
* DigitalOcean Droplets
* VPS (Ubuntu + Nginx)
* Shared hosting with Laravel support

---

## 🧠 Key Learning Outcomes

* Full CMS-style dynamic architecture
* Admin-controlled frontend systems
* Real-world Laravel deployment workflow
* Frontend build pipeline using Tailwind + Vite
* Secure form & data management

---

## 👨💻 Author

**Muhammad Mubashir**
Full-Stack Laravel Developer
GitHub: [https://github.com/EngineerMubashir](https://github.com/EngineerMubashir)


## 📄 License

This project is released under a custom Portfolio License.

It is published strictly for demonstration and learning purposes.
Commercial usage, redistribution, or rebranding is prohibited without explicit permission from the author.


# Screenshot
<img width="1336" height="628" alt="image" src="https://github.com/user-attachments/assets/f250a7d1-1d73-4d20-89da-e22130de8188" />
<img width="1016" height="521" alt="image" src="https://github.com/user-attachments/assets/6b64c684-6a1a-4bfd-bbb3-cc2003caea77" />
<img width="1239" height="578" alt="image" src="https://github.com/user-attachments/assets/ad3c91f0-db27-48ad-8eb2-fccbe59d430b" />
<img width="1365" height="399" alt="image" src="https://github.com/user-attachments/assets/50f4b345-f193-4869-a964-3f8d9fa2bde8" />
<img width="1353" height="634" alt="image" src="https://github.com/user-attachments/assets/ad216d24-d7ec-4f99-916f-d80557c72c84" />
<img width="1213" height="263" alt="image" src="https://github.com/user-attachments/assets/5e4877cb-693c-46a3-870d-cf92ff8a0e97" />
<img width="1360" height="347" alt="image" src="https://github.com/user-attachments/assets/87366f6b-3b97-4098-b515-4440d61bb374" />


🌐 **Live Website:** [https://shatcoksa.com](https://shatcoksa.com)




