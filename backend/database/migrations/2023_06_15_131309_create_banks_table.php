<?php

use App\Models\Bank\Bank;
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
        Schema::create(Bank::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Bank::NAME);
            $table->string(Bank::SERVICE_CLASS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Bank::TABLE);
    }
};
