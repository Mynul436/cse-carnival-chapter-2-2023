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
        Schema::create('doctorsblogs', function (Blueprint $table) {
            // $table->id();

            // $table->string('name');
            // $table->string('slug')->nullable();
            // $table->text('description')->nullable();
            // $table->tinyInteger('status')->default(1);

            // $table->integer('created_by')->unsigned()->nullable();
            // $table->integer('updated_by')->unsigned()->nullable();
            // $table->integer('deleted_by')->unsigned()->nullable();

            // $table->timestamps();
            // $table->softDeletes();
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('intro')->nullable();
            $table->text('content')->nullable();
            $table->longText('comment')->nullable();

            $table->string('type')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('category_name')->nullable();
            $table->integer('is_featured')->nullable();
            $table->string('featured_image')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_og_image')->nullable();
            $table->string('meta_og_url')->nullable();

            $table->integer('hits')->default(0)->unsigned();
            $table->integer('order')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->integer('moderated_by')->unsigned()->nullable();
            $table->datetime('moderated_at')->nullable();

            $table->integer('created_by')->unsigned()->nullable();
            $table->string('created_by_name')->nullable();
            $table->string('created_by_alias')->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

        

            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('doctorsblogs');
    }
};
