
<?php
$installer = $this;
$installer->startSetup();
$installer->run("
    INSERT INTO `{$installer->getTable('weblog/blogpost')}` VALUES (2,'0.1.5','This is a blog post','2009-07-01 00:00:00','2009-07-02 23:12:30');

");
$installer->endSetup();