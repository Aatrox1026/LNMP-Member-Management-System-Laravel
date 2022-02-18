<?php

use App\Models\Comment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('post');
            $table->foreignId('user_id')->constrained('user');
            $table->string('text');
            $table->string('status')->nullable();
            $table->timestampTz('create_at')->nullable();
            $table->timestampTz('update_at')->nullable();
        });

        for ($i = 0; $i < 9; $i++)
            Comment::create([
                'post_id' => $i % 3 + 1,
                'user_id' => 1,
                'text' => 'comment'.($i + 1)
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
