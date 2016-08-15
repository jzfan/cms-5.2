# 以laravel5.2框架开发的CMS系统
---

## System Requirements
开发环境为php7.0, mysql5.7

## featrue
1. article curl
2. user curl
3. slider curl
3. no rbac
4. category like tag, many to many articles

## Installation
1. git clone

1. composer install

2. cp .env.example .env

   vi .env

   配置数据库

3. php artisan migration

4. php artisan seed

   测试环境下的填充数据

5. 在/public目录下需要建立目录/img/page_img, /img/upload

## Demo
> [测试站: http://120.76.72.51/backend](http://120.76.72.51/backend)

## Admin login details
- Url: sites-public-url/backend
- admin: 88888888 - 123

## ToDo
- 缓存更新事件
- CSS, JS 合并压缩
- 图片resize, 缓存
- category select2

---

## 接口文档

---

| 参数        | 说明 |参数        | 说明 |
| ------------- |:-------------:| ------------- |:-------------:|
|    total   |   文章总数   | title   |   标题   |
|  per_page   | 每页文章数  | summary   | 概要  |
| current_page | 目前在第几页 | page_img | 页头图片名 |
| last_page | 最后页数 | current_page | 内容 |
| next_page_url | 下一页url |source | 来源 |
| prev_page_url | 上一页url |provider | 提供者 |
| from | 从第几个 |created_at | 创建时间 |
| to | 到第几个 |updated_at | 更新时间 |


| code | message | 说明 |
|---|:---:|:--:|
| 200 | ok |--|
| 400 | token_invalid | 错误token |
| 401 | token_expired | 过期token |
| 404 | user_not_found | 用户未找到 |
| 1401 | invalid_credentials | 用户名/密码 错误 |

### 首页

- 列表

    > 请求地址：/api/article
   
    > 请求方法：get
    
    > 返回: 返回分页对象
    
    ```
    {
    "data": {
        "per_page": 10,
        "current_page": 1,
        "next_page_url": "http://cms.dev/api/article?page=2",
        "prev_page_url": null,
        "from": 1,
        "to": 10,
        "data": [
            {
                "id": 32,
                "title": "ut dolor earum",
                "summary": "Maiores ipsam sed sed.",
                "page_img": "1.jpg",
                "content": "Impedit rerum omnis suscipit rerum est commodi. Voluptates dolorem voluptas voluptatem suscipit ipsam incidunt asperiores incidunt. Similique dolor eveniet eius laborum ut dignissimos.",
                "source": "example.com",
                "provider": "Dr. Arely Pfeffer MD",
                "created_at": "2016-08-11 11:06:05",
                "updated_at": "2016-08-11 11:06:05"
            },
            ......
        ]
    },
    "code": 200,
    "message": "ok"
    }
    ```
    
- 焦点图

  > 请求地址：/api/slider
  
  > 请求方法：get
 
  > 返回：返回数组
  
   ```
    {
        "data": [
            {
                "id": 1,
                "title": "1111111",
                "img": "/img/slider/Koala.jpg",
                "link": ""
            },
            {
                "id": 2,
                "title": "22",
                "img": "/img/slider/1.jpg",
                "link": ""
            }
        ],
        "code": 200,
        "message": "ok"
        }
    ```
### 分类页

- 列表

    > 请求地址：/api/category/category-id
   
    > 请求方法：get
    
    > 返回: 返回分页对象
    
    ```
    {
    "data": {
        "per_page": 10,
        "current_page": 1,
        "next_page_url": null,
        "prev_page_url": null,
        "from": 1,
        "to": 3,
        "data": [
            {
                "id": 1,
                "title": "optio dolor id",
                "summary": "Quis molestiae qui possimus corrupti est blanditiis fugiat.",
                "page_img": "2.jpg",
                "content": "Qui dolores molestiae sit. Ex ab est incidunt fugiat. Autem culpa aspernatur et autem et dolor voluptas. Voluptatibus ut blanditiis incidunt consequatur suscipit ipsum quia.",
                "source": "example.com",
                "provider": "Dolores Quigley DVM",
                "created_at": "2016-08-11 11:06:05",
                "updated_at": "2016-08-11 11:06:05"
            },
            ......
        ]
    },
    "code": 200,
    "message": "ok"
   }
   ```

### login
 > 请求地址： /api/login

 > 请求方法: post

 > 请求参数:
 
| 参数 | 说明 |
|:---:|:---:|
| phone | 手机号码 |
| password | 密码 |

 > 返回：token

```
{
    "data": {
        "token": "eyJ0eXA.."
    },
    "code": 200,
    "message": "ok"
}
```

### user
 > 请求地址： /api/user/?token={yourtokenhere}

 > 请求方法: get

 > 返回：用户对象
 
```
{
    "data": {
        "user": {
            "id": 1,
            "name": "admin",
            "gender": "保密",
            "email": "admin@admin.com",
            "phone": "88888888",
            "avatar": "default.png",
            "created_at": "2016-08-11 11:06:04",
            "updated_at": "2016-08-15 11:33:20"
        }
    },
    "message": "ok",
    "code": 200
}
```
