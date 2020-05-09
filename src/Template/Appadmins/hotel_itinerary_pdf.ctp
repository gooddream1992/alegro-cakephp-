<?php
$alldetails = $this->User->getDataForHotel($property_id);

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}

function dateGap($date1, $date2) {
    $date1 = date_create($date1);
    $date2 = date_create($date2);
    $diff = date_diff($date1, $date2);
    return $diff->format("%a");
}

$date_gap = dateGap(date_format($bookingdetails->check_in, 'd-M-Y'), date_format($bookingdetails->check_out, 'd-M-Y'));
?>

<style type="text/css">
    body {
        background: #f9d749;
    }

</style>
<div class="bodycontainer">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody></tbody>
    </table>
    <div class="maincontent">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tbody></tbody>
        </table>
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="message">
            <tbody>
                <tr>
                    <td colspan="2">
                        <table width="100%" cellpadding="12" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="overflow: hidden;">
                                            <font size="-1">
                                            <u></u>
                                            <div style="margin: 0px auto;padding:0px;width: 45%;border: 2px solid #000;background-color: #7f6c6c;font-size: 14px;line-height:20px;text-align:justify;">
                                                <table border="0" cellpadding="0" cellspacing="0" height="100%" id="m_7348081263506288608email_body" style="margin:0px;padding:0px;border:0px;background-color:#ffffff;font-size:14px;line-height:20px;text-align:left" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="margin:0px;padding:0px;border:0px" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" style="margin:0px;padding:0px;border:0px;width:580px;text-align:left">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="margin:0px;padding:0px;border:0px;padding-top:8px" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" style="margin:0px;padding:0px;border:0px" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="vertical-align:middle;padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px" valign="middle" width="100%"><a href="https://www.booking.com/index.en-gb.html?aid=304142;label=gen000nr-10Eg5jb25maXJtYXRpb25tZyiCAkICWFhICWIFbm9yZWZyAnh4iAEBmAEzuAEFyAEF2AED6AEB-AEBkgIBeagCAQ" title="Alegro.co.ao" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://www.booking.com/index.en-gb.html?aid%3D304142;label%3Dgen000nr-10Eg5jb25maXJtYXRpb25tZyiCAkICWFhICWIFbm9yZWZyAnh4iAEBmAEzuAEFyAEF2AED6AEB-AEBkgIBeagCAQ&amp;source=gmail&amp;ust=1559331297807000&amp;usg=AFQjCNFUxZXGzkMKZUs6WjbzKNIBingEdQ">
                                                                                                    <img alt="Alegro.co.ao" border="0" src="https://www.alegro.co.ao/img/header-logo.png" style="outline:none;text-decoration:none;border:none;display:block;width: 150px;margin-top: 41px;margin-left: 200px;margin-bottom: 25px;">
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:16px;padding-left:16px;padding-right:16px" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td valign="top">
                                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="padding-right:8px;text-align:center" valign="middle"><img border="0" height="20" src="https://image.flaticon.com/icons/svg/190/190411.svg" style="outline:none;text-decoration:none;border:none;width: 25px;height: 25px;" width="20"></td>
                                                                                                            <td style="font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height: 28px;" valign="middle">
                                                                                                                <h3 style="font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:16px;line-height:24px">Thanks, <span style="font-weight: normal;"><?= strtoupper($bookingdetails->user_firstname); ?>!</span> <div style="font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-size: 15px;line-height:18px;margin: -23px 0px 4px 364px;font-weight: bold;color: #000000;">Order ID: <span style="font-weight: normal;"><?= $bookingdetails->booking_no; ?></span></div></h3>
                                                                                                                <h2 style="font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height:28px;">
                                                                                                                    Your booking at <?= $alldetails->description->propertyName; ?> is confirmed.
                                                                                                                </h2>
                                                                                                            </td>

                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="padding-right:8px;padding-top:8px;text-align:center" valign="top"></td>
                                                                                                            <td style="padding-top:8px;font-family: Open Sans,sans-serif!important;font-size: 15px;" valign="top"><strong><?= $alldetails->description->propertyName; ?></strong> is expecting you on <strong><?= date_format($bookingdetails->check_in, 'd '); ?><?= __(date_format($bookingdetails->check_in, 'M')); ?></strong></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="padding-right:8px;padding-top:8px;text-align:center" valign="top"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align:center;padding-bottom:8px;padding-left:8px;padding-right:8px" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" valign="middle">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding:8px">
                                                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="text-align:center"><a class="m_7348081263506288608button" href="https://secure.booking.com/myreservations.en-gb.html?aid=304142;auth_key=2rh0jdZBD6t2erIt&amp;;source=conf_email;pbsource=conf_email_modify" style="text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://secure.booking.com/myreservations.en-gb.html?aid%3D304142;auth_key%3D2rh0jdZBD6t2erIt%26;source%3Dconf_email;pbsource%3Dconf_email_modify&amp;source=gmail&amp;ust=1559331297808000&amp;usg=AFQjCNHorEo7u7NTuiB8lxkYACfRL52vcA"></a></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                            <td style="padding:8px">
                                                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="text-align:center"><a class="m_7348081263506288608button--secondary" href="https://www.booking.com/apps.en-gb.html?aid=304142;label=gen000nr-10Eg5jb25maXJtYXRpb25tZyiCAkICWFhICWIFbm9yZWZyAnh4iAEBmAEzuAEFyAEF2AED6AEB-AEBkgIBeagCAQ" style="text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://www.booking.com/apps.en-gb.html?aid%3D304142;label%3Dgen000nr-10Eg5jb25maXJtYXRpb25tZyiCAkICWFhICWIFbm9yZWZyAnh4iAEBmAEzuAEFyAEF2AED6AEB-AEBkgIBeagCAQ&amp;source=gmail&amp;ust=1559331297808000&amp;usg=AFQjCNEl6z-Q0MHMD9d4jmFCpjI9F7Qo4g"></a></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:16px;padding-left:16px;padding-right:16px" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height:28px;vertical-align:middle" valign="middle">
                                                                                                <b><?= $alldetails->description->propertyName; ?></b>

                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:8px;font-size: 15px;" valign="top">
                                                                                                <?= $alldetails->location->street; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:4px;font-size: 15px;" valign="top"><strong>Phone Number:</strong>
                                                                                                <span><?= $property_user->phone_number; ?></span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:16px" valign="top">
                                                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <?php
                                                                                                            $pho1 = $pho2 = '';
                                                                                                            foreach ($alldetails->photos as $phot) {
                                                                                                                if ($phot->is_main == 1) {
                                                                                                                    $pho1 = $phot->url;
                                                                                                                }
                                                                                                                if ($phot->is_main == 0) {
                                                                                                                    $pho2 = $phot->url;
                                                                                                                }
                                                                                                            }
                                                                                                            ?>
                                                                                                            <td style="text-align:left" valign="top" width="50%"><a href="">
                                                                                                                    <img alt="Can't see this map? Click here to view location and directions" border="0" src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $pho1; ?>" style="width:280px;max-width:100%!important;height: 183px;margin:0 auto;" width="280px">
                                                                                                                </a>
                                                                                                            </td>
                                                                                                            <td style="text-align:left" valign="top" width="50%"><a href="">
                                                                                                                    <img alt="Hotel information" border="0" src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $pho2; ?>" style="width:280px;max-width:100%!important;height: 183px;margin:0 auto;" width="280px">
                                                                                                                </a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:16px;padding-left:16px;padding-right:16px" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tbody>
                                                                                        <?php
                                                                                        if ($bookingdetails->booking_type == 2) {
                                                                                            ?>
                                                                                            <tr>
                                                                                                <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><b>Room Type</b></td>
                                                                                                <td style="text-align:right;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top">
                                                                                                    <?= $property_bed->bed_name; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php } ?>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><b>Your Stay</b></td>
                                                                                            <td style="text-align:right;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top">
                                                                                                <?= $date_gap; ?> <?= __("night(s)"); ?>
                                                                                                <?php
                                                                                                if ($bookingdetails->booking_type == 2) {
                                                                                                    ?>
                                                                                                    ,
                                                                                                    <?= $bookingdetails->numb_rooms; ?> <?= __("room(s)"); ?>
                                                                                                <?php } ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><b>Check-in</b></td>
                                                                                            <td style="text-align:right;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><time datetime="<?= date_format($bookingdetails->check_in, 'l d F Y'); ?>">                                                                             <?= __(date_format($bookingdetails->check_in, 'l')); ?>
                                                                                                    <?= date_format($bookingdetails->check_in, ' d '); ?>
                                                                                                    <?= __(date_format($bookingdetails->check_in, 'F')); ?>
                                                                                                    <?= date_format($bookingdetails->check_in, ' Y'); ?>
                                                                                                </time>
                                                                                                <span style="color:#707070;white-space:nowrap">
                                                                                                    (from <?= $alldetails->description->checkin; ?>)
                                                                                                </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><b>Check-out</b></td>
                                                                                            <td style="text-align:right;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><time datetime="<?= date_format($bookingdetails->check_out, 'l d F Y'); ?>">
                                                                                                    <?= __(date_format($bookingdetails->check_out, 'l')); ?>
                                                                                                    <?= date_format($bookingdetails->check_out, ' d '); ?>
                                                                                                    <?= __(date_format($bookingdetails->check_out, 'F')); ?>
                                                                                                    <?= date_format($bookingdetails->check_out, ' Y'); ?>
                                                                                                </time>
                                                                                                <span style="color:#707070;white-space:nowrap">
                                                                                                    (until <?= $alldetails->description->checkout; ?>)
                                                                                                </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><b>Payment Method</b></td>
                                                                                            <td style="text-align:right;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top">
                                                                                                <?= $bookingdetails->payment_method; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:8px;padding-bottom:8px;width: 36%;font-size: 15px;" valign="top"><b>Cancellation Policy</b></td>
                                                                                            <td style="text-align: right;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><span><?= __($bookingdetails->cancel_policy); ?></span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:8px;padding-bottom:8px;" valign="top"></td>
                                                                                            <td style="text-align: justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><span>
                                                                                                    <?php
                                                                                                    if ($bookingdetails->cancel_policy == 'Flexible') {

                                                                                                        echo __("Guests can cancel at anytime prior to check-in for a 100% refund. In case of a No-Show, your property will refund in full the total booking price to guests through Alegro.");
                                                                                                    }
                                                                                                    if ($bookingdetails->cancel_policy == 'Moderate') {
                                                                                                        echo __("Guests can cancel up to 3 days prior to check-in for a 100% refund. In case of a No-Show, your property will receive 100% of the total booking price without the Alegro percentage fee.");
                                                                                                    }
                                                                                                    if ($bookingdetails->cancel_policy == 'Strict') {
                                                                                                        echo __("Guests can cancel, but will not be eligible to any refund at all. In case of a No-Show, your property will receive 100% of the total booking price without the Alegro percentage fee.");
                                                                                                    }
                                                                                                    ?>

                                                                                                </span></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:16px;padding-left:16px;padding-right:16px" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="background-color: #eeeeee;border: 1px solid #ccc;padding:16px;" valign="top">
                                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><b>
                                                                                                                    Price Per Night
                                                                                                                </b>
                                                                                                            </td>
                                                                                                            <td style="text-align:right;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;font-size: 15px;" valign="top"><b style="white-space:nowrap">AOA&nbsp;<?= changeFormat(number_format(($bookingdetails->total_cost / $date_gap) / $bookingdetails->numb_rooms, 2)); ?></b></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height:28px;padding-top:8px;font-size: 18px;" valign="top"><b>
                                                                                                                    Total
                                                                                                                </b>
                                                                                                            </td>
                                                                                                            <td style="text-align:right;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height:28px;padding-top:8px;padding-left:8px" valign="top"><b style="white-space:nowrap">AOA&nbsp;<?= changeFormat(number_format(($bookingdetails->total_cost), 2)); ?></b></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>&nbsp;</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align:center;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-bottom:8px;font-size: 15px;font-weight: bold;" valign="top">
                                                                                                                Payment Break-Down
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-bottom:8px;font-size: 15px;" valign="top">
                                                                                                                If your payment has been made via MultiCaixa, rest assured as it has already been collected by Alegro and will be wired to <b><?= $alldetails->description->propertyName; ?></b> once the payment is credited into our bank account.
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-bottom:8px;font-size: 15px;" valign="top">
                                                                                                                On the other hand, if your payment is going to be made at the property, you can also relax, as it will only be collected when you show up at the property during check-in.
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-bottom:8px;font-size: 15px;" valign="top">
                                                                                                                Note: If you would like to request additional supplements (e.g. extra bed) do so at the property, as they are not included to the total amount.
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-bottom:8px;font-size: 15px;" valign="top">
                                                                                                                The total amount is where Alegro takes its service fee from. Neither Alegro nor <b><?= $alldetails->description->propertyName; ?></b> will charge guests additional fees at the time of check-in. Alegro does not charge hidden fees, as you only pay what you have asked for.
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <?php if ($bookingdetails->booking_type == 2) { ?>
                                                                            <tr>
                                                                                <td style="padding-bottom:16px;padding-left:16px;padding-right:16px" valign="top">
                                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height:28px;padding-bottom:16px" valign="top">
                                                                                                    <?php echo __('Room Details'); ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $r_fnm = json_decode($bookingdetails->room_fnm, true);
                                                                                            $r_lnm = json_decode($bookingdetails->room_lnm, true);
                                                                                            for ($rcp_count = 0; $rcp_count < count($r_lnm); $rcp_count++) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;padding-right:16px;font-size: 15px;" valign="top"><b>Room <?php echo $rcp_count + 1; ?> </b></td>
                                                                                                    <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom: 2px solid #eee;padding-top:8px;padding-bottom:8px;width:70%;font-size: 15px;" valign="top"></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;padding-right:16px;font-size: 15px;" valign="top"><b>Guest Name</b></td>
                                                                                                    <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom: 2px solid #eee;padding-top:8px;padding-bottom:8px;width:70%;font-size: 15px;" valign="top"><?php echo $r_fnm[$rcp_count] . ' ' . $r_lnm[$rcp_count]; ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;padding-right:16px;font-size: 15px;" valign="top"><b>Guest Capacity</b></td>
                                                                                                    <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;width:70%;font-size: 15px;" valign="top">
                                                                                                        <?= $this->User->getAccomodation($bookingdetails->room_id); ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;padding-right:16px;font-size: 15px;" valign="top"><b>Breakfast Included</b></td>
                                                                                                    <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;width:70%;font-size: 15px;" valign="top">
                                                                                                        <?php echo in_array('Breakfast Included', json_decode($this->User->subAminiti($bookingdetails->property_id, $bookingdetails->room_id)->Services, true)) ? 'Yes' : 'No'; ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            <?php } ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <tr>
                                                                            <td style="padding-bottom:16px;padding-left:16px;padding-right:16px" valign="top">
                                                                                <br>
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height:28px;padding-bottom:16px" valign="top">How can you get to the property?</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-size: 15px;" valign="top">
                                                                                                <?= $alldetails->description->howToGetThere; ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:left" valign="top" width="50%"><br><a href="https://secure.booking.com/myreservations.en-gb.html?aid=304142;auth_key=2rh0jdZBD6t2erIt&amp;;source=conf_email;pbsource=conf_email_modify#gallery" title="Relais Spa Chessy Val d'Europe" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://secure.booking.com/myreservations.en-gb.html?aid%3D304142;auth_key%3D2rh0jdZBD6t2erIt%26;source%3Dconf_email;pbsource%3Dconf_email_modify%23gallery&amp;source=gmail&amp;ust=1559331297808000&amp;usg=AFQjCNHfe15hzC01MEwdzXtYpKd_F2W9SA">
                                                                                                    <div id="map1" style="width: 100%;height: 350px;"></div>
