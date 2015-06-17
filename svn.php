<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

//cshaw 20150228
include 'common.php'; 

//======================================= PHP Shell Testing ======================================================
echo "<h1>=============== PHP Shell Testing =======================</h1><br>";

echo "<h2>fopen file Testing</h2>";
$file = fopen("read_write.txt","r");
echo fgets($file);
fclose($file);

echo "<h2>fwrite file Testing</h2>";
$file = fopen("/home/cshaw/Work/Projects/svn/write/read_write.txt","w+");
echo fwrite($file,"Hello World. Testing!");
fclose($file);

echo "<h2>ls Testing</h2>";
$shell_output = shell_exec("ls /home/cshaw/Work/Projects/svn/svn_php/");
echo $shell_output;

echo "<h2>[svn --help] Testing</h2>";
$shell_output = shell_exec("svn --help");
echo $shell_output;

echo "<h2>[svn status] Testing</h2>";
$shell_output = shell_exec("svn status /home/cshaw/Work/Projects/svn/svn_php/");
echo $shell_output;

echo "<h2>[svn checkout] Testing</h2>";
$shell_output = shell_exec("svn checkout svn://127.0.0.1/src_svn /home/cshaw/Work/Projects/svn/write/");
echo $shell_output;

echo "<h2>[svn add] Testing</h2>";
$shell_output = shell_exec("svn add /home/cshaw/Work/Projects/svn/svn_php/sn4.txt");
echo $shell_output;

echo "<h2>[svn del] Testing</h2>";
$shell_output = shell_exec("svn delete /home/cshaw/Work/Projects/svn/write/sn5");
echo $shell_output;

echo "<h2>[svn mkdir] Testing</h2>";
$shell_output = shell_exec("svn mkdir /home/cshaw/Work/Projects/svn/write/sn6");
echo $shell_output;

echo "<h2>[svn commit] Testing</h2>";
$shell_output = shell_exec("svn commit -m \"This is a testing for commit\" /home/cshaw/Work/Projects/svn/write/");
echo $shell_output;

echo "<h2>[svn log] Testing</h2>";
$shell_output = shell_exec("svn log svn://127.0.0.1/src_svn");
echo $shell_output;

//echo "<h2>Check Out Testing</h2>";
//$shell_output = shell_exec("svn --username cshaw --password welcome checkout svn://127.0.0.1/src_svn /home/cshaw/Work/Projects/svn/svn_php/");
//echo $shell_output;

//(2)Check In Testing
//$shell_output = shell_exec("svn commit /home/cshaw/Work/Projects/svn/svn_cshaw/ -m \"add sn2.txt\" ");
//echo $shell_output;

//(3)Testing
//$shell_output = shell_exec("whoami");
//$rt = svn_checkout('svn://127.0.0.1/src_svn', dirname(__FILE__) . '/home/cshaw/Work/Projects/svn/svn_php1/');

//======================================= PHP SVN Testing ======================================================
echo "<h1>=============== PHP SVN Testing =========================</h1><br>";

svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, 'cshaw');
svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, 'welcome');

echo "<h2>svn_client_version</h2>";
echo svn_client_version();

echo "<br>";
echo "<h2>svn_ls</h2>";
print_r( svn_ls('svn://127.0.0.1/src_svn/') );

echo "<br>";
echo "<h2>svn_checkout</h2>";
$shell_output = svn_checkout('svn://127.0.0.1/src_svn/', dirname(__FILE__) . '/home/cshaw/Work/Projects/svn/write/');
echo $shell_output;

echo "<br>";
echo "<h2>realpath</h2>";
echo realpath('/home/cshaw/Work/Projects/svn/svn_php');

echo "<br>";
echo "<h2>svn_commit</h2>";
var_dump(svn_commit('Log message of cshaw\'s commit', array(realpath('/home/cshaw/Work/Projects/svn/write'))));

echo "<br>";
echo "<h2>svn_cat</h2>";
$contents = svn_cat('svn://127.0.0.1/src_svn/HelloWorld.c', 1);
echo $contents;

echo "<br>";
echo "<h2>svn_status</h2>";
print_r(svn_status(realpath('/home/cshaw/Work/Projects/svn/svn_php')));

/*
echo "<br>";
echo "<br>";
echo svn_update(realpath('/home/cshaw/Work/Projects/svn/svn_php'));
*/

echo "<br>";
echo "<h2>svn_mkdir</h2>";
var_dump( svn_mkdir( "/home/cshaw/Work/Projects/svn/write/mydir" ) );
?>
