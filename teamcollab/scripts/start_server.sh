#!/bin/bash
echo "Starting the Spring Boot application..."
nohup java -jar /home/ec2-user/your-app.jar > /home/ec2-user/your-app.log 2>&1 &
