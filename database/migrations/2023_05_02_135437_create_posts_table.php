<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->string('image')->default('https://phonoteka.org/uploads/posts/2021-06/1622512759_25-phonoteka_org-p-drevnyaya-yaponiya-art-krasivo-26.jpg');
            $table->unsignedBigInteger('tag_id');
            $table->index('tag_id', 'post_tag_idx');
            $table->foreign('tag_id', 'post_tag_fx')->on('tags')->references('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'user_tag_idx');
            $table->foreign('user_id', 'user_tag_fx')->on('users')->references('id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
