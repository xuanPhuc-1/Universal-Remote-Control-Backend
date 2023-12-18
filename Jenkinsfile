pipeline {
    //run on agent with label 'iot'
    agent { label 'CentOS' }

    stages {
        stage('Checkout') {
            steps {
                // Checkout GitHub source code
                git 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
            }
        }

        stage('Check Laravel Application') {
            steps {
                // Let Agent update source code
                sh 'git pull origin master'
                echo 'Pull source code from GitHub successfully'
                //echo Current directory
                sh 'pwd'

            }
        }
    }
}
