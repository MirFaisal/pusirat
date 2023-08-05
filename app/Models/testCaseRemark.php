<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testCaseRemark extends Model
{
    use HasFactory;
    function testCase()
    {
        return $this->belongsTo(TestCase::class);
    }
    function user()
    {
        return $this->belongsTo(user::class);
    }

    function userName($id)
    {
        $user = User::where('id', $id)->first();
        return $user->name;
    }
}