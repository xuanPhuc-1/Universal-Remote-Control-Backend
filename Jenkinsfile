pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Checkout mã nguồn từ Git
                git 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Check Laravel Application') {
            steps {
                echo 'Deploying Laravel Application...'
            }
        }
    }
}
    

