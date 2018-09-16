
# To get this working in your local machine. Kindly follow this steps.


## Step 1
- [x] Assuming you already have PHP and MySQL in your local machine.
## Step 2
- [x] Download and install Composer.exe at https://getcomposer.org/download/
## Step 3
- [x] Open cmd then type where you put the folder BackEndDeveloperChallenge
- [x] Example cd Desktop\BackEndDeveloperChallenge
## Step 4
- [x] Install the packages using this command: "composer update"
## Step 5
- [x] Go to MySQL and create a schema name 'twitter'
## Step 6
- [x] Go back in cmd then type this command: php artisan migrate
## Step 7
- [x] Create a twitter account and request for API Key. 
- [x] We need the following consumer key,consumer secret,access token and access token secret.
- [x] then put it on config/ttwitter.php.
'CONSUMER_KEY'        => function_exists('env') ? env('TWITTER_CONSUMER_KEY', '//consumer key') : '',
'CONSUMER_SECRET'     => function_exists('env') ? env('TWITTER_CONSUMER_SECRET', '//consumer secret') : '',
'ACCESS_TOKEN'        => function_exists('env') ? env('TWITTER_ACCESS_TOKEN', '//access token') : '',
'ACCESS_TOKEN_SECRET' => function_exists('env') ? env('TWITTER_ACCESS_TOKEN_SECRET', '//access token secret') : '',
## Step 8
- [x] Then rename the .env.example to .env
- [x] Edit the details of the following :
- [ ] APP_URL=http://localhost:8000
- [ ] DB_DATABASE = twitter
- [ ] DB_USERNAME = //yourdatabaseusername
- [ ] DB_PASSWORD = //yourdatabasepassword
- [ ] MAIL_DRIVER=smtp
- [ ] MAIL_HOST=smtp.gmail.com
- [ ] MAIL_PORT=587
- [ ] MAIL_USERNAME=//youremailaddress
- [ ] MAIL_PASSWORD=//yourpassword
- [ ] MAIL_ENCRYPTION=tls
## Step 9
- [x] Then type this command: php artisan serve
- [x] You must see this output: Laravel development server started: <http://127.0.0.1:8000>
## Step 10
- [x] Go to your browser then type http://localhost:8000



