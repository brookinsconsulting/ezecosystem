#!/bin/bash

DATE=$(date +"%Y.%m.%d--%H%M");

## touch ezecosystem.$DATE.log;

mysqldump -h mysql.ctyme.com -u perkel ezecosystem -p > ezecosystem.$DATE.log;
