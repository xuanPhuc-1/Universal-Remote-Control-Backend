pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Checkout mã nguồn từ Git
                git 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Build') {
            steps {
                // Thực hiện bất kỳ công việc xây dựng nào nếu cần
            }
        }

        stage('Deploy') {
            steps {
                // Thực hiện các bước triển khai lên máy chủ với tài khoản và mật khẩu
                script {
                    sh 'sshpass -p "leduc" ssh pi@iotdomain@giize.com "cd ~/docker-compose-laravel/Universal-Remote-Control-Backend && git pull"'
                }
            }
        }
    }

    post {
        success {
            // Các bước thực hiện khi pipeline thành công
            //Thông báo thành công
            slackSend (color: '#00FF00', message: "Deploy thành công")
        }
        failure {
            // Các bước thực hiện khi pipeline thất bại
            //Thông báo thất bại
            slackSend (color: '#FF0000', message: "Deploy thất bại")
        }
    }
}
