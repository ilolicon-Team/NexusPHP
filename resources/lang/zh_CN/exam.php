<?php

return [
    'labels' => [
        'exam' => '考核小考卷',
        'name' => '取个可爱的名字',
        'index' => '评分标准',
        'time_range' => '考核时间段',
    ],
    'index_text' => [
        \App\Models\Exam::INDEX_UPLOADED => '上传小公主',
        \App\Models\Exam::INDEX_SEED_TIME_AVERAGE => '种子守护时光',
        \App\Models\Exam::INDEX_DOWNLOADED => '下载小天使',
        \App\Models\Exam::INDEX_SEED_BONUS => '魔法魔力',
        \App\Models\Exam::INDEX_SEED_POINTS => '做种积分之星',
        \App\Models\Exam::INDEX_UPLOAD_TORRENT_COUNT => '发种小能手',
    ],
    'filters' => [
        \App\Models\Exam::FILTER_USER_CLASS => '用户等级',
        \App\Models\Exam::FILTER_USER_REGISTER_TIME_RANGE => '注册时间范围',
        \App\Models\Exam::FILTER_USER_DONATE => '是否捐赠',
    ],
    'require_value' => '小考卷要求',
    'current_value' => '小考卷成绩',
    'result' => '成绩单',
    'result_pass' => '通过啦！',
    'result_not_pass' => '<span style="color: red">还差一点点哦~</span>',
    'checkout_pass_message_subject' => '小考卷通关啦！',
    'checkout_pass_message_content' => '恭喜啦！你在考核时间段（:begin ~ :end）内，顺利通过了小考卷：:exam_name。真是太棒啦！',
    'checkout_not_pass_message_subject' => '小考卷没过哦，账号被封住了~',
    'checkout_not_pass_message_content' => '在考核时间段（:begin ~ :end）里，你没能完成小考卷：:exam_name。账号暂时被封住了，赶快准备下次考试吧~',
    'ban_log_reason' => '未能完成小考卷：:exam_name(:begin ~ :end)',
    'ban_user_modcomment' => '未通过小考卷: :exam_name(:begin ~ :end)，被系统封住了。',
    'admin' => [
        'list' => [
            'page_title' => '考核小考卷列表'
        ]
    ]
];
