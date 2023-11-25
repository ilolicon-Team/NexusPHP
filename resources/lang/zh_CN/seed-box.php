<?php

return [
    'type_text' => [
        \App\Models\SeedBoxRecord::TYPE_USER => '萌萌的用户',
        \App\Models\SeedBoxRecord::TYPE_ADMIN => '霸道的管理员',
    ],
    'status_text' => [
        \App\Models\SeedBoxRecord::STATUS_UNAUDITED => '还没被注意到',
        \App\Models\SeedBoxRecord::STATUS_ALLOWED => '被宠幸通过啦',
        \App\Models\SeedBoxRecord::STATUS_DENIED => '被嫌弃拒绝了',
    ],
    'status_change_message' => [
        'subject' => 'SeedBox 记录状态有点小变动哦',
        'body' => '你的 ID 为 :id 的SeedBox记录状态被:operator从:old_status变更为:new_status哦。原因：:reason',
    ],
];
