<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestFile extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the TestFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function testcase()
    {
        return $this->hasMany(TestCase::class);
    }
    function users()
    {
        $users = User::all();
        return $users;
    }

    function responsible($id)
    {
        $responsible = User::where('id', $id)->first();
        return $responsible->name;
    }

}