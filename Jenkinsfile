pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Checkout mã nguồn từ Git
                git 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Deploy Laravel Application') {
            steps {
                // Replace 'ssh-credentials-id' with your SSH credentials ID in Jenkins
                sshagent(['pi']) {
                    // Replace 'your-deployment-server' with your server's IP or domain
                    sh "ssh iotdomain.giize.com 'cd ~/docker-compose-laravel/Universal-Remote-Control-Backend && git pull origin master'"
                }
            }
        }
    }
}
    

