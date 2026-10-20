# Salary Tax & Deposit System

A simple multilingual web application that calculates salary tax and deposit interest based on Cambodian regulations.

![Language](https://img.shields.io/badge/PHP-8.x-blue)
![Database](https://img.shields.io/badge/Database-MS%20SQL%20Server-lightgrey)
![Languages](https://img.shields.io/badge/Languages-EN%20%7C%20KH%20%7C%20FR-green)
![License](https://img.shields.io/badge/License-Educational%20Use-orange)
![Status](https://img.shields.io/badge/Status-Academic%20Project-yellow)

<!-- Optional: add a banner, logo, or demo GIF here -->
<!-- ![Demo](docs/demo.gif) -->

---

## Table of Contents

- [About the Project](#about-the-project)
- [Objectives](#objectives)
- [Key Features](#key-features)
- [Screenshots](#screenshots)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Troubleshooting](#troubleshooting)
- [Roadmap](#roadmap)
- [Academic Credits](#academic-credits)
- [License](#license)

---

## About the Project

**Salary Tax & Deposit System** is a web application that calculates salary tax and deposit interest. It is built with **PHP** and **MS SQL Server**, and supports English, Khmer, and French.

It is intended for individuals who want a quick estimate of their salary tax or their deposit earnings under Cambodian rules.

## Objectives

- Build a practical calculator application using PHP and MS SQL Server.
- Apply Cambodian salary tax rules in a working calculator.
- Calculate deposit interest using Cambodian interest rates.
- Support multiple languages using a language-file approach.
- [Add any other objective required by your midterm assignment.]

## Key Features

- **Salary Tax Calculator**: Calculates salary tax based on Cambodian tax law.
- **Deposit Interest Calculator**: Calculates deposit interest based on Cambodian interest rates.
- **Multilingual Support**: Switch between English, Khmer, and French using separate language files.

## Screenshots

<!-- Store images in a /docs or /screenshots folder -->

| Home Page | Salary Tax Calculator |
| :-------: | :-------------------: |
| ![Home page](docs/home.png) | ![Salary tax](docs/salary-tax.png) |

| Deposit Calculator | Language Switch |
| :----------------: | :-------------: |
| ![Deposit](docs/deposit.png) | ![Language switch](docs/languages.png) |

## Tech Stack

| Category | Technology    | Purpose |
| -------- | ------------- | ------- |
| Backend  | PHP           | Calculation logic and page rendering |
| Database | MS SQL Server | Data storage |
| Frontend | HTML          | Page structure |
| Frontend | CSS           | Styling |
| Frontend | JavaScript    | Client-side interaction |

## Project Structure

```
SalTax_System/
├── css/
│   └── style.css        # Shared styles
├── images/
│   ├── en.png           # English flag icon
│   ├── fr.png           # French flag icon
│   └── kh.png           # Khmer flag icon
├── languages/
│   ├── lang_en.php      # English text
│   ├── lang_fr.php      # French text
│   └── lang_kh.php      # Khmer text
├── common.php           # Shared functions and setup
├── deposit.php          # Deposit interest calculator
├── salary_tax.php       # Salary tax calculator
├── home.php             # Home page
├── index.php            # Entry point
└── README.md
```

## Installation

### Prerequisites

- PHP 8.x (for example via XAMPP)
- Apache web server
- Microsoft SQL Server (or SQL Server Express)
- PHP SQL Server driver (`sqlsrv` / `pdo_sqlsrv`), enabled in `php.ini`
- Git

### Setup

1. **Clone the repository**
```bash
   git clone https://github.com/[username]/[repository].git
```

2. **Copy the project** into your web server directory:
```text
   C:\xampp\htdocs\SalTax_System
```

3. **Enable the SQL Server driver** in `php.ini`, then restart Apache:
```ini
   extension=php_sqlsrv_[version].dll
```

4. **Set up the database**
   [Describe how to create the database and tables, or import your script, e.g. `Database/[script].sql`.]

5. **Update the connection settings** (see [Configuration](#configuration)).

6. **Open the app** at `http://localhost/SalTax_System/`.

## Configuration

<!-- Check which file holds your connection details, probably common.php -->

Database connection settings are located in `[common.php]`.

| Setting         | Example           | Description |
| --------------- | ----------------- | ----------- |
| `[server]`      | `localhost\SQLEXPRESS` | SQL Server instance name |
| `[database]`    | `[database_name]` | Database name |
| `[username]`    | `[username]`      | SQL Server login |
| `[password]`    | `[password]`      | SQL Server password |

> ⚠️ Never commit real database credentials to version control.

## Usage

1. **Choose a language**: Click the English, French, or Khmer flag to switch the interface language.
2. **Salary Tax**: Open the salary tax page, enter [your salary and any required fields], and submit to see the calculated tax.
3. **Deposit Interest**: Open the deposit page, enter [deposit amount, term, and any required fields], and submit to see the interest earned.

## Troubleshooting

<details>
<summary><strong>"Could not find driver" or sqlsrv error</strong></summary>

The PHP SQL Server driver is not enabled. Install the Microsoft Drivers for PHP for SQL Server, add the matching extension line to `php.ini`, and restart Apache.
</details>

<details>
<summary><strong>Khmer text shows as question marks or garbled characters</strong></summary>

Make sure the language files are saved as **UTF-8** and that the pages declare UTF-8:
```html
<meta charset="UTF-8">
```
</details>

<details>
<summary><strong>Cannot connect to SQL Server</strong></summary>

Check that the SQL Server service is running, TCP/IP is enabled in SQL Server Configuration Manager, and the server name and credentials in your configuration are correct.
</details>

<details>
<summary><strong>Old styles still showing</strong></summary>

Do a hard refresh with `Ctrl + Shift + R` (Windows/Linux) or `Cmd + Shift + R` (macOS).
</details>

## Roadmap

- [x] Salary tax calculator
- [x] Deposit interest calculator
- [x] English, Khmer, and French support
- [ ] [Planned feature, e.g. save calculation history]
- [ ] [Planned feature, e.g. export results to PDF]
- [ ] [Planned feature, e.g. update tax brackets from the database]

## Academic Credits

* **Project Name:** Salary Tax & Deposit System
* **Repository Source:** [GitHub Repository Link]([repository-url])
* **Author / Developer:** SOK Sorya
* **Course Assignment:** Midterm Project
* **Course Title:** Web Apps Development with PHP and MsSQL
* **Supervising Lecturer:** Mr. Mork Ratha
* **License:** This application and its underlying source structure are developed and licensed exclusively for **educational and personal use only**.

## License

This project is developed and licensed exclusively for **educational and personal use only**.

<p align="center">© 2026 SOK Sorya. All Rights Reserved.</p>