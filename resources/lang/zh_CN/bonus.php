<?php

return [
    'comment_buy_medal' => '用 :bonus 魔力购得一枚 :medal_name 勋章',
    'comment_buy_attendance_card' => '用 :bonus 魔力购得 1 张补签卡',
    'comment_buy_temporary_invite' => '用 :bonus 魔力购得 :count 个临时邀请',
    'comment_buy_rainbow_id' => '用 :bonus 魔力购得 :duration 天的彩虹 ID',
    'comment_buy_change_username_card' => '用 :bonus 魔力购得改名卡',
    'comment_gift_medal' => '用 :bonus 魔力购得 :medal_name 并赠送给 :to_username',
    'comment_buy_torrent' => '用 :bonus 魔力购得种子：:torrent_id',
    'comment_torrent_be_downloaded' => '魔力来源于种子被 :username(UID: :uid) 下载',
    'table_thead' => [
        'reward_type' => '奖励类型',
        'count' => '数量',
        'size' => '体积',
        'a_value' => 'A 值',
        'bonus_base' => '基础魔力',
        'factor' => '系数',
        'got_bonus' => '获得魔力',
        'total' => '合计',
    ],
    'reward_types' => [
        'basic' => '基本奖励',
        'harem_addition' => '后宫加成',
        'official_addition' => '官种加成',
        'medal_addition' => '勋章加成',
    ],
    'not_enough' => '哎呀，魔力不够啦！需要 :require_bonus，你现在只有：:now_bonus',
];
