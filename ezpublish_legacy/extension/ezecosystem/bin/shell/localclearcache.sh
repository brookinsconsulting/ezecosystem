#!/bin/bash

sudo -u _www ./bin/php/ezcache.php --clear-$1;

exit;