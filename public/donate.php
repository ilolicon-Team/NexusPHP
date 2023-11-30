<?php
require "../include/bittorrent.php";
dbconn();
require_once(get_langfile_path());
if ($enabledonation != 'yes')
        stderr($lang_donate['std_sorry'], $lang_donate['std_do_not_accept_donation']);

$do = $_GET['do'] ?? '';

if ($do == 'thanks') {
        stderr($lang_donate['std_success'], $lang_donate['std_donation_success_note_one']."<a href=\"sendmessage.php?receiver=".$ACCOUNTANTID."\"><b>".$lang_donate['std_here']."</b></a>".$lang_donate['std_donation_success_note_two'], false);
}
else
{
    $custom = trim(\App\Models\Setting::getByName('misc.donation_custom'));
    $ethereumAddress = '0x28a916E60aaB5172ecc7f513947Fcc2288fd940a';
    $usdtAddress = 'TKmBqTJBFu2u68umSQZo8VaNpZf48qCRL3';
    $alipayWechatUrl = 'https://auto.ilolicon.com'; // URL for Alipay/Wechat redirection

    $showethereum = true;
    $showusdt = true;
    $showalipaywechat = true;
    //----------- NexusPHP -------------
    $showpaypal = true;
    $showalipay = true;
    if ($showpaypal && $showalipay)
                $tdattr = "width=\"33%\"";
        elseif ($showpaypal || $showalipay)
                $tdattr = "colspan=\"3\" width=\"100%\"";
    if (!$showpaypal && !$showalipay && !$custom) {
        stderr($lang_donate['std_error'], $lang_donate['std_no_donation_account_available'], false);
    }

    if ($showethereum && ($showusdt || $showalipaywechat))
        $tdattr = "width=\"33%\"";
    elseif ($showusdt && $showalipaywechat)
        $tdattr = "width=\"50%\"";
    else
        $tdattr = "colspan=\"3\" width=\"100%\"";

    if (!$showethereum && !$showusdt && !$showalipaywechat && !$custom) {
        stderr($lang_donate['std_error'], $lang_donate['std_no_donation_account_available'], false);
    }

    stdhead($lang_donate['head_donation']);
    begin_main_frame();
    print("<h2>".$lang_donate['text_donate']."</h2>");
    print("<table width=100%>");
    print("<tr><td colspan=3 class=text align=left>".$lang_donate['text_donation_note']."</td></tr>");
    if ($custom) {
        echo sprintf('<tr><td class="text" align="left" colspan="3">%s</td></tr>', format_comment($custom));
    }
    print("<tr>");
    if ($showethereum){
?>
<td class=text align=left valign=top <?php echo $tdattr?>>
<b>Ethereum</b><br /><br />
<?php echo $lang_donate['text_donate_ethereum_note']?>
<!-- Display Ethereum address -->
<?php echo $ethereumAddress; ?>
</td>
<?php
    }
    if ($showusdt){
?>
<td class=text align=left valign=top <?php echo $tdattr?>>
<b>USDT</b><br /><br />
<?php echo $lang_donate['text_donate_usdt_note']?>
<!-- Display USDT address -->
<?php echo $usdtAddress; ?>
</td>
<?php
    }
    if ($showalipaywechat){
?>
<td class=text align=left valign=top <?php echo $tdattr?>>
</b>Wechat /
Alipay <br /><br />
<!-- Redirect to Alipay/Wechat donation page -->
<a href="<?php echo $alipayWechatUrl; ?>" class="button" target="_blank">Go to auto.ilolicon.com</a>
</td>
<?php
    }
    print("</tr>");
    print("<tr><td class=text colspan=3 align=left>".$lang_donate['text_after_donation_note_one']
    ."<a href=\"sendmessage.php?receiver=".$ACCOUNTANTID."\"><font class=\"striking\"><b>".$lang_donate['text_send_us']."</b></font></a>".$lang_donate['text_after_donation_note_two']."</td></tr>");
    print("</table>");
    end_main_frame();
    stdfoot();
}
?>
