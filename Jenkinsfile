pipeline {
	agent none
	stages {
		stage('Integration UI Test') {
			parallel {
				stage('Deploy') {
				    agent any
				    steps {
				        sh 'apt-get update -y'
				        sh 'apt-get install -y python'
				        sh 'py app.py'
				        // rest of your deployment steps
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
						sh 'mvn -B -DskipTests clean package'
						sh 'mvn test'
					}
				}
			}
		}
	}
}
