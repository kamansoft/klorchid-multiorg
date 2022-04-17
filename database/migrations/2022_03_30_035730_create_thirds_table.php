<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kamansoft\PlatformMultiorg\Models\Third;

class CreateThirdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thirds', function (Blueprint $table):void {
            $table->uuid('id')->primary();
            $table->set('person_type', [Third::JURIDICAL_PERSON_TYPE,Third::NATURAL_PERSON_TYPE]);
            $table->string('nin')->comment('national identification number')->unique();
            $table->text('address')->nullable();
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->jsonb('extra_data')->nullable();
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
        Schema::dropIfExists('thirds');
    }
}
