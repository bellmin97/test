#!/bin/bash
echo "Installing dependencies..."
sudo yum update -y
sudo amazon-linux-extras install java-openjdk11 -y
