#!/bin/bash
service apache2 stop
nohup java -jar /home/test/taskmanager-1.0.0.jar > /dev/null 2>&1 &
service apache2 start
