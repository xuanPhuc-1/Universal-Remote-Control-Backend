pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Checkout mã nguồn từ Git
                git 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // Thực hiện các bước triển khai lên máy chủ với tài khoản và mật khẩu
                    sshagent(['pi']) {
                    sh 'ssh pi@iotdomain.giize.com "cd ~/docker-compose-laravel/Universal-Remote-Control-Backend && git pull"'
                }
                }
            }
        }
    }
}
