#!/bin/bash

_aiagent_completion() {
    local cur prev options

    cur="${COMP_WORDS[COMP_CWORD]}"
    prev="${COMP_WORDS[COMP_CWORD-1]}"

    options="--spelling= --translate= --help"

    COMPREPLY=($(compgen -W "$options" -- "$cur"))

    if [[ "${COMPREPLY[0]}" != "--help" ]]; then
        compopt -o nospace
    fi
}

complete -F _aiagent_completion aiagent
