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
        // Create bank accounts table
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('branch_name')->nullable();
            $table->string('swift_code')->nullable();
            $table->decimal('opening_balance', 15, 2)->default(0);
            $table->decimal('current_balance', 15, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('chart_of_account_id')->nullable();
            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        // Create cash accounts table
        Schema::create('cash_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->string('account_code')->unique();
            $table->decimal('opening_balance', 15, 2)->default(0);
            $table->decimal('current_balance', 15, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('chart_of_account_id')->nullable();
            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        // Create cash transactions table
        Schema::create('cash_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number')->unique();
            $table->date('transaction_date');
            $table->string('transaction_type'); // cash_in, cash_out, transfer
            $table->unsignedBigInteger('cash_account_id');
            $table->foreign('cash_account_id')->references('id')->on('cash_accounts');
            $table->unsignedBigInteger('chart_of_account_id')->nullable(); // for expense/income account
            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts');
            $table->decimal('amount', 15, 2);
            $table->string('reference_number')->nullable();
            $table->string('reference_type')->nullable(); // sales_invoice, purchase_invoice, etc
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        // Create bank transactions table
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number')->unique();
            $table->date('transaction_date');
            $table->string('transaction_type'); // deposit, withdrawal, transfer
            $table->unsignedBigInteger('bank_account_id');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts');
            $table->unsignedBigInteger('chart_of_account_id')->nullable(); // for expense/income account
            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts');
            $table->decimal('amount', 15, 2);
            $table->string('reference_number')->nullable(); // check number, transfer reference
            $table->string('reference_type')->nullable(); // sales_invoice, purchase_invoice, etc
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        // Create bank reconciliations table
        Schema::create('bank_reconciliations', function (Blueprint $table) {
            $table->id();
            $table->string('reconciliation_number')->unique();
            $table->unsignedBigInteger('bank_account_id');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts');
            $table->date('statement_date');
            $table->decimal('statement_balance', 15, 2);
            $table->decimal('system_balance', 15, 2);
            $table->decimal('reconciled_balance', 15, 2);
            $table->decimal('difference', 15, 2)->default(0);
            $table->string('status')->default('draft'); // draft, completed
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('completed_by')->nullable();
            $table->foreign('completed_by')->references('id')->on('users');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Create bank reconciliation items table
        Schema::create('bank_reconciliation_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bank_reconciliation_id');
            $table->foreign('bank_reconciliation_id')->references('id')->on('bank_reconciliations')->onDelete('cascade');
            $table->unsignedBigInteger('bank_transaction_id');
            $table->foreign('bank_transaction_id')->references('id')->on('bank_transactions');
            $table->boolean('is_reconciled')->default(false);
            $table->date('cleared_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_reconciliation_items');
        Schema::dropIfExists('bank_reconciliations');
        Schema::dropIfExists('bank_transactions');
        Schema::dropIfExists('cash_transactions');
        Schema::dropIfExists('cash_accounts');
        Schema::dropIfExists('bank_accounts');
    }
};