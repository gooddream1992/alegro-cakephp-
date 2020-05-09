<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;

class CustomComponent extends Component {

    function __construct($prompt = null) {
        
    }

    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    function get_ip_address() {
        if (isSet($_SERVER)) {
            if (isSet($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } elseif (isSet($_SERVER["HTTP_CLIENT_IP"])) {
                $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }

        return $realip;
    }

    function formatUserRegister($msg, $name, $link) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[PASSWORD]")) {
            $msg = str_replace("[PASSWORD]", $password, $msg);
        }
        if (strstr($msg, "[SITELINK]")) {
            $msg = str_replace("[SITELINK]", HTTP_ROOT, $msg);
        }
        if (strstr($msg, "[LINK]")) {
            $msg = str_replace("[LINK]", $link, $msg);
        }
        if (strstr($msg, "[LINK_BTN]")) {
            $linkBtn = '<p><a target="_blank" href="' . $link . '">Confirm</a></p>';
            $msg = str_replace("[LINK_BTN]", $linkBtn, $msg);
        }


        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function formatText($value) {
        $value = str_replace("“", "\"", $value);
        $value = str_replace("�?", "\"", $value);
        //$value = preg_replace('/[^(\x20-\x7F)\x0A]*/','', $value);
        $value = stripslashes($value);
        $value = html_entity_decode($value, ENT_QUOTES);
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        $value = strtr($value, $trans);
        $value = stripslashes(trim($value));
        return $value;
    }

    function shortLength($value, $len) {
        $value_format = $this->formatText($value);
        $value_raw = html_entity_decode($value_format, ENT_QUOTES);

        if (strlen($value_raw) > $len) {
            $value_strip = substr($value_raw, 0, $len);
            $value_strip = $this->formatText($value_strip);
            $lengthvalue = "<span title='" . $value_format . "' rel='tooltip'>" . $value_strip . "...</span>";
        } else {
            $lengthvalue = $value_format;
        }
        return $lengthvalue;
    }

    function makeSeoUrl($url) {
        if ($url) {
            $url = trim($url);
            $value = preg_replace("![^a-z0-9]+!i", "-", $url);
            $value = trim($value, "-");
            return strtolower($value);
        }
    }

    function generateUniqNumber($id = NULL) {
        $uniq = uniqid(rand());
        if ($id) {
            return md5($uniq . time() . $id);
        } else {
            return md5($uniq . time());
        }
    }

    function getRealIpAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function uploadImage($tmp_name, $name, $large, $medium, $thumb) {
        if ($name) {
            $image = strtolower($name);
            //          $extname = substr(strrchr($image, "."), 1);
            $extname = $this->getExtension($image);
            if (($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
                return false;
            } else {
                if ($extname == "jpg" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                } else if ($extname == "png") {
                    $src = imagecreatefrompng($tmp_name);
                } else {
                    $src = imagecreatefromgif($tmp_name);
                }

                list($width, $height) = getimagesize($tmp_name);


                $newwidth = 500;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);

                $newwidth1 = 291;
                $newheight1 = ($height / $width) * $newwidth1;
                $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

                $newwidth2 = 100;
                $newheight2 = ($height / $width) * $newwidth2;
                $tmp2 = imagecreatetruecolor($newwidth2, $newheight2);
                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
                imagecopyresampled($tmp2, $src, 0, 0, 0, 0, $newwidth2, $newheight2, $width, $height);
                $time = time();
                $filepath = md5($time) . "." . $extname;
                $filename = $large . $filepath;
                $filename1 = $medium . "medium_" . $filepath;
                $filename2 = $thumb . "thumb_" . $filepath;
                imagejpeg($tmp, $filename, 100);

                imagejpeg($tmp1, $filename1, 100);

                imagejpeg($tmp2, $filename2, 100);

                imagedestroy($src);
                imagedestroy($tmp);
                imagedestroy($tmp1);
                imagedestroy($tmp2);

                return $filepath;
            }
        }
    }

    function uploadImageBanner($tmp_name, $name, $path, $imgWidth) {
        if ($name) {
            $image = strtolower($name);
            $extname = $this->getExtension($image); //$extname = substr(strrchr($image, "."), 1);
            if (($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
                return false;
            } else {
                if ($extname == "jpg" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                } else if ($extname == "png") {
                    $src = imagecreatefrompng($tmp_name);
                } else {
                    $src = imagecreatefromgif($tmp_name);
                }
                list($width, $height) = getimagesize($tmp_name);

                if ($extname == 'gif' || $width <= $imgWidth) {
                    $time = time() . rand(100, 999);
                    $filepath = md5($time) . "." . $extname;
                    $targetpath = $path . $filepath;
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $targetpath);
                    return $filepath;
                } else {
                    $newwidth = $imgWidth;
                    $newheight = ($height / $width) * $newwidth;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    $time = time();
                    $filepath = md5($time) . "." . $extname;
                    $filename = $path . $filepath;
                    imagejpeg($tmp, $filename, 100);

                    imagedestroy($src);
                    imagedestroy($tmp);
                    return $filepath;
                }
            }
        }
    }

    function lastValue($string) {
        $explode = explode('-', $string);
        $lastArrayValue = end($explode);
        return $lastArrayValue;
    }

    function number_pad($number, $n = 4) {
        $number = intval($number, 10);
        $number = (string) $number;
        return str_pad((int) $number, $n, "0", STR_PAD_LEFT);
    }

    function emailText($value) {
        $value = stripslashes(trim($value));
        $value = str_replace('"', "\"", $value);
        $value = str_replace('"', "\"", $value);
        $value = preg_replace('/[^(\x20-\x7F)\x0A]*/', '', $value);
        return stripslashes($value);
    }

    function contactUs($msg, $name, $email, $phone, $subject, $uMessage, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[PHONE]")) {
            $msg = str_replace("[PHONE]", $phone, $msg);
        }
        if (strstr($msg, "[SUBJECT]")) {
            $msg = str_replace("[SUBNECT]", $subject, $msg);
        }
        if (strstr($msg, "[UMSG]")) {
            $msg = str_replace("[UMSG]", $uMessage, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function sendEmail2($to, $from, $subject, $message, $header = 1, $footer = 1) {
        if ($header) {
            $hdr = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
    <html>
    <head>
    <title></title>
    </head>
    <body style="background-color:#F9F9F9;">
        <center>';
        }
        if ($footer) {

            $ftr = '</center>
    </body>
    </html>';
        }

        $message = $hdr . $message . $ftr;
        $to = $this->emailText($to);
        $subject = $this->emailText($subject);
        $message = $this->emailText($message);
        $message = str_replace("<script>", "&lt;script&gt;", $message);
        $message = str_replace("</script>", "&lt;/script&gt;", $message);
        $message = str_replace("<SCRIPT>", "&lt;script&gt;", $message);
        $message = str_replace("</SCRIPT>", "&lt;/script&gt;", $message);

        //$email = new Email('default');
//        $email = new Email();
//        //$email->transport('default');
//        $res = $email->from($from)
//                ->to($to)
//                ->emailFormat('html')
//                ->subject($subject)
//                ->viewVars(array('msg' => $message))
//                ->send($message);
        $from = "Alegro <" . $from . ">";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type:multipart/mixed; charset=iso-8859-1' . "\r\n";
        $headers .= 'From:' . $from . "\r\n";


        // echo $to, $subject, $message, $headers; exit;
        if (mail($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    function sendEmail($to, $from, $subject, $message, $header = 1, $footer = 1) {
        if ($header) {
            $hdr = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
    <html>
    <head>
    <title></title>
    </head>
    <body style="background-color:#F9F9F9;">
        <center>';
        }
        if ($footer) {

            $ftr = '</center>
    </body>
    </html>';
        }

        $message = $hdr . $message . $ftr;
        $to = $this->emailText($to);
        $subject = $this->emailText($subject);
        $message = $this->emailText($message);
        $message = str_replace("<script>", "&lt;script&gt;", $message);
        $message = str_replace("</script>", "&lt;/script&gt;", $message);
        $message = str_replace("<SCRIPT>", "&lt;script&gt;", $message);
        $message = str_replace("</SCRIPT>", "&lt;/script&gt;", $message);

        //$email = new Email('default');
//        $email = new Email();
//        //$email->transport('default');
//        $res = $email->from($from)
//                ->to($to)
//                ->emailFormat('html')
//                ->subject($subject)
//                ->viewVars(array('msg' => $message))
//                ->send($message);
        $from = "Alegro <" . $from . ">";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From:' . $from . "\r\n";


        // echo $to, $subject, $message, $headers; exit;
        if (mail($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    function filterData($data) {
        /* this function is meant for filtering whole data received from the screen */
        $filteredData = array_map(function($v) {
            if (is_array($v)) {
                return $this->filterData($v);
            } else {
                return trim(strip_tags($v));
            }
        }, $data);

        return $filteredData;
    }

    function downloadCustomerReport($payments, $fileName) {
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $style = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($style);
        foreach (range('A', 'F') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $head = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S'];
        $count = 0;
        ///SetHeading//
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Ticket id");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Name");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Phone");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Payment Date");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Qty.");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Total");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Mode");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Status");

        //Set Content
        $rowCount = 2;
        $total = count($payments);
        for ($i = 0; $i < $total; $i++) {
            $count = -1;
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['ticket']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['phone']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['purchase_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['qty']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['total']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['mode']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['status']);
            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['payment_date']);
            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);

            $rowCount++;
        }
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $filename = 'Alegro-' . $fileName . ".xlsx";
        $objWriter->save("files/temp_excel/$filename");
        return $filename;
    }

    function createAdminFormat($msg, $name, $email, $password, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[PASSWORD]")) {
            $msg = str_replace("[PASSWORD]", $password, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function formatForgetPassword($msg, $name, $email, $link, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[LINK]")) {
            $msg = str_replace("[LINK]", $link, $msg);
        }
        if (strstr($msg, "[SITELINK]")) {
            $msg = str_replace("[SITELINK]", HTTP_ROOT, $msg);
        }
        if (strstr($msg, "[SITENAME]")) {
            $msg = str_replace("[SITENAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function formatChangePassword($msg, $name, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[SITENAME]")) {
            $msg = str_replace("[SITENAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function formatUserNotification($msg, $subject, $message) {
        if (strstr($msg, "[SUBJECT]")) {
            $msg = str_replace("[SUBJECT]", $subject, $msg);
        }
        if (strstr($msg, "[MESSAGE]")) {
            $msg = str_replace("[MESSAGE]", $message, $msg);
        }

        if (strstr($msg, "[SITEURL]")) {
            $msg = str_replace("[SITEURL]", HTTP_ROOT, $msg);
        }


        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function multi_attach_mail($to, $subject, $message, $senderMail, $senderName, $files) {

        $from = $senderName . " <" . $senderMail . ">";
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
        if (count($files) > 0) {

            for ($i = 0; $i < count($files); $i++) {
                if (is_file($files[$i])) {
                    $message .= "--{$mime_boundary}\n";
                    $fp = @fopen($files[$i], "rb");

                    $data = @fread($fp, filesize($files[$i]));

                    @fclose($fp);
                    $data = chunk_split(base64_encode($data));
                    $message .= "Content-Type: application/octet-stream; name=\"" . basename($files[$i]) . "\"\n" .
                            "Content-Description: " . basename($files[$i]) . "\n" .
                            "Content-Disposition: attachment;\n" . " filename=\"" . basename($files[$i]) . "\"; size=" . filesize($files[$i]) . ";\n" .
                            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                }
            }
        }

        $message .= "--{$mime_boundary}--";
        $returnpath = "-f" . $senderMail;

        //send email
        $mail = @mail($to, $subject, $message, $headers, $returnpath);

        //function return true, if email sent, otherwise return fasle
        if ($mail) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
