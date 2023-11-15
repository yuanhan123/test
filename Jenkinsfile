pipeline {
	agent any
	stages {
		stage('Checkout SCM') {
			steps {
				// put ur github link
				git 'https://github.com/yuanhan123/test.git'
			}
		}

		stage('OWASP DependencyCheck') {
			steps {//suppression = ignore vulnerabililes)
				dependencyCheck additionalArguments: '--format HTML --format XML --suppression suppression.xml', odcInstallation: 'OWASP Dependency-Check Vulnerabilities'
																			//name of ur pipeline
			}
		}
	}	
	post {
		success {
			dependencyCheckPublisher pattern: 'dependency-check-report.xml'
		}
	}
}
