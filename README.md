# Composer Template

A template for setting up a PHP project using Composer, including tools for coding standards and testing.

## Description

This template provides a starting point for PHP projects, including tools for coding standards and testing. It is designed to help you quickly set up a new PHP project with best practices in mind.

## Features

- **PSR-4 Autoloading**: Automatically loads classes from the `app/` directory.
- **Coding Standards**: Enforced using [Easy Coding Standard](https://github.com/symplify/easy-coding-standard).
- **Static Analysis**: Performed using [PHPStan](https://github.com/phpstan/phpstan).
- **Testing**: Supported with [PHPUnit](https://github.com/sebastianbergmann/phpunit).
- **Environment Variables**: Managed using [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv).

## Installation

To use this template, follow these steps:

1. **Clone the repository**:
   ```sh
   git clone https://github.com/rivolink/composer-template.git
   cd composer-template
   ```

2. **Install dependencies**:
   ```sh
   composer install
   ```

3. **Set up environment variables**:
   Create a `.env` file in the root directory and add your environment variables.

4. **Run coding standards**:
   ```sh
   vendor/bin/ecs check --config=config/phpecs.php
   ```

5. **Run static analysis**:
   ```sh
   vendor/bin/phpstan analyse --configuration=config/phpstan.neon --memory-limit=1152M
   ```

6. **Run tests**:
   ```sh
   vendor/bin/phpunit --configuration=config/phpunit.xml
   ```

## Contributing

Contributions are welcome! Please follow these guidelines:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them.
4. Push your changes to your fork.
5. Create a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Authors

- **RivoLink** - *Initial work* - [rivo.link@gmail.com](mailto:rivo.link@gmail.com)
