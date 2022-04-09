<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationRoleThirdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_role_third', function (Blueprint $table) {
            $table->foreignUuid('organization_role_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('third_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->primary(['organization_role_id', 'third_id']);
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
        Schema::dropIfExists('organization_role_third');
    }
}
