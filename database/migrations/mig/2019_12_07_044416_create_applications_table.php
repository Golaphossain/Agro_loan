<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->string('farmerName');
            $table->string('farmerType');
            $table->string('landAmount');
            $table->string('nidNo');
            $table->string('nidImage')->default('default.png');
            $table->string('phone');
            $table->string('district');
            $table->text('address');
            $table->string('nomineeName');
            $table->string('nRelation');
            $table->string('nNid');
            $table->string('nNidImage')->default('default.png');
            $table->string('nomineeImage')->default('default.png');
            $table->text('nAddress');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['user_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
