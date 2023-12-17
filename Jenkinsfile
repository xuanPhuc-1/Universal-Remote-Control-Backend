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
                //use ssh agent to connet to server with credential id 54dabf6c-3ab9-4af2-b1df-63b01188d4a5
                sshagent(['54dabf6c-3ab9-4af2-b1df-63b01188d4a5']) {
                    //run command on server
                    sh 'cd /home/pi/docker-compose-laravel/Universal-Remote-Control-Backend/ && git pull origin master'
                    echo 'Deploy Success'
                }
            }
        }

        
    }
}