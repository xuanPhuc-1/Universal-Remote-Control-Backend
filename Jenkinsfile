pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Checkout mã nguồn từ Git
                git 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Update Source Code') {
            steps {
                //update source code for backend
                sh 'ls -la'
                sh 'echo "$PWD"'
            }
        }

        
    }
}