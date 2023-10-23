<?php

use App\Enums\TransactionStatusEnum;
use App\Models\TransactionStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TransactionStatus::getTableName(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('code', TransactionStatusEnum::casesValues());
            $table->enum('value', TransactionStatusEnum::casesNames());
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
        Schema::dropIfExists(TransactionStatus::getTableName());
    }
};
