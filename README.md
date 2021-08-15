# Self Weblog 
![shot01](./shots/001.png)
![shot02](./shots/002.png)
![shot03](./shots/003.png)

This is a self weblog project free to use.

### A little help needed? 
The Admin [Which is you] is the one who post articles in this weblog.
Other people comes in and comments to your articles.

### Setup 
1. `git clone https://github.com/KhalidObaide/Self-Weblog-Laravel.git`
2. `cd Self-Weblog-Laravel/weblog/`
3. `composer install`
4. `mv .env.example .env`
5. `php artisan key:generate`
6. `touch ./database/database.sqlite`
7. edit .env file on line 9 : `DB_CONNECTION = sqlite`
8. `php artisan migrate`
9. `php artisan serve`
10. And There Is your weblog open the browser on http://127.0.0.1:8000


### Tutorial 
The Complete process of making this in laravel is avalible in :  https://www.youtube.com/channel/UCLRqcPs2OOPOEkew2Y-eoKw
It is kind of streaming for long time no break challenge
