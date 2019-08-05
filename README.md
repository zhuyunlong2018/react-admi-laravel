# ReactAdmin-Laravel

#### 介绍
ReactAdmin项目适配的后台，使用laravel框架

前后端分离，react全家桶+laravel+jwt，细化到API层级后台权限管理

[配套前端ReactAdmin](https://gitee.com/zhuyunlong2018/ReactAdmin)

#### 本机环境

1. php: v7.2.1
2. laravel: v5.8
3. composer: v1.8.5
4. redis: v3.2.1

#### 安装教程
1. 下载源码和扩展
```shell
$ git clone https://gitee.com/zhuyunlong2018/ReactAdmin-Laravel.git

$ cd ReactAdmin-Laravel

#注意，php需要安装php_fileinfo扩展
$ composer install
```
2. 配置数据库

使用migrate：
```shell
#1复制./env.example文件为.env文件并修改其中配置参数为自己本地环境
#2修改./config/database.php的数据库等配置

#3新建空数据库lr_manager

#4运行下面命令生成数据库表结构
$ php artisan migrate

#5填充数据
$ php artisan db:seed

```
不使用migrate的话，可以直接新建空数据库后，将./database/lr_manager.sql导入数据库中


3. 运行项目(后台账号：admin,密码: 123456)

```shell
$ php artisan serve
```


4. 已有数据库表结构生成migration文件
```shell
#注意命令生成了migrations表文件需要删除掉
$ php artisan migrate:generate
```

5. 已有数据表数据导出seed文件
```shell
$ php artisan iseed 表名
#本项目备份：php artisan iseed admins,roles,users,menus,admin_role

#导出数据并且强制覆盖：
$ php artisan iseed 表名1[,表名2...]--force

#导出指定的数据库里指定的表，并生成seed文件：
$ php artisan iseed 表名--database=数据库名

#最后执行命令重新执行 migrate 文件并且填充 seed 文件数据：
$ php artisan migrate:refresh --seed
```

#### 参与贡献

1. Fork 本仓库
2. 新建 Feat_xxx 分支
3. 提交代码
4. 新建 Pull Request
