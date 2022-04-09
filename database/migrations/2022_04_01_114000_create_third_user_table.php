<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_user', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignUuid('third_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->primary(['user_id', 'third_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migratiohp ns.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('third_user');
    }
}
