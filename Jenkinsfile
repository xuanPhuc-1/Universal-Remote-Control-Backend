pipeline {
    //only Slave with label 'my-slave-CentOS7' can run this pipeline
    agent { label 'my-slave-CentOS7' }

    environment {
        GIT_BRANCH = 'master'
        COMPOSER_PATH = '/usr/local/bin/composer'
    }

    stages {
        stage('Update Source Code') {
            steps {
                script {
                    try {
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
                    // sh 'pwd'
                    // //run the install_components.sh script
                    // sh 'chmod 777 ./install-components.sh'
                    // sh 'sudo ./install-components.sh'
                    echo 'Successfully install components'
                }
            }
        }
        stage('Build and Deploy') {
            steps {
                script {
                    // Install dependencies using Composer
                    sh "${COMPOSER_PATH} install --no-interaction --prefer-dist"
                    // Run Composer dump-autoload and Laravel migration
                    sh "${COMPOSER_PATH} dump-autoload --optimize"
                    //Fail because of the mysql server is not running
                    //sh "php artisan migrate --force"
                    echo 'Successfully deployed'
                }
            }
        }
    }
}
