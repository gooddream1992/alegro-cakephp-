<?php
echo "Mail Test<br>";

//$to = "debmicrofinet@gmail.com";
//$subject = "My subject";
//$txt = "Hello world!";
//$headers = "From: devtest@microfinet.com" . "\r\n" .
//"CC: debmicrofinet@gmail.com";
//
//if(mail($to,$subject,$txt,$headers))
//{
//    echo "Message accepted";
//}
//else
//{
//    echo "Error: Message not accepted";
//}


function multi_attach_mail($to, $subject, $message, $senderMail, $senderName, $files){

    $from = $senderName." <".$senderMail.">"; 
    $headers = "From: $from";

    // boundary 
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

    // multipart boundary 
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 

    // preparing attachments
    if(count($files) > 0){
        
        for($i=0;$i<count($files);$i++){
            if(is_file($files[$i])){
                $message .= "--{$mime_boundary}\n";
                $fp =    @fopen($files[$i],"rb");
                
                $data =  @fread($fp,filesize($files[$i]));

                @fclose($fp);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: application/octet-stream; name=\"".basename($files[$i])."\"\n" . 
                "Content-Description: ".basename($files[$i])."\n" .
                "Content-Disposition: attachment;\n" . " filename=\"".basename($files[$i])."\"; size=".filesize($files[$i]).";\n" . 
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
        }
    }

    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $senderMail;

    //send email
    $mail = @mail($to, $subject, $message, $headers, $returnpath); 

    //function return true, if email sent, otherwise return fasle
    if($mail){ return TRUE; } else { return FALSE; }

}

//email variables
$to = 'debmicrofinet@gmail.com';
$from = 'devtest@microfinet.com';
$from_name = 'Debendra Kumar Sahoo';

//attachment files path array
$files = array('files/ITENERARY/03-12-2018/debmicrofinet@gmail.com/itinerary.pdf','files/INVOICE/22-11-2018/debmicr111ofinet@gmail.com/invoice.pdf');
$subject = 'PHP Email with multiple attachments by Debendra Kumar Sahoo'; 
$html_content = '<h3>PHP Email with multiple attachments by Debendra Kumar Sahoo</h3>
            <p><b>Total Attachments : </b>'.count($files).' attachments</p>';

//call multi_attach_mail() function and pass the required arguments
$send_email = multi_attach_mail($to,$subject,$html_content,$from,$from_name,$files);

//print message after email sent
echo $send_email?"<h1>Mail Sent</h1>":"<h1>Mail sending failed.</h1>";

