pipeline {
    agent { label 'my-slave-CentOS7' }

    environment {
        GIT_REPO_URL = 'https://github.com/xuanPhuc-1/Universal-Remote-Control-Backend.git'
        GIT_CREDENTIALS_ID = '3882ac5f-eb39-422e-81ab-e29e9f84ab33'
        GIT_BRANCH = 'master'
    }

    stages {
        stage('Update Source Code') {
            steps {
                script {
                    try {
                        git credentialsId: GIT_CREDENTIALS_ID, url: GIT_REPO_URL
                        sh "git pull origin ${GIT_BRANCH}"
                        echo 'Successfully update source code'
                    } catch (Exception e) {
                        error("Failed to update: ${e.message}")
                    }
                }
            }
        }
        stage('Preparation') {
            steps {
                script {
                    sh 'pwd'
                    //run the install_components.sh script
                    sh 'chmod +x ./install-components.sh'
                    sh './install-components.sh'
                    echo 'Successfully install components'
                }
            }
        }
        // stage('Build and Deploy') {
        //     steps {
        //         script {
        //             // Install dependencies using Composer
        //             sh "${COMPOSER_PATH} install --no-interaction --prefer-dist"

        //             // Run any additional setup or configuration steps

        //             // Run Composer dump-autoload and Laravel migration
        //             sh "${COMPOSER_PATH} dump-autoload --optimize"
        //             sh "php artisan migrate --force"
        //             echo 'Successfully deployed'
        //         }
        //     }
        // }

        // Add additional stages for your application build and deployment
    }
}
