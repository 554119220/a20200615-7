<?php


$sql="select * from eruyi_peizhi where id=1";
$query=$db->query($sql);
$have=$db->fetch_array($query);
if($have){
$iptime = $have['iptime']*3600;  //ͬIPע��������λ��Сʱ����0�رգ�
$codetime = $have['codetime']*3600; //ͬע����ע����168����λ��Сʱ����0�رգ�
$regvip = $have['regvip']*3600; //ע��������VIPʱ��3600/86400����λ��Сʱ����0�رգ�
$invvip = $have['invvip']*3600; //����ɹ���������VIPʱ�䣨��λ��Сʱ����0�رգ�

$yzfid=$have['yzfid'];//�̻�ID
$yzfkey=$have['yzfkey'];//�̻�KEY
$yzfurl=$have['yzfurl'];//�鵥��ַ

$dqrenshu = $have['dqrenshu']; //��������Ϊ3 ��7��ʱ��
$zstime = $have['zstime']*3600; //������VIPʱ�䣨��λ��Сʱ����0���ͣ�

$dqrenshu2 = $have['dqrenshu2']; //��������Ϊ12 ��1��ʱ��
$zstime2 = $have['zstime2']*3600; //������VIPʱ�䣨��λ��Сʱ����0���ͣ�
}else{
    exit("ϵͳ���ü���ʧ��");
}
?>