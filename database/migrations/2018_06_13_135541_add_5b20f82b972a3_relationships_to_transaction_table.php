<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b20f82b972a3RelationshipsToTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function(Blueprint $table) {
            if (!Schema::hasColumn('transactions', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '5348_5b20f82b5aeb7')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('transactions', 'transaction_type_id')) {
                $table->integer('transaction_type_id')->unsigned()->nullable();
                $table->foreign('transaction_type_id', '5348_5b20f82b60970')->references('id')->on('transaction_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('transactions', 'income_source_id')) {
                $table->integer('income_source_id')->unsigned()->nullable();
                $table->foreign('income_source_id', '5348_5b20f82b665cd')->references('id')->on('income_sources')->onDelete('cascade');
                }
                if (!Schema::hasColumn('transactions', 'currency_id')) {
                $table->integer('currency_id')->unsigned()->nullable();
                $table->foreign('currency_id', '5348_5b20f82b6c61a')->references('id')->on('currencies')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function(Blueprint $table) {
            
        });
    }
}
