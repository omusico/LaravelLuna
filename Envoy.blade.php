@servers(['web' => '192.168.1.1'])

@task('deploy', ['on' => 'web'])
cd site
git pull origin master
php artisan migrate
@endtask