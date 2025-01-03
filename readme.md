# Inventory Management System (IMS)

A PHP-based Inventory Management System that uses MongoDB for data storage. This system helps track product inventory, manage purchases, and monitor stock levels with a user-friendly web interface.

## System Overview

This IMS is built with:
- PHP (Backend)
- MongoDB (Database)
- Composer (PHP Package Manager)
- Bootstrap (Frontend Styling)
- JavaScript (Client-side functionality)

## Core Features

- **Inventory Management**
    - Add new items to inventory
    - Update existing item quantities
    - Track item costs
    - Real-time item detail fetching

- **Purchase Tracking**
    - Record new purchases
    - View recent purchase history
    - Automatic inventory updates on purchase

- **Data Display**
    - Display 5 most recent inventory updates
    - Sortable inventory list
    - Date-based tracking

## Project Structure

```
├── includes/
│   ├── db.php          # MongoDB connection configuration
│   ├── head.php        # Header HTML and common includes
│   └── foot.php        # Footer HTML and script includes
├── assets/
│   ├── css/
│   │   └── styles.css  # Custom styling
│   └── js/
│       └── script.js   # Client-side functionality
├── fetchItemDetail.php  # AJAX endpoint for item details
├── inventory.php       # Main inventory management page
├── sales.php          # Sales management interface
├── index.php          # Landing page
└── auth.php           # Authentication handler
```

## Prerequisites

- PHP 7.4 or higher
- MongoDB Server
- Composer
- Web Server (Apache/Nginx)
- MongoDB PHP Driver

## Installation

1. Clone the repository:
```bash
git clone https://github.com/bastolasuraj/ims.git
cd ims
```

2. Install dependencies using Composer:
```bash
composer install
```

3. Configure MongoDB connection:
    - Open `includes/db.php`
    - Update MongoDB connection URI with your credentials

4. Configure your web server:
    - Point document root to the project directory
    - Ensure PHP has MongoDB extension enabled

## Usage

1. Access the system through your web browser
2. Use the inventory management form to:
    - Add new items
    - Update existing item quantities
    - View current stock levels
3. Monitor recent purchases in the table below the form
4. Use the autocomplete feature to quickly find existing items

## Features in Detail

### Inventory Management
- **Auto-completion**: Dynamic item search with existing inventory suggestions
- **Real-time Updates**: Instant fetching of item details when selecting existing items
- **Quantity Management**: Automatic quantity updates for existing items
- **Cost Tracking**: Track cost per item
- **Date Tracking**: Automatic timestamp for all inventory changes

### Data Display
- Tabular view of recent inventory changes
- Sortable columns
- Date formatted display
- Quantity and cost tracking

## Security

- MongoDB connection is handled securely through environment configuration
- Form submissions include basic validation
- [Note: Additional security measures may need to be implemented based on requirements]

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Author

- **Suraj Bastola** - Initial work and maintenance

## License

This project is licensed under the MIT License - see the LICENSE file for details.

---

## Future Enhancements

- User authentication and authorization
- Advanced reporting features
- Sales tracking integration
- Export functionality for reports
- Stock alerts for low inventory

## Support

For support and queries, please create an issue in the GitHub repository or contact the maintainer directly.

