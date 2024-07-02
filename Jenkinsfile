pipeline {
    agent any

    environment {
        // Define your environment variables
        SERVER_USER = 'cygner'
        SERVER_HOST = '192.168.0.214'
        SERVER_PATH = '/var/www/laravel-tenancy'
        REPO_URL = 'git@github.com:trupen1010/laravel-tenancy.git' // Replace with your repository URL
    }

    stages {
        stage('Deploy to Production') {
            steps {
                script {
                    catchError(buildResult: 'SUCCESS', stageResult: 'FAILURE') {
                        // SSH into the server, clone the repository if it doesn't exist, otherwise pull the latest changes
                        sh """
                        ssh ${env.SERVER_USER}@${env.SERVER_HOST} << 'ENDSSH'
                            if [ -d "${env.SERVER_PATH}" ]; then
                                cd ${env.SERVER_PATH}
                                php artisan down
                                git pull
                            else
                                mkdir -p ${env.SERVER_PATH}
                                cd ${env.SERVER_PATH}
                                git clone ${env.REPO_URL} .
                            fi
                            cd ${env.SERVER_PATH}
                            cp .env.example .env
                            composer install
                            npm install
                            php artisan up
                        ENDSSH
                        """
                    }
                }
            }
        }
    }
}
