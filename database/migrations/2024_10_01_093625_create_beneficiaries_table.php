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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('national_id');
            $table->string('fullname');
            $table->string('phonenumber');
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('recipient_nid');
            $table->string('project_name');
            $table->string('partner');
            $table->unsignedBigInteger('transfer_value');
            $table->unsignedBigInteger('transfer_count');
            $table->date('transfer_date');
            $table->date('recipient_date');
            $table->enum('sector', ['protection', 'shelter', 'nutrition', 'health', 'wash', 'food', 'livlihood', 'education']);
            $table->enum('modality', ['cash', 'voucher', 'evoucher']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
