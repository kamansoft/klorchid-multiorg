<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationThirdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_third', function (Blueprint $table) {
            $table->foreignUuid('organization_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('third_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->primary(['organization_id', 'third_id']);
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
        Schema::dropIfExists('organization_third');
    }
}
