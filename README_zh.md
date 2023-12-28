**中文** | [English](README_en.md)

--------

<p align="center">
	<img src="images/lei.jpg" width="300" height="300">
</p>
<h1 align="center" style="margin: 30px 0 30px; font-weight: bold;">AL<br/>Ansible LNMP - 使用ansible部署lnmp</h1>



### 1：简介

本项目用于使用ansible来批量部署nginx、mysql、php，目的是为了环境的统一，方便管理。

### 2：如何使用

#### 2.1：安装ansible

```
yum -y install epel-release
yum -y install ansible
```

#### 2.2：设置hosts

```
vim /etc/ansible/hosts
```

如你的主机是：192.168.3.100、192.168.3.101

那么你应该在文件的末尾新增

```yaml
[test]
192.168.3.100
192.168.3.101
```

test是个标签，可以自定义。

#### 2.3：设置ssh权限

将两台远程主机的ssh权限赋给ansible主机

在ansible主机执行

```shell
ssh-copy-id root@192.168.3.100
ssh-copy-id root@192.168.3.101
```

#### 2.4：测试是否连接成功

```
ansible test -m ping
```

如果一切正常，那么ansible就配置正常了。

```shell
[root@ansible ~]# ansible test -m ping
192.168.3.100 | SUCCESS => {
    "ansible_facts": {
        "discovered_interpreter_python": "/usr/bin/python"
    }, 
    "changed": false, 
    "ping": "pong"
}
192.168.3.101 | SUCCESS => {
    "ansible_facts": {
        "discovered_interpreter_python": "/usr/bin/python"
    }, 
    "changed": false, 
    "ping": "pong"
}
```

如果不正常则根据错误进行修复。

#### 2.5：下载项目

```
cd /etc/ansible/roles
git clone https://gitee.com/oldartist/al.git
```

#### 2.6：修改为自己的标签

进入al标签

```
cd al
```

然后修改参数

```yaml
vim nginx.yml
---
- hosts: test      #将这里的test修改为ansible中自定义的test，如果想定义全部的主机，那么就使用all也可以
  gather_facts: yes
  remote_user: root
.........
.........
```

#### 2.7：开始部署

```
cd /etc/ansible/roles/al
ansible-playbook nginx.yml
```

### 3：开发进度：

#### 3.1:目前进度：

- 使用ansible安装nginx - 已完成100%（支持系统centos6、centos7）；

#### 3.2:后续开发：

- 使用ansible安装nginx - 支持系统centos8 - 进行中‘；
- 使用ansible安装mysql - 未进行
- 使用ansible安装php - 未进行



## 更新记录
### [v1.0.1] - 2023/12/27

- [改进] Nginx安装支持系统centos8

### [v1.0.0] - 2023/12/26

- [新增] 新增ansible安装nginx
- [改进] 支持系统centos6、centos7








