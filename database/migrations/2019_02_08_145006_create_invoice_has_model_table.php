<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceHasModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_has_model', function (Blueprint $table) {
            $table->unsignedInteger('invoice_id');

            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model_type')->nullable();
            $table->index(['model_id', 'model_type', ]);

            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');

            $table->primary(['invoice_id', 'model_id', 'model_type'],
                'invoice_has_model_invoice_model_type_primary');

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
        Schema::dropIfExists('invoice_has_model');
    }
}
