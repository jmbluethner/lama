<p align="center">
<img src="https://development.lintra.nighttimedev.com/assets/media/img/ntd_black.svg" data-canonical-src="https://development.lintra.nighttimedev.com/assets/media/img/ntd_black.svg" height="80" />  
</p>

# LA.MA<img src="https://i.imgur.com/g3xXGSP.png" data-canonical-src="https://i.imgur.com/g3xXGSP.png" height="35" />  

*A PHP based CSGO-Server management Interface for LAN Tournaments.*  

This repo is a new approach to one of my older projects called "rushB", which got deleted and is no longer available.   

!!! This project is NOT working currently! Everything is WIP !!!  

![Badge_License](https://img.shields.io/github/license/nighttimedev/lama.svg)
![Badege_Size](https://img.shields.io/github/repo-size/nighttimedev/lama.svg)
![Badge_Language](https://img.shields.io/github/languages/top/nighttimedev/lama.svg)
![Badge_LastCommit](https://img.shields.io/github/last-commit/nighttimedev/lama.svg)  
![Badge_ClosedIssues](https://img.shields.io/github/issues-closed/nighttimedev/lama.svg)
![Badge_OpenIssues](https://img.shields.io/github/issues/nighttimedev/lama.svg)  
![Badge_Stars](https://img.shields.io/github/stars/nighttimedev/lama.svg?style=social)


I've developed this to manage our CS:GO torunament @ DIE-LAN 2019. You can vsit us at https://die-lan.party  
The whole Code is filled with comments from my side, so everyone can understand what was going on in my head. I think this makes my project suitable for education / learning processes.  
Unfortunately, my SourcePawn knowledge is very limited. Thats also due to the lack of documentations about this language...  
I can't fix major Bugs if they come from xPaw's Query. But so far I haven't seen any.  

I've used xPaw's Source Server Query to make this work: https://github.com/xPaw/PHP-Source-Query  
Check him out too!  
## How does it look?  
![Screenshot1](https://cdn.nighttimedev.com/images/lama/lama1.png)  
## Developing-Process
All my test-runs, as well as troubleshooting, take(s) / took place on either my Laptop (Acer Predator Helios 300), or one of my Dell Poweredge R710's at home.  
Both systems use VMs, which are running on Debian 9, 64 bit with Apache2 and PHP 7.3.  
I used an external SQL Database, hosted by Manitu.de, for all of my tests.  
You can check out https://www.manitu.de if you need Webhosting for your project(s), I recommend them!  
## What it needs
In order to set-up the LAMA interface, you need:  
- A Webserver (I tested on Apache2)  
- A valid PHP installation (I tested on 7.3)  
- A SQL Database  
## Install
- Go to your Webservers Filepath (Apache default /var/www/html) and clone the Repo  
```sh
cd /var/www/html
git clone https://github.com/nighttimedev/lama
```  
- If you have to do any additional installtions (like PHP), it's strongly recommended to update & upgrade first! 
```sh
sudo apt-get update
sudo apt-get upgrade
```  
- If you need to install apache2  
```sh
sudo apt-get install apache2
```
- If you need to install PHP  
```sh
sudo apt install lsb-release apt-transport-https ca-certificates
sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php7.3.list
sudo apt update
sudo apt-get install php7.3 php-pear
```
- To check your PHP Installation
```sh
php -v
```  
### LAMA installation / configuration  
After you have installed everything you need on the Server, you can install and configure the Server Manager itself.  
The Rootdirectory will be called "$root" in this guide.  
- Step 1  
Configure the $root/config.php to tell the Interface how to connect to your database.  
- Step 2  
Set your timezone in $root/config.php. All timezones here: https://www.php.net/manual/de/timezones.php. This is  neccessary in order to get the correct time (for example in the log file).    
- Step 3  
Set all other minor Variables in the log file.  
- Step 4  
Go to $root/install in your webbrowser to start the automatic configuration process. IF any errors occur, they SHOULD be described well in order to tell you how to fix it. If you have any problems, feel free to contact me via the Mail which is given at the end of the readme.  
- Step 5  
Done! Have fun adding and managing Source-Based gameservers :)  
  
## Bugs, Issues, ...
If you get any errors, which are definitely not caused by yourself, I'd love to get your error report.  
Write me an E-Mail to: git@nighttimedev.com, with 'Error: git/lama' as Subject.
<br>
<br>
<br>  
Developed with :heart: from <img src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1280px-Flag_of_Germany.svg.png" data-canonical-src="https://gyazo.com/eb5c5741b6a9a16c692170a41a49c858.png" width="25" height="15" />
