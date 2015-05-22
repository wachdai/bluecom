<?php
$installer = $this;
$installer->startSetup();
$installer->run("
    INSERT INTO `{$installer->getTable('weblog/blogpost')}` VALUES (3,'0.2.0','This is a blog post','2009-07-01 00:00:00','2009-07-02 23:12:30');

");
$installer->endSetup();