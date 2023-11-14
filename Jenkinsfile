pipeline {
    agent any
    stages {
        stage('Integration UI Test') {
            parallel {
                stage('Deploy') {
                    steps {
                        script {
                            // Create a Python virtual environment
                            sh 'python3 -m venv venv'
                            
                            // Activate the virtual environment
                            sh 'source venv/bin/activate'

                            // Install dependencies and run your app
                            sh 'pip install flask'  // Adjust if you have a requirements file
                            sh 'py app.py'

                            // rest of your deployment steps

                            // Deactivate the virtual environment
                            sh 'deactivate'
                        }
                    }
                }
                stage('Headless Browser Test') {
                    agent {
                        docker {
                            image 'maven:3-alpine'
                            args '-v /root/.m2:/root/.m2'
                        }
                    }
                    steps {
                        // Assuming you want to run Maven inside the virtual environment
                        sh 'source venv/bin/activate && mvn -B -DskipTests clean package && mvn test && deactivate'
                    }
                }
            }
        }
    }
}
