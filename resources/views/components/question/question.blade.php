    <div>
        {{ $question['question'] }}
    </div>
    <div>
        {{ $question['teacher_remark'] ? $question['teacher_remark'] : 'Not Available' }}
    </div>
    <div>
        <?php
        $user = App\Models\User::find($question['updated_by']);
        ?>

        {{ $user ? $user->first_name . ' ' . $user->last_name : 'Not Available' }}
    </div>
