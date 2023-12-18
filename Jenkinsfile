pipeline {
    //run on agent with label 'iot'
    agent { label 'CentOS' }

    stages {
        stage('Checkout') {
            steps {
                // Checkout GitHub source code
                git credentialsId: '14e38fce-6699-4e83-adbd-3922e615dced', url: 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Check Laravel Application') {
            steps {
                // Let Agent update source code
                sh 'git pull origin master'
                echo 'Pull source code from GitHub successfully'
                //echo Current directory
                sh 'pwd'
                //echo list file and folder in current directory
                sh 'ls'
            }
        }
    }
}
