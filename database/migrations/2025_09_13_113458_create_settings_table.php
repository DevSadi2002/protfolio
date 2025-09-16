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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->text('description')->nullable();
            $table->string('email')->nullable();

            // لينكات التواصل الاجتماعي
            // $table->json('social_links')->nullable();
            $table->string('instgram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->string('githup')->nullable();


            // footer
            $table->string('copyright_holder')->nullable(); // صاحب الحقوق مثل "Annie Wu"
            $table->year('copyright_start')->nullable();     // سنة البداية
            $table->year('copyright_end')->nullable();       // سنة النهاية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