<!--                                                                                                    <img alt="Hotel information" border="0" src="http://joomly.net/frontend/web/images/googlemap/map.png" style="width: 549px;max-width:100%!important;height:auto;margin:0 auto;" width="280px">-->
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:16px;padding-left:16px;padding-right:16px" valign="top">
                                                                                <h2 style="font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height:28px;padding-bottom:16px" valign="top">House Rules</h2>
                                                                                <p style="font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-size: 15px;"><?= $alldetails->description->houseRules; ?></p>
                                                                                <p></p>
                                                                                <p></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:16px;padding-left:16px;padding-right:16px" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-weight:bold;font-size:18px;line-height:28px;padding-bottom:8px" valign="top">
                                                                                                Need help with your booking?
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align:left" valign="top">
                                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;padding-right: 16px;width: 43%;font-size: 15px;" valign="top"><b>Contact the property</b></td>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;width: 70%;font-size: 15px;" valign="top">
                                                                                                                +244 <?= $property_user->phone_number; ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;padding-right:16px;font-size: 15px;" valign="top"><b>Contact Alegro</b></td>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;border-bottom:2px solid #eee;padding-top:8px;padding-bottom:8px;width:70%;font-size: 15px;" valign="top">
                                                                                                                +244 929 259 256 / +244 929 259 258
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:8px;padding-bottom:8px;padding-right:16px;font-size: 15px;" valign="top"><b>Manage your booking</b></td>
                                                                                                            <td style="text-align:justify;font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;padding-top:8px;padding-bottom:8px;width:70%;font-size: 15px;" valign="top">
                                                                                                                <div style="margin-bottom:16px">The property can <span><b>make changes<b></b></b></span>, <span><b>cancel<b></b></b></span> and <span><b>refund<b></b></b></span> your total booking price if applicable.</div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px;padding-bottom:16px;text-align:center" valign="top">
                                                                                <hr style="margin:0px;padding:0px;border:0px;margin-top:16px;margin-bottom:16px;border-bottom:2px solid #eee;margin-top:0">
                                                                                <p style="font-family:Open Sans,sans-serif;margin:0px;padding:0px;border:0px;font-size:12px;line-height:18px;color:#707070;margin-bottom:8px">
                                                                                    © 2019 Alegro.
                                                                                    All rights reserved.<br>
                                                                                    This e-mail was sent by alegro.co.ao.
                                                                                </p>
                                                                                <p></p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <img height="1" src="?ui=2&amp;ik=26d6884a1a&amp;view=fimg&amp;th=15aa136285d133bf&amp;attid=0.1.12&amp;disp=emb&amp;attbid=ANGjdJ-C8USRFrYHWxBbdU5AajbyODOvQjc71bEpE3EVhVpDRUUg8q0Zz95hhI_JPOpnYXKgoBoV1VXA32PiMCMQv7xy-rzVwQSzd33LZu_ReUDEn83YGz9T77U-PVU&amp;sz=w2-h2&amp;ats=1559244897799&amp;rm=15aa136285d133bf&amp;zw&amp;atsh=1" style="width:1px;height:1px" width="1">
                                            </div>
                                            </font>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvuyVn-j3G78kRKnXBwyhQnHl9Hdf4g2I&callback=initMap">
</script>
<script>

    function initMap() {
        var myLatLng = {lat: <?= $alldetails->location->lati; ?>, lng: <?= $alldetails->location->lngi; ?>};

        var map1 = new google.maps.Map(document.getElementById('map1'), {
            zoom: 17,
            center: myLatLng

        });




        var marker1 = new google.maps.Marker({
            position: myLatLng,
            map: map1,
            title: '<?= $alldetails->location->city; ?>',
            icon: '<?php echo HTTP_ROOT . "img/marker.svg" ?>'
        });

    }
</script>

