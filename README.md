# Karar Destek Sistemi (Logistics Decision Support System)🚛
### Vehicle & Driver Performance Tracking for Logistics Companies

A web-based decision support system built for logistics businesses to monitor and analyze vehicle and driver performance in real time. The system provides an interactive dashboard, data tables, and map views to support data-driven operational decisions.

---

## 📸 Features

- **Dashboard:** Visual overview of fleet and driver performance metrics with charts
- **Vehicle Tracking:** Filter and analyze data by vehicle brand and model (Volvo, MAN, BMC, Mercedes-Benz, Scania, Renault, Ford, DAF and more)
- **Driver Management:** Track driver profiles and performance
- **Data Tables:** Sortable and searchable tabular views of logistics data
- **Map View:** Geographic visualization of routes and vehicle locations
- **Order Tracking:** Monitor active and completed orders
- **Search:** Quick query functionality across the platform
- **Responsive Design:** Mobile-friendly layout built with Bootstrap

---

## 🛠️ Tech Stack

| Layer      | Technology                          |
|------------|-------------------------------------|
| Backend    | PHP                                 |
| Database   | MySQL (`lojistik_yonetim`)          |
| Frontend   | HTML, CSS, SCSS                     |
| UI Library | Material Design Bootstrap (MDB)     |
| Icons      | Font Awesome 5                      |

---

## 📁 Project Structure

```
Karar-Destek-Sistemi/
├── dashboard.php        # Main dashboard with charts and vehicle selector
├── table.php            # Data tables view
├── map.php              # Map view
├── logo.png             # Application logo
├── css/                 # Compiled stylesheets (Bootstrap, MDB, custom)
├── scss/                # SCSS source files
├── img/                 # Image assets
├── font/roboto/         # Roboto font files
└── main/                # Core application files
```

---

## 🚀 Getting Started

### Prerequisites

- PHP 7.x or higher
- MySQL / MariaDB
- A local server environment (e.g. [XAMPP](https://www.apachefriends.org/), [WAMP](https://www.wampserver.com/), or [MAMP](https://www.mamp.info/))

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/MertGokhanDonmez/Karar-Destek-Sistemi.git
   ```

2. **Move the project into your server's root directory**
   ```bash
   # e.g. for XAMPP on Windows
   mv Karar-Destek-Sistemi/ C:/xampp/htdocs/
   ```

3. **Create the database**
   - Open your MySQL client (phpMyAdmin or CLI)
   - Create a new database named `lojistik_yonetim`
   - Import the provided SQL file if available

4. **Configure the database connection**
   - Open `dashboard.php` (and other PHP files as needed)
   - Update the connection credentials:
     ```php
     $connect = mysqli_connect("localhost", "your_username", "your_password", "lojistik_yonetim");
     ```

5. **Run the application**
   - Start your local server
   - Visit `http://localhost/Karar-Destek-Sistemi/dashboard.php` in your browser

---

## 📊 Supported Vehicle Brands

The system currently supports performance tracking for the following truck brands:

- Volvo (FH 12.420)
- MAN (TGX, TGA)
- BMC (162-22 FATİH, FATİH INTERCOOL)
- Mercedes-Benz (ACTROS 1842)
- Scania (R 410, G 400)
- Renault (MAGNUM 420 T, PREMIUM 420.18 T)
- Ford (1838T, 1836T, 350 M, 120 P)
- DAF (XF)

---

## 📄 License

See [License.pdf](./License.pdf) for licensing information.

---

## 🤝 Contributing

Contributions are welcome! Please read [CONTRIBUTING.md](./CONTRIBUTING.md) before submitting a pull request, and follow the [ISSUE_TEMPLATE.md](./ISSUE_TEMPLATE.md) when reporting bugs or requesting features.

