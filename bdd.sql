  CREATE USER IF NOT EXISTS phpcrud@localhost IDENTIFIED BY 'phpcrud';
  DROP DATABASE IF EXISTS phpcrud;
  CREATE DATABASE IF NOT EXISTS phpcrud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;
  GRANT ALL PRIVILEGES ON phpcrud.* TO phpcrud@localhost;
  FLUSH PRIVILEGES;

  USE phpcrud;

  CREATE TABLE IF NOT EXISTS `contacts` (
    `id`  int(11) unsigned NOT NULL AUTO_INCREMENT,
    `nom` varchar(255) NOT NULL,
    `courriel` varchar(255) NOT NULL,
    `telephone` varchar(255) NOT NULL,
    `titre` varchar(255) NOT NULL,
    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;