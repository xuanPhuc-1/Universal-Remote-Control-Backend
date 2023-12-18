pipeline {
    //run on agent with label 'iot'
    agent { label 'CentOS' }

    stages {

        stage('Check Laravel Application') {
            steps {
                //use user name and password in credentials to login to the git hub
                git credentialsId: '3882ac5f-eb39-422e-81ab-e29e9f84ab33', url: 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
                //run the command to check the laravel application
                sh 'git pull origin master'
                echo 'Successfully checked the Laravel Application'
            }
        }
    }
}
