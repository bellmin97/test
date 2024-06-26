#!/bin/bash
echo "Stopping the Spring Boot application..."
pkill -f 'java -jar /home/ec2-user/your-app.jar'
