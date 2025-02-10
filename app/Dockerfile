# Use the official PHP image as base
FROM php:8.1-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy the application files to the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/