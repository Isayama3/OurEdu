<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Transaction;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Transaction::getTableName(), function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('paid_amount');
            $table->text('currency');
            $table->text('status_code');
            $table->date('payment_date');
            $table->string('parent_email');
            $table->string('parent_identification');

            $table->foreign('parent_email')->references('email')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists(Transaction::getTableName());
    }
};
