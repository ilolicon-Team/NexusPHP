<?php

return [
    'status_' . \App\Models\HitAndRun::STATUS_INSPECTING => '考察中',
    'status_' . \App\Models\HitAndRun::STATUS_REACHED => '已达标',
    'status_' . \App\Models\HitAndRun::STATUS_UNREACHED => '未达标',
    'status_' . \App\Models\HitAndRun::STATUS_PARDONED => '已免罪',

    'mode_' . \App\Models\HitAndRun::MODE_DISABLED => '停用',
    'mode_' . \App\Models\HitAndRun::MODE_MANUAL => '手动',
    'mode_' . \App\Models\HitAndRun::MODE_GLOBAL => '全局',

    'reached_by_seed_time_comment' => '在 :now 截止，你的魔法种子做种时间已达标：:seed_time 小时（最低要求：:seed_time_minimum 小时）',
    'reached_by_share_ratio_comment' => "在 :now 截止\n魔法种子做种时间：:seed_time 小时（未达标要求：:seed_time_minimum 小时）\n分享率：:share_ratio（达标标准：:ignore_when_ratio_reach 时无视）",
    'reached_message_subject' => '恭喜！H&R(ID: :hit_and_run_id) 已达标！',
    'reached_message_content' => '你于 :completed_at 完成下载的魔法种子：:torrent_name(ID: :torrent_id) H&R 已达标，太棒了！',

    'unreached_comment' => "在 :now 截止\n魔法种子做种时间：:seed_time 小时（未达标要求：:seed_time_minimum 小时）\n分享率：:share_ratio（未达标标准：:ignore_when_ratio_reach 时也未达标）",
    'unreached_message_subject' => 'Oops！H&R(ID: :hit_and_run_id) 未达标!',
    'unreached_message_content' => '你于 :completed_at 完成下载的魔法种子：:torrent_name(ID: :torrent_id) H&R 未达标，加油！',

    'unreached_disable_comment' => '由于累计 H&R 数量已达系统上限：:ban_user_when_counts_reach，你的账号已被禁用。',
    'unreached_disable_message_content' => '由于累计 H&R 数量已达系统上限：:ban_user_when_counts_reach，你的账号已被系统禁用。',

    'bonus_cancel_comment' => '你花费 :bonus 魔力进行了 H&R 消除',
    'remove_confirm_msg' => '确认要进行 H&R 消除吗？这将扣除 :bonus 魔力。',
];
