#!/bin/sh

/home/php-src/php-7.2.1/sapi/cli/php  -n -c '/home/php-src/php-7.2.1/tmp-php.ini'  -d "output_handler=" -d "open_basedir=" -d "disable_functions=" -d "output_buffering=Off" -d "error_reporting=32767" -d "display_errors=1" -d "display_startup_errors=1" -d "log_errors=0" -d "html_errors=0" -d "track_errors=0" -d "report_memleaks=1" -d "report_zend_debug=0" -d "docref_root=" -d "docref_ext=.html" -d "error_prepend_string=" -d "error_append_string=" -d "auto_prepend_file=" -d "auto_append_file=" -d "ignore_repeated_errors=0" -d "precision=14" -d "memory_limit=128M" -d "log_errors_max_len=0" -d "opcache.fast_shutdown=0" -d "opcache.file_update_protection=0" -d "zend.assertions=1" -d "extension_dir=/home/php-src/php-7.2.1/modules/" -d "zend_extension=/home/php-src/php-7.2.1/modules/opcache.so" -d "session.auto_start=0" -f "/home/php-src/php-7.2.1/ext/date/tests/DateTime_diff-fall-type3-type3.php"  2>&1
