# 以laravel5.2框架开发的CMS系统


## System Requirements
开发环境为php7.0, mysql5.7

## featrue
1. article curl
2. user curl
3. no rbac
4. category like tag, many to many articles

## Installation

1. git clone
2. cp .env.example .env
   vi .env
   配置数据库
3. php artisan migration
4. php artisan seed
   测试环境下的填充数据
5. 在/public目录下需要建立目录/img/page_img, /img/upload


## Admin login details
- Url: sites-public-url/backend
- admin : admin@admin.com - 123


##ToDo
- 输入表单验证
- 消息提示
- 缓存更新事件