<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define("SROOT", $_SERVER['SERVER_NAME']."/hotel-management-php/public");
define("IMAGEROOT", SROOT."/media/images/rooms/");

// Database
define("DB_NAME", getenv("env_db_name")); // database name
define("DB_USER", getenv("env_user_name")); // database user
define("DB_PASSWORD", getenv("env_password")); // database password
define("DB_HOST", getenv("env_db_host")); // database host

// FTP
define("FTPSERVER", getenv("env_ftp_server"));
define("FTPUSER", getenv("env_ftp_user"));
define("FTPPASS", getenv("env_ftp_pass"));

require_once(ROOT.DS."core".DS."db.php");
require_once(ROOT.DS."core".DS."utils.php");
require_once(ROOT.DS."core".DS."upload_image.php");
