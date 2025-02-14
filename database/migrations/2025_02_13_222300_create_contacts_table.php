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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('forenames', 35);
            $table->string('surname', 35);
            $table->string('address_line_1', 35);
            $table->string('address_line_2', 35)->nullable();
            $table->string('address_line_3', 35)->nullable();
            $table->string('address_line_4', 35)->nullable();
            $table->string('postcode', 8);
            $table->string('telephone', 12)->nullable();
            $table->string('mobile', 12)->nullable();
            $table->string('email', 255)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
