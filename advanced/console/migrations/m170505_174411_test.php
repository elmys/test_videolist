<?php

use yii\db\Migration;

class m170505_174411_test extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $sql = "
        CREATE TABLE `playlist` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
          `title` varchar(255) NOT NULL DEFAULT '',
          `url` varchar(255) NOT NULL DEFAULT '',
          `created_at` int(10) unsigned NOT NULL DEFAULT '0',
          `order` int(10) unsigned NOT NULL DEFAULT '0',
          `provider` varchar(100) NOT NULL DEFAULT 'youtube',
          PRIMARY KEY (`id`),
          UNIQUE KEY `unq_url` (`url`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        INSERT INTO `playlist` (`id`, `title`, `url`, `created_at`, `order`, `provider`)
        VALUES
        (1,'Суперпапа может все','https://www.youtube.com/watch?v=UBL2O1WPiCE',1451595600,1,'youtube'),
        (2,'Угадали с подарком!','https://www.youtube.com/watch?v=eBxTbBMFnp0',1454360400,2,'youtube'),
        (3,'Боже, храни енотов!','https://www.youtube.com/watch?v=8P4YPEfkdBE',1462395600,5,'youtube'),
        (4,'Как отделить желток от белка','https://www.youtube.com/watch?v=YxQ8IOBNZO8',1459717200,4,'youtube'),
        (5,'Когда мамы нет дома','https://www.youtube.com/watch?v=WNfHC64ETGM',1456952400,3,'youtube');
        ";
        $this->execute($sql);
    }

    public function safeDown()
    {
        $this->dropTable('playlist');
    }
}
