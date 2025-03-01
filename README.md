# AI Agent

An AI assistant for quick spelling correction, code generation, and other instant AI-powered help.

## Description

**AI Agent** is an intelligent assistant designed for quick and efficient help with various tasks, including spelling correction, code generation, and other AI-powered solutions to enhance productivity and accuracy.

## Prerequisites
Ensure you have the following before running the script:
- PHP 8.1 or higher
- Required dependencies (autoloaded via `config/autoload.php`)
- Webhook URL and token configured in the environment variables

## Installation
1. Clone the repository or download the script.
2. Ensure you have Composer installed and run:
   ```sh
   composer install
   ```
3. Configure your environment variables:
   - `WEBHOOK_URL`: The URL of the webhook API.
   - `WEBHOOK_TOKEN`: The authentication token for the webhook.

## Usage
Run **AI Agent** from the command line with one of the following options:
```sh
php aiagent.php --spelling="your text here"
php aiagent.php --translate="your text here"
php aiagent.php --help
```

### Parameters
- `--spelling`: Corrects the spelling of the provided text.
- `--translate`: Translates the provided text.
- `--help`: Displays usage information and available options.

## Example
```sh
php aiagent.php --spelling="Ths is an exmple."
# Output: "This is an example."

php aiagent.php --translate="Hello world!"
# Output: "Bonjour le monde!"
```
