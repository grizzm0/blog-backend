#!/bin/bash

docker-compose exec application php vendor/bin/doctrine $@
