<?PHP
	session_start();
	
/*function gettime() {
    list($usec, $sec) = explode(" ", microtime());
    return (float)$usec + (float)$sec;    //开始时间一直很小，原来是少了$这个符号
}

    $start_time = gettime();
	//echo microtime();
    $end_time = gettime();
    //echo date();
    //echo $end_time - $start_time;

//php的时间是以秒算。js的时间以毫秒算

date_default_timezone_set('PRC');
//date_default_timezone_set("Asia/Hong_Kong");//地区

//配置每天的活动时间段
$starttimestr = "2013-7-29 8:10:00";
$endtimestr = "2013-7-29 9:43:00";

$starttime = strtotime($starttimestr);
$endtime = strtotime($endtimestr);
$nowtime = time();
if ($nowtime<$starttime){
die("活动还没开始,活动时间是：{$starttimestr}至{$endtimestr}");
}
if ($endtime>=$nowtime){
$lefttime = $endtime-$nowtime; //实际剩下的时间（秒）
 }else{
 $lefttime=0;
 die("活动已经结束！");
}*/
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP实时倒计时!</title>


<script language="JavaScript">
<!-- //
var runtimes = 0;
function GetRTime(){
   var nMS = 2*60*60*1000-runtimes*1000;
   
//var nD=Math.floor(nMS/(1000*60*60*24))%365;    //获取天数
var nH=Math.floor(nMS/(1000*60*60))%24;          //获取小时数
var nM=Math.floor(nMS/(1000*60)) % 60;          ////获取分钟
var nS=Math.floor(nMS/1000) % 60;                   ////获取秒数



//document.getElementById("RemainD").innerHTML=nD;
document.getElementById("RemainH").innerHTML=nH;
document.getElementById("RemainM").innerHTML=nM;
document.getElementById("RemainS").innerHTML=nS;
if(nMS>5*60*1000-1&&nMS<=5*60*1000)
{
 alert("还有最后五分钟！");
}

if(nMS<=1*1000&&nMS>=0*1000)
{
	alert("timeout");
	
}
runtimes++;
setTimeout("GetRTime()",1000);
}
window.onload=GetRTime;
// -->
</script>
</head>
<body>
  <h2>剩余<strong id="RemainH">XX</strong>小时<strong id="RemainM">XX</strong>分<strong id="RemainS">XX</strong>秒<h2>
</body>
</html>

