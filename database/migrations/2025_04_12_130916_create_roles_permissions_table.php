<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger("role_id");
            $table->unsignedBigInteger("permission_id");

            $table->foreign("role_id")->references("id")->on("roles");
            $table->foreign("permission_id")->references("id")->on("permissions");

            $table->primary(["role_id", "permission_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_permissions');
    }
};
