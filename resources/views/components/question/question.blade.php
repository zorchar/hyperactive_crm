    <div>
        {{ $question['question'] }}
    </div>
    <div>
        {{ $question['teacher_remark'] }}
    </div>
    <div>
        {{ App\Models\User::find($question['updated_by'])?->first_name ? App\Models\User::find($question['updated_by'])?->first_name : 'Not Available' }}
    </div>
