node{
	stage('git checkout'){
		git 'https://github.com/asif-ali-244/mysql-jenkins-pipeline.git'
	}
	stage('docker build'){
		sh 'sudo docker-compose up -d .'
	}
}