# Slim_base_mvc——基于slim的mvc框架

Slim是一款 PHP 微框架，可以帮助你快速编写简单但功能强大的 web 应用和 API 。在它的核心，Slim 是一个调度程序，它接收一个 HTTP 请求，调用一个适当的回调例程，然后返回一个 HTTP 响应。就这样简单。是的，就是接受**请求、回调、返回响应**。slim框架是一个moderm php框架，由文档可知，文档主要描述的就是**请求、响应、路由**三块内容，并且框架的[概念](http://45.63.120.39/docs/concepts/value-objects.html)一章，描述了slim实现的主要思想。

但是阅读slim文档，发现大多的操作都在一个.php文件中实现并执行完毕，这样的确是实践了Slim框架的“微”，但是带来的问题是——**代码组织结构的不明确对项目的协作开发十分不利**。故我根据一些简单原理（自动加载原理，单一入口等），基于slim框架，拓展了该框架的代码组织结构能力，希望能使该框架支持中型项目。

详细实现思路与过程请参考博文：[开发一个基于slim的mvc框架](https://lucienven.github.io/post/%E5%BC%80%E5%8F%91%E4%B8%80%E4%B8%AA%E5%9F%BA%E4%BA%8Eslim%E7%9A%84mvc%E6%A1%86%E6%9E%B6/)

### 为什么要基于slim框架？

1. slim是一个微框架，也就是说代码体积很小，并不是像ThinkPHP，或者larvael框架一般提供十分完整的操作逻辑。就此或许能描述为：slim框架设计的本意就是——人们不一定需要大型框架的全部功能，开发者可以自行选择自己所需要的。
2. 支持psr7的请求与响应对象，支持容器，支持中间件——modern php framework，也就是说slim虽然小，但是足够应对基础场景。

就此，明确的是，并非本人独立开发了一个php框架（笑，而是**本框架基于slim框架，然后对于官方文档中代码组织结构的不明晰，故而对该部分进行更为MVC的代码组织结构上的修改**。主要实现内容，slim框架中已有很好的实现，另一部分可以说本文是在slim框架下开发的一个应用而已。



### 框架目录结构

```php
.
├── App				# 应用程序
├── Core				# 框架核心类
├── composer.json		
├── composer.lock
├── public				# 入口文件
└── vendor	
```

App 应用程序目录

```php
./
├── Action							# 控制器层
│   └── Test.php
├── Dependencies.php							# 容器定义
├── Middleware							# 中间件文件定义
│   ├── FirstMiddleware.php
│   ├── SecondMiddleware.php
│   └── SimpleMiddleware.php
├── Model							# 模型层
│   └── Test.php
├── Router							# 路由文件定义
│   └── test.route.php
└── Settings.php							# 项目配置文件
```



### 快速使用

快速使用，一般而言也就是如何进行curd操作。

1. 配置文件，定义数据库连接信息等。
2. 在应用目录中的Router目录下，进行路由定义，路由文件后缀名为.route.php
3. 编写controller，继承Core/Action基类（本框架中Action为控制器类，与平常使用的Controller有些区别，但也只是单词使用不同而已，实质内容与作用相同）
4. 编写model，基础Core/Model基类，```protected $table = 'table_name';```定义好准备连接的数据表名
5. 对于redis，或者monolog此类组件，可以在Dependencies.php容器类中定义，然后可在全局使用。
6. 在应用目录中的Middleware目录，进行中间件定义
7. 中间件的使用（大多情况是使用路由中级键），故可在对应.route.php路由文件中进行使用