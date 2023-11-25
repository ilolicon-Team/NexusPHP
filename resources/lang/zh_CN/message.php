<?php
return [

    'index' => [
        'page_title' => '甜蜜私信列表',
    ],
    'show' => [
        'page_title' => '甜蜜私信详情',
    ],
    'field_value_change_message_body' => ':field 被管理员 :operator 从 :old 改为 :new。理由是：:reason。',
    'field_value_change_message_subject' => '嘿！:field 有点变哟！',

    'download_disable' => [
        'subject' => '下载权限说拜拜',
        'body' => '亲爱的，你的下载权限被取消啦！可能是因为分享率太低或有些行为不太得体。By: :operator',
    ],
    'download_disable_upload_over_speed' => [
        'subject' => '下载权限被风控啦',
        'body' => '哎呀！因为你上传速度太快，下载权限被取消了。如果是盒子用户请记得备案哦。',
    ],
    'download_enable' => [
        'subject' => '下载权限回归',
        'body' => '好消息！你的下载权限又回来啦，现在可以尽情下载种子啦。By: :operator',
    ],
    'temporary_invite_change' => [
        'subject' => '有个小变动:change_type',
        'body' => '嘿嘿！管理员 :operator 对你的临时邀请做了点小变动哦，共 :count 次，原因是：:reason。',
    ],
    'receive_medal' => [
        'subject' => '哇！获得勋章提醒',
        'body' => '哦哦！用户 :username 用了 :cost_bonus 魔力买了勋章[:medal_name]，然后送给了你。这个勋章价值 :price，手续费 :gift_fee_total(系数：:gift_fee_factor)，你能一直拥有它直到: :expire_at，而且勋章的魔力加成系数是: :bonus_addition_factor。',
    ],
    'login_notify' => [
        'subject' => '咦？异地登录啦',
        'body' => <<<BODY
喂喂喂！你在: :this_login_time 登录了哦。IP：:this_ip，位置：:this_location。<br/>
上次登录时间：:last_login_time，IP：:last_ip，位置：:last_location。<br/>
如果不是你本人的话，账号密码可能泄露了，请记得尽快修改密码哦！
BODY,
    ],
    'buy_torrent_success' => [
        'subject' => '好消息！成功购种啦',
        'body' => '耶！你用了 :bonus 魔力成功购买了种子：[url=:url]:torrent_name[/url]',
    ],
];
