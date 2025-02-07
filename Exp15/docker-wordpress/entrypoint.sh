#!/bin/bash
set -e

# 檢查 MariaDB 資料目錄是否已初始化，若未初始化則進行初始化
if [ ! -d "/var/lib/mysql/mysql" ]; then
    echo "MariaDB 資料目錄未初始化，開始初始化..."
    mysqld --initialize-insecure --user=mysql
    chown -R mysql:mysql /var/lib/mysql
fi

# 以跳過網路連線模式啟動 MariaDB 於背景，便於初始化
nohup mysqld_safe --skip-networking > /dev/null 2>&1 &
sleep 10

# 檢查是否已建立 WordPress 所需之資料庫，若未建立則自動建立
RESULT=$(mysql -uroot -e "SHOW DATABASES LIKE 'wordpress_db';" | grep wordpress_db || true)
if [ "$RESULT" == "" ]; then
    echo "建立 WordPress 資料庫..."
    mysql -uroot <<EOF
CREATE DATABASE wordpress_db DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
CREATE USER 'wp_user'@'localhost' IDENTIFIED BY 'wordpress';
GRANT ALL PRIVILEGES ON wordpress_db.* TO 'wp_user'@'localhost';
FLUSH PRIVILEGES;
EOF
fi

# 關閉暫時啟動的 MariaDB 實例，待 Supervisor 重新啟動
mysqladmin -uroot shutdown

# 以 exec 方式啟動 Supervisor 管理 Apache 與 MariaDB 服務
exec /usr/bin/supervisord -n
