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
> [测试站](http://120.76.72.51/backend)

## Admin login details
- Url: sites-public-url/backend
- admin : admin@admin.com - 123
- 
## ToDo
- 缓存更新事件
- CSS, JS 合并压缩
- 图片resize, 缓存

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

### 首页

- 列表

    > 请求地址：/api/article
   
    > 请求方法：get
    
    > 返回: 返回分页对象
    
    ```
    {
        "total": 30,            
        "per_page": 10,  
        "current_page": 1, 
        "last_page": 3,
        "next_page_url": "http://cms.dev/api/article?page=2", 
        "prev_page_url": null,
        "from": 1, 
        "to": 10, 
        "data": [
            {
                "id": 30,
                "title": "in qui saepe", 
                "summary": "Similique quisquam quo deserunt quis sed.",
                "page_img": "2.jpg",
                //页头图片名 src = '/img/page_img/2.jpg'
                "content": "Quo tempora ut praesentium iusto suscipit perspiciatis et blanditiis. Non distinctio officia consequatur.",
               //内容
               "source": "example.org", //来源
                "provider": "Nick Heaney", //提供者
                "created_at": "2016-08-08 06:17:03", //创建时间
                "updated_at": "2016-08-08 06:17:03"  //更新时间
            },
             ...
        ]
    }
    ```
    
- 焦点图

  > 请求地址：/api/slider
  
  > 请求方法：get
 
  > 返回：返回数组
  
   ```
    [
        {
            "id": 1,
            "title": "Hic rerum sapiente optio.aaa", //标题
            "img": "/img/slider/Desert.jpg",  //图片地址
            "link": "/article/433"  //链接地址
        },
        {
            "id": 3,
            "title": "A quia maxime possimus ad nobis.",
            "img": "/img/slider/Tulips.jpg",
            "link": "/article/33"
        },
        {
            "id": 4,
            "title": "11",
            "img": "/img/slider/Chrysanthemum.jpg",
            "link": "2"
        }
    ]
    ```
### 分类页

- 列表

    > 请求地址：/api/category/category-id
   
    > 请求方法：get
    
    > 返回: 返回分页对象
    
    ```
    {
    "total": 2, 
    "per_page": 10, 
    "current_page": 1, 
    "last_page": 1, 
    "next_page_url": null, 
    "prev_page_url": null, 
    "from": 1, 
    "to": 2, 
    "data": [
        {
            "id": 3, 
            "title": "ut qui iste", 
            "summary": "Maxime officiis quas unde assumenda nisi consequuntur nostrum.", 
            "page_img": "3.jpg", 
            "content": "Sapiente eum aut tempora ipsam rerum velit. A et tempora unde totam. Fugiat molestias et culpa voluptatibus. Enim est dolores vitae voluptatem vel blanditiis officiis.", 
            "source": "example.com", 
            "provider": "Ms. Peggie Kovacek MD", 
            "created_at": "2016-08-11 11:06:05", 
            "updated_at": "2016-08-11 11:06:05"
        }, 
     ...
    ]
    }
    ```