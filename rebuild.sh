#!/bin/sh

# Builder helper
rm -R vendor/arx/utils
mkdir -p "vendor/arx/utils"
cp -R ../utils/ vendor/arx/utils/
