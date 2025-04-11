# laragopl/laravel-monit
A lightweight Laravel package for reporting errors to an external monitoring service.

---
## Features:
- Provides a configurable integration for sending error details to a remote endpoint.

---
## Quick Example:
```php
use Laragopl\LaravelMonit\app\Facades\Monit;

Monit::send($throwable)
```
Sends detailed context information about the error, including file, request, and user data.

---
## Installation
```bash
composer require laragopl/laravel-monit
```
### Vendor Resource Publishing
```bash
php artisan vendor:publish --tag=monit
```

---
## Configuration
The package requires two new environment variables. Add the following to your .env file:
```dotenv
MONIT_URL=https://your-monitoring-endpoint.com/api/report
MONIT_TOKEN=your_bearer_token_here
```

### Publish configuration
```bash
php artisan vendor:publish --tag=monit-config
```

---
## API Request Details
### `Monit::send($throwable)`
The `Monit::send($throwable)` method will transmit the following data:
```
POST https://your-monitoring-endpoint.com/api/report
```
```
Headers:
Accept => application/json
Authorization => Bearer your_bearer_token_here
```
```json
{
  "app_name":  "App name",
  "environment": "App environment",
  "message": "Error message",
  "file": "Error file in which error occurred",
  "line": "Error line in file",
  "trace": "Error trace",
  "url": "URL of request on which error occurred",
  "method": "HTTP method of request on which error occurred",
  "http_user_agent": "User agent",
  "remote_addr": "User IP Address",
  "level": "Error level"
}
```
Some of the fields (like url, http_user_agent, or remote_addr) may be empty depending on the execution context (e.g. during CLI or queue execution).

---
## License
This package is open-source and licensed under the MIT license.

