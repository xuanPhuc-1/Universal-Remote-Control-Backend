pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Checkout mã nguồn từ GitHub
                git 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Deploy') {
            steps {
                // Thực hiện các bước triển khai sau khi đã checkout mã nguồn
                sh 'ls -la'
                // Thêm các bước triển khai khác nếu cần
            }
        }
    }
}
