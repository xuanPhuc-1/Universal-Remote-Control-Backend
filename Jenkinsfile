pipeline {
    //run on agent with label 'iot'
    agent { label 'CentOS' }

    stages {

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
