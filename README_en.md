

[**中文** ](README_zh.md) | English

--------
<p align="center">
	<img src="images/lei.jpg" width="60" height="60">
</p>
<h1 align="center" style="margin: 30px 0 30px; font-weight: bold;">AL<br/>Ansible LNMP - Deploying lnmp using ansible</h1>


### 1：Introduction

This project aims to use Ansible for batch deployment of nginx, MySQL, and PHP, with the goal of achieving environment standardization and easy management.

### 2: How to Use

#### 2.1: Install Ansible

```
yum -y install epel-release
yum -y install ansible
```

#### 2.2: Set up Hosts

```
vim /etc/ansible/hosts
```

If your hosts are 192.168.3.100 and 192.168.3.101, add the following lines at the end of the file:

```yaml
[test]
192.168.3.100
192.168.3.101
```

"test" is a label that can be customized.

#### 2.3: Set SSH Permissions

Assign SSH permissions from the ansible host to the two remote hosts.

On the ansible host, execute:

```shell
ssh-copy-id root@192.168.3.100
ssh-copy-id root@192.168.3.101
```

#### 2.4: Test Connection

```
ansible test -m ping
```

If everything is set up correctly, ansible should respond with:

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

If there are issues, troubleshoot according to the error messages.

#### 2.5: Download the Project

```
cd /etc/ansible/roles
git clone https://gitee.com/oldartist/al.git
```

#### 2.6: Modify for Your Own Label

Navigate to the 'al' directory:

```
cd al
```

Then modify the parameters:

```yaml
vim nginx.yml
---
- hosts: test      # Change "test" to your custom test label in Ansible. If it's all hosts, you can directly use the all tag
  gather_facts: yes
  remote_user: root
.........
.........
```

#### 2.7: Start Deployment

```
cd /etc/ansible/roles/al
ansible-playbook nginx.yml
```
**Nginx installation path:/usr/local/nginx**

**The root directory of Nginx is:/usr/local/nginx/HTML**

#### 2.8：Start deploying MySQL

```
cd /etc/ansible/roles/al
ansible-playbook mysql.yml
```
**Note: The MySQL root password is: 123456**

**MySQL installation path:/usr/local/mysql**

**MySQL data directory:/usr/local/mysql/data**

#### 2.9：Start deploying PHP

```
cd/etc/ansible/roles/al
ansible-playbook php.yml
```
**PHP installation path:/usr/local/php**

#### 2.10：Deploying LNMP

```
cd/etc/ansible/roles/al
ansible-playbook lnmp.yml
```
**Note: After the installation of MySQL is completed, you need to log in to the shell again, or execute `bash` on the already logged in shell to directly use MySQL**
### 3: Development Progress

#### 3.1: Current Progress

- Install nginx using Ansible - 100% complete (supporting CentOS 6 and CentOS 7)

#### 3.2: Future Development

- Installing nginx using ansible - supporting system centos8- completed!

- Installing MySQL using Ansible - Completed (supports systems Centos6, Centos7, and Centos8)!
- Installing PHP using Ansible - Completed (supports systems Centos6, Centos7, Centos8)!





## Changelog

### [v1.0.3] - 2023/12/29

- [New] Added Ansible installation PHP (supports Centos6, Centos7, Centos8)

- [New] One click installation of nginx, MySQL, and PHP

### [v1.0.2] - 2023/12/28

- [New] Added Ansible to install MySQL (supports Centos6, Centos7, Centos8).

### [v1.0.1] - 2023/12/27

- [New] Nginx installation support system centos8.

### [v1.0.0] - 2023/12/26

- [New] Added Ansible installation of nginx.
- [Improvement] Added support for CentOS 6 and CentOS 7.

This is my Markdown document. Please help me translate it into English.


