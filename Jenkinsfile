pipeline {
    agent { label 'my-slave-CentOS7' }

    environment {
        GIT_REPO_URL = 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
        GIT_CREDENTIALS_ID = '3882ac5f-eb39-422e-81ab-e29e9f84ab33'
        GIT_BRANCH = 'master'
    }

    stages {
        stage('Check Laravel Application') {
            steps {
                script {
                    try {
                        git credentialsId: GIT_CREDENTIALS_ID, url: GIT_REPO_URL
                        sh "git pull origin ${GIT_BRANCH}"
                        echo 'Successfully checked the Laravel Application'
                    } catch (Exception e) {
                        error("Failed to check the Laravel Application: ${e.message}")
                    }
                }
            }
        }
    }
}
