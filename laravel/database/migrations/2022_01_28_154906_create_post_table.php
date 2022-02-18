<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poster_id')->constrained('user');
            $table->string('title');
            $table->string('status')->nullable();
            $table->timestampTz('create_at')->nullable();
            $table->timestampTz('update_at')->nullable();
        });

        for ($i = 0; $i < 3; $i++)
            Post::create([
                'poster_id' => 1,
                'title' => 'title'.($i + 1)
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
