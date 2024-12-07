<?php 
class Contact{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="eschool-insider";
    public $mysqli;
    
    public function __construct() {
        return $this->mysqli=new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
    
    public function contact_us($data){
        $name=$data['name'];
        $email=$data['email'];
        $phone=$data['phone'];
        $msg=$data['msg'];
        $q="insert into contact_us set name='$name', last_name='$name', email='$email', phone='$phone', msg='$msg'";
       $data= $this->mysqli->query($q);
       if($data==true){
           $body="One message received from eschool-insider contact us. details are below..<br> name='$name',email='$email', phone='$phone', msg='$msg'";
           return $this->sent_mail("eschoolinsider@gmail.com", "Message received from eschoolinsider", $body);
       }
    }
    
    public function sent_mail($to,$subject,$body){
$mailFromName="eschoolinsider";
$mailFrom="eschoolinsider@gmail.com";
/////////////////////////////////////////////////////////////
//Mail Header
$mailHeader = 'MIME-Version: 1.0'."\r\n";
$mailHeader .= "From: $mailFromName <$mailFrom>\r\n";
$mailHeader .= "Reply-To: $mailFrom\r\n";
$mailHeader .= "Return-Path: $mailFrom\r\n";
//$mailHeader .= "CC: $mailCC\r\n";
//$mailHeader .= "BCC: $mailBCC\r\n";
$mailHeader .= 'X-Mailer: PHP'.phpversion()."\r\n";
$mailHeader .= 'Content-Type: text/html; charset=utf-8'."\r\n";
/////////////////////////////////////////////////////////////
//Email to Admin
if(mail($to, $subject, $body, $mailHeader)){
 return true;
 }else{
return false;
 }
    }
}


?>