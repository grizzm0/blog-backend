#!/bin/bash

docker run --rm --interactive --tty \
    --volume ~/.composer:/composer \
    --volume $PWD:/app \
    composer $@
