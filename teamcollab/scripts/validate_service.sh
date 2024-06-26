#!/bin/bash
echo "Validating the Spring Boot application..."
# Customize this to validate your application's health endpoint or other criteria
curl -f http://localhost:8080/actuator/health || exit 1
