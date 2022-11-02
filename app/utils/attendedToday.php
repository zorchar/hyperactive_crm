<?php

use App\Models\Attendance;

function attendedToday($user)
{
    if (
        Attendance::latest()->filter($user->id)->where('approved_time_of_entry', 'like', '%' . date('y-m-d', strtotime(now())) . '%')->get()->first() ||
        !Attendance::latest()->filter($user->id)->where('created_at', 'like', '%' . date('y-m-d', strtotime(now())) . '%')->get()->first()?->approved_time_of_entry
    ) {
        return true;
    }
    return false;
}
