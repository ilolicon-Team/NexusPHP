<?php

return [
    'edit_ban_reason' => '被管理小精灵封印',
    'deleted_username' => '神秘账号不存在',
    'admin' => [
        'list' => [
            'page_title' => '巨巨用户列表'
        ]
    ],
    'labels' => [
        'seedbonus' => '魔力值',
        'seed_points' => '做种积分',
        'uploaded' => '上传量',
        'downloaded' => '下载量',
        'invites' => '邀请数量',
        'attendance_card' => '签到卡',
        'props' => '神奇道具',
        'class' => '大神等级',
        'vip_added' => '贵宾资格通过魔力值获得',
        'vip_added_help' => '贵宾资格是否通过魔力值换取。',
        'vip_until' => '贵宾资格结束时间',
        'vip_until_help' => "时间格式为'年年年年-月月-日日 时时:分分:秒秒'。贵宾资格结束的时间。'贵宾资格为通过魔力值获得'必须设为'是'此规则才能生效。",
    ],
    'class_names' => [
        \App\Models\User::CLASS_VIP => '大神贵宾',
        \App\Models\User::CLASS_RETIREE => '养老巨巨',
        \App\Models\User::CLASS_UPLOADER => '资源发布员',
        \App\Models\User::CLASS_MODERATOR => '总版主',
        \App\Models\User::CLASS_ADMINISTRATOR => '大神管理员',
        \App\Models\User::CLASS_SYSOP => '维护开发大神',
        \App\Models\User::CLASS_STAFF_LEADER => '大神主管',
    ],
    'change_username_lte_min_interval' => '上次修改时间：:last_change_time，未满足最小间隔：:interval 天',
    'destroy_by_admin' => '被管理员神秘删除',
    'disable_by_admin' => '被管理巨巨封印',
    'genders' => [
        \App\Models\User::GENDER_MALE => '大神男',
        \App\Models\User::GENDER_FEMALE => '神秘女',
        \App\Models\User::GENDER_UNKNOWN => '未知',
    ],
    'grant_props_notification' => [
        'subject' => '获得神奇道具：:name',
        'body' => ':operator 授予你 :name， 有效期：:duration。',
    ],
    'metas' => [
        'already_valid_forever' => ':meta_key_text 已永恒生效',
    ],
    'edit_notifications' => [
        'change_class' => [
            'promote' => '升级',
            'demote' => '降级',
            'subject' => '大神等级变动',
            'body' => '你被:action为:new_class，管理员：:operator, 原因：:reason。',
        ],
    ],
    'username_already_exists' => '用户名：:username 已经存在了，换一个吧',
    'username_invalid' => '用户名：:username 似乎不太对哦',
];
