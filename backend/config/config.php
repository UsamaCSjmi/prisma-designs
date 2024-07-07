<?php

// localhost
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/development/prisma-designs');
define('SITE_PATH','http://localhost/development/prisma-designs');
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "prismadesigns");
define('BASE_PATH','/development/prisma-designs/');


// Hostinger - Sever
// define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT']);
// define('SITE_PATH','https://prismadesigns.in');
// define("DB_HOST", "localhost");
// define("DB_USER", "u936121314_prisma");
// define("DB_PASS", "Z#3m?eVY1@");
// define("DB_NAME", "u936121314_prisma");
// define('BASE_PATH','/');


define('IMAGE_SERVER_PATH',SERVER_PATH.'/images/');
define('IMAGE_SITE_PATH',SITE_PATH.'/images/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/images/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/images/product/');

define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH',SERVER_PATH.'/images/product_images/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH',SITE_PATH.'/images/product_images/');

define('BANNER_IMAGE_SERVER_PATH',SERVER_PATH.'/images/banner/');
define('BANNER_IMAGE_SITE_PATH',SITE_PATH.'/images/banner/');

