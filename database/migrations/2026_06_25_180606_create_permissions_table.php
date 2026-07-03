<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug')->unique();
        });

        DB::table('permissions')->insert([
            ['name' => 'Create Users', 'slug' => 'create-users'],
            ['name' => 'View Users', 'slug' => 'view-users'],
            ['name' => 'Edit Users', 'slug' => 'edit-users'],
            ['name' => 'Delete Users', 'slug' => 'delete-users'],
            ['name' => 'View Roles', 'slug' => 'view-roles'],
            ['name' => 'Create Articles', 'slug' => 'create-articles'],
            ['name' => 'Edit Articles', 'slug' => 'edit-articles'],
            ['name' => 'Delete Articles', 'slug' => 'delete-articles'],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
