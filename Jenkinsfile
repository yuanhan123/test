pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Check out the source code from your version control system
                checkout scm
            }
        }
        stage('Install pytest') {
            steps {
                script {
                    sh 'pip install pytest'
                        }
                }
        }


        stage('Run Tests') {
            steps {
                // Run integration tests using pytest
                script {
                    sh 'pytest tests/integration_tests.py'
                }
            }
        }

        stage('UI Testing') {
            steps {
                // Run UI tests using Selenium
                script {
                    sh 'python ui_tests.py'
                }
            }
        }

        stage('Build and Deploy') {
            steps {
                // Additional steps for building and deploying your Flask app
                script {
                    sh'python app.py'
                }
            }
        }
    }

    post {
        failure {
            // Send notifications on failure
            emailext subject: 'Flask App Build Failed',
                      body: 'Something went wrong with the build. Please check the Jenkins console output for details.',
                      to: 'your@email.com'
        }
    }
}
