#!/bin/bash

docker run --rm --interactive --tty \
    --volume ~/.composer:/composer \
    --volumes-from="$(docker-compose ps -q application | head -1)" \
    composer $@
