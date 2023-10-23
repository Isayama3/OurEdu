<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\TransactionStatusEnum;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        TransactionStatus::create([
            "code" => TransactionStatusEnum::AUTHORIZED->value,
            "value" => strtolower(TransactionStatusEnum::AUTHORIZED->name)
        ]);
        
        TransactionStatus::create([
            "code" => TransactionStatusEnum::DECLINE->value,
            "value" => strtolower(TransactionStatusEnum::DECLINE->name)
        ]);

        TransactionStatus::create([
            "code" => TransactionStatusEnum::REFUNDED->value,
            "value" => strtolower(TransactionStatusEnum::REFUNDED->name)
        ]);
    }
}
