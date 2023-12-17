pipeline {
    //run on agent with label 'iot'
    agent { label 'iot' }

    stages {
        stage('Checkout') {
            steps {
                // Checkout mã nguồn từ GitHub
                git 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Deploy') {
            steps {
                // Cho agent cap nhat source code
                sh 'git pull origin master'
                echo 'Deploying....'
            }
        }
    }
}
