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


## Admin login details
- Url: sites-public-url/backend
- admin : admin@admin.com - 123


##ToDo
- 输入表单验证
- 消息提示
- 缓存更新事件

---
##接口文档
---

###首页

- 列表

    /api/article
    
    返回分页对象
    
    ```
    {
        "total": 30,  //文章总数             
        "per_page": 10,  //每页文章数
        "current_page": 1,   //目前在第几页
        "last_page": 3,      //最后页数
        "next_page_url": "http://cms.dev/api/article?page=2", //下一页url
        "prev_page_url": null, //上一页url
        "from": 1,  //从第一个
        "to": 10,   //到第10个
        "data": [
            {
                "id": 30,
                "title": "in qui saepe",  //标题
                "summary": "Similique quisquam quo deserunt quis sed.",
                //概要
                "page_img": "2.jpg",
                //页头图片名 src = '/img/page_img/2.jpg'
                "content": "Quo tempora ut praesentium iusto suscipit perspiciatis et blanditiis. Non distinctio officia consequatur rerum repellat voluptate ut. Et perferendis nihil voluptatum numquam et blanditiis nemo.",
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

  /api/slider
  
  返回数组
  
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