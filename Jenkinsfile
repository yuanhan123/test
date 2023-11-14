pipeline {
    agent any

    stages {
        stage('Update Package Repositories') {
            steps {
                script {
                    sh 'apk update'
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

        stage('Install Python and Pip') {
            steps {
                script {
                    sh 'apk add python3'
                    sh 'python3 -m ensurepip'
                    sh 'ln -s /usr/bin/pip3 /usr/bin/pip'
                }
            }
        }

        stage('Install pytest') {
            steps {
                script {
                    sh 'pip install pytest'
                }
            }
        }

        // Add other stages as needed
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
