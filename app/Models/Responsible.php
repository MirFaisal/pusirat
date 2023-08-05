<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Responsible extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    function userName($id)
    {
        $user = User::where('id', $id)->first();
        return $user->name;

    }
    function userEmail($id)
    {
        $user = User::where('id', $id)->first();
        return $user->email;

    }
    function getFilenumber($id)
    {
        $testFile = TestFile::where('id', $id)->first();
        return $testFile->case_number;
    }
    function getFiletitle($id)
    {
        $testFile = TestFile::where('id', $id)->first();
        return $testFile->title;
    }
    function getFileResponsibile($id)
    {
        $userId = TestFile::where('id', $id)->first();

        $user = User::where('id', $userId->user_id)->first();
        // dd($user);
        return $user->name;
    }
}