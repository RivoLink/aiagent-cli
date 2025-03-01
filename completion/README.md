# AI Agent Bash Auto-Completion

## Description

This Bash script provides auto-completion for the `aiagent` command, allowing users to quickly complete available options when typing commands in the terminal.

## Features

- Supports auto-completion for `aiagent` options.
- Provides tab-completion for:
  - `--spelling=`
  - `--translate=`
  - `--help`
- Ensures proper handling of spaces when completing options.

## Installation

1. Copy the script into a file named `aiagent-completion.sh`.
2. Add execution permissions:
   ```sh
   chmod +x aiagent-completion.sh
   ```
3. Move the script to the Bash completion directory and rename it as `aiagent`:
   ```sh
   mkdir -p ~/.bash_completion
   mv aiagent-completion.sh ~/.bash_completion/aiagent
   ```
4. Ensure that the Bash completion directory is sourced in your `~/.bashrc` by adding the following line (if not already present):
   ```sh
   for f in ~/.bash_completion/*; do
       . "$f"
   done
   ```
5. Reload the shell configuration:
   ```sh
   source ~/.bashrc
   ```

## Usage

Once installed, type `aiagent` followed by `--` and press `Tab` to see the available options:

```sh
$ aiagent --<Tab>
--spelling=   --translate=   --help
```

## Uninstallation

To remove the auto-completion, delete the script:

```sh
rm ~/.bash_completion/aiagent
```

Then reload your shell:

```sh
source ~/.bashrc
```
