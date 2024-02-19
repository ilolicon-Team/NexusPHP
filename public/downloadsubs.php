<?php
require "../include/bittorrent.php";
dbconn();
if (!$CURUSER)
{
    Header("Location: " . get_protocol_prefix() . "$BASEURL/");
    die;
}

$filename = $_GET["subid"];
$dirname = $_GET["torrentid"];

if (!$filename || !$dirname)
die("File name missing\n");

$filename = intval($filename ?? 0);
$dirname = intval($dirname ?? 0);

$res = sql_query("SELECT * FROM subs WHERE id=$filename") or sqlerr(__FILE__, __LINE__);
$arr = mysql_fetch_assoc($res);
if (!$arr)
die("Not found\n");

sql_query("UPDATE subs SET hits=hits+1 WHERE id=$filename") or sqlerr(__FILE__, __LINE__);
$file = ROOT_PATH . "$SUBSPATH/$dirname/$filename.$arr[ext]";

if (!is_file($file))
die("File not found\n");

if (nexus_config('ext_font_lib.enabled') && isset($_GET['extfont']) && $_GET['extfont'] == 1 && in_array($arr['ext'], nexus_config('ext_font_lib.support_type'))) {
    if (nexus_config('ext_font_lib.key') === null) {
        die("Bad key\n");
    }
    $source = nexus_config('ext_font_lib.source');
    $uid = $CURUSER['id'];
    $torrentID = $dirname;
    if (!is_numeric($uid) || !is_numeric($torrentID)) {
        die("Bad id\n");
    }
    $timestamp = time();
    $subtitleFilename = $arr['filename'];
    $subtitleContent = file_get_contents($file);
    if (empty($subtitleContent)) {
        die("Empty subtitle\n");
    }
    $subtitleFile = base64_encode($subtitleContent);
    $subtitleFileHash = sha1($subtitleFile);
    $sign = sha1(nexus_config('ext_font_lib.key') . "Download/{$source}_{$uid}-{$torrentID}-{$timestamp}-{$subtitleFilename}-{$subtitleFileHash}" . nexus_config('ext_font_lib.key'));
    $exturl = (nexus_config('ext_font_lib.download_url') . "?source={$source}&uid={$uid}&torrent_id={$torrentID}&time={$timestamp}&sign={$sign}&filename=" . rawurlencode($subtitleFilename));

    echo <<<html
    <form method="POST" action="{$exturl}">
        <input type="hidden" name="file" value="{$subtitleFile}" />
    </form>
    <script>
        window.onload = function () { document.forms[0].submit() };
    </script>
    html;
    die();
}

$f = fopen($file, "rb");
if (!$f)
die("Cannot open file\n");

header("Content-Length: " . filesize($file));
header("Content-Type: application/octet-stream");

if ( str_replace("Gecko", "", $_SERVER['HTTP_USER_AGENT']) != $_SERVER['HTTP_USER_AGENT'])
{
    header ("Content-Disposition: attachment; filename=\"$arr[filename]\" ; charset=utf-8");
}
else if ( str_replace("Firefox", "", $_SERVER['HTTP_USER_AGENT']) != $_SERVER['HTTP_USER_AGENT'] )
{
    header ("Content-Disposition: attachment; filename=\"$arr[filename]\" ; charset=utf-8");
}
else if ( str_replace("Opera", "", $_SERVER['HTTP_USER_AGENT']) != $_SERVER['HTTP_USER_AGENT'] )
{
    header ("Content-Disposition: attachment; filename=\"$arr[filename]\" ; charset=utf-8");
}
else if ( str_replace("IE", "", $_SERVER['HTTP_USER_AGENT']) != $_SERVER['HTTP_USER_AGENT'] )
{
    header ("Content-Disposition: attachment; filename=".str_replace("+", "%20", rawurlencode($arr['filename'])));
}
else
{
    header ("Content-Disposition: attachment; filename=".str_replace("+", "%20", rawurlencode($arr['filename'])));
}

do
{
$s = fread($f, 4096);
print($s);
} while (!feof($f));
//closefile($f);
exit;
?>
