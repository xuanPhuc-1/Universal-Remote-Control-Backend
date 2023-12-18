pipeline {
    //run on agent with label 'iot'
    agent { label 'CentOS' }

    stages {

        stage('Check Laravel Application') {
            steps {
                //use user name and password in credentials to login to the git hub
                git credentialsId: '14e38fce-6699-4e83-adbd-3922e615dced', url: 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
                //run the command to check the laravel application
                sh 'git pull origin master'
                echo 'Successfully checked the Laravel Application'
            }
        }
    }
}
