<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    use HasFactory;

    function testFile()
    {
        return $this->belongsTo(TestFile::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function testCaseData()
    {
        return $this->hasMany(TestCaseData::class);
    }
    function testCaseRemark()
    {
        return $this->hasMany(testCaseRemark::class);
    }
    function result($case_no)
    {
        $case = TestCase::where('case_no', $case_no)->first();
        return $case->status;
    }

    function createdBy($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return $user->name;
    }

}