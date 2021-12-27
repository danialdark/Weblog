<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosttranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posttranslations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("post_id")->constrained("posts")->onDelete("cascade")->onUpdate("cascade");
            $table->string("language");
            $table->string("title");
            $table->string("summary");
            $table->text("body");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posttranslations');
    }
}
