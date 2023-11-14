# Dockerfile

# Use an official Node.js runtime as a parent image
FROM node:14

# Set the working directory in the container
WORKDIR /usr/src/app

# Install any needed packages specified in package.json
COPY package*.json ./
RUN npm install

# Bundle app source
COPY . .

# Install Git
RUN apt-get update && \
    apt-get install -y git

# Configure Git
RUN git config --global user.name "yuanhan123" && \
    git config --global user.email "2101525@sit.singaporetech.edu.sg"

# Make port 80 available to the world outside this container
EXPOSE 80

# Define environment variable
ENV NODE_ENV=production

# Run app.js when the container launches
CMD ["npm", "start"]
