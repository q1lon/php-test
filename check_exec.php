<?php
//检查sh.php是否在执行
//modify by www.jbxue.com
function check_php(){
$fname=$this->cachedir."/stat";
$str="ps -ax|grep php > $fname";
exec($str); //执行系统命令
$str="grep sh $fname|wc -l"; //查看sh.php是否在执行
$tmp=exec($str);
if ($tmp<1){//不在运行
return true;
}
if ($tmp>1){ //在运行
$time=filemtime($this->cachedir."/myaccess_log"); //得到这个文件最后被更新过的时间
if ((time()-$time)>150) //如果现在时间离上次执行的时间超过了150秒，则认为进程僵死，超过时间没有运行。
{
echo "进程sh.php在.$this->mytime.被发现已经僵死\n";
//写入日志文件C
$check_msg="进程sh.php在 $this->dateandtime 被发现已经僵死\n";
$c_fname=$this->datadir."/c";
$fd=fopen($c_fname,"a");
fwrite($fd,$check_msg);
fclose($fd);
$this->kill_php();
return true;
}
return false;
}
}
//如果程序僵死杀死进程
function kill_php(){
exec("killall -9 sh.php");
//exec("killall -9 php");
echo "进程sh.php在.$this->mytime.被杀死\n";
$check_msg="进程sh.php在 $this->dateandtime 被杀死\n";
$c_fname=$this->datadir."/c";
$fd=fopen($c_fname,"a");
fwrite($fd,$check_msg);
fclose($fd);
}
?>