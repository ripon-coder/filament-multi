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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('mobile_number_1');
            $table->string('mobile_number_2');
            $table->string('email');
            $table->text('address');
            $table->string('facebook');
            $table->string('instragram');
            $table->string('whatsapp');
            $table->string('linkdin');
            $table->string('youtube');
            $table->string('telegram');
            $table->string('about_us');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};
