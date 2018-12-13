Laravel Youtube
=========

[![Build Status](https://travis-ci.org/Kolpikov/laravel-youtube.svg?branch=master)](https://travis-ci.org/Kolpikov/laravel-youtube)
[<img src="https://poser.pugx.org/kolpikov/laravel-youtube/d/total.svg" alt="Total Downloads">](https://packagist.org/packages/kolpikov/laravel-youtube)
[<img src="https://poser.pugx.org/kolpikov/laravel-youtube/v/stable.svg" alt="Latest Stable Version">](https://packagist.org/packages/kolpikov/laravel-youtube)
[<img src="https://poser.pugx.org/kolpikov/laravel-youtube/license.svg" alt="License">](https://packagist.org/packages/kolpikov/laravel-youtube)

Basic Youtube API v.3 support for the Laravel framework

## Requirements

- PHP 7.1 or higher;
- PHP extensions: JSON, CURL;
- Laravel 5.7 or higher;
- Youtube API key from [Google Console](https://console.developers.google.com);

## 1. Install Laravel Youtube

Run this at the command line:
```
composer require kolpikov/laravel-youtube
```
## 2. Copy config file into your application
```
 php artisan vendor:publish --tag=laravel-youtube-config
```
## 3. Set your Youtube API key
In your .env file add new line:
```
YOUTUBE_API_KEY={{YOUR_KEY_HERE}}
```
Where **{{YOUR_KEY_HERE}}** is your key from Youtube API.

## Usage example:
The code below outputs contentData about Video:
```php
$videoID = "{{ANY_VIDEO_ID}}";
$data = \Kolpikov\Youtube\Facades\Youtube::getContentDetails($videoID);
dump($data);
```
 No Technical Support!
--------------------------------------------------------------------------------

Sorry, **I don't provide any kind of technical support** in any cases.

 License
--------------------------------------------------------------------------------

This library is open-sourced software licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

**Copyright © 2018 Kolpikov Andrey**

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

