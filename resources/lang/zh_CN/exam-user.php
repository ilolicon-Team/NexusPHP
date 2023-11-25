<?php

return [
    'admin' => [
        'list' => [
            'page_title' => '考核用户列表'
        ]
    ],
    'status' => [
        \App\Models\ExamUser::STATUS_FINISHED => '考核已结束',
        \App\Models\ExamUser::STATUS_AVOIDED => '已免除考核',
        \App\Models\ExamUser::STATUS_NORMAL => '考核中',
    ],
];
