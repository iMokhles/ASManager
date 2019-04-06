<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');

            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();

            $table->string('device')->nullable();
            $table->string('serial_number')->nullable();



            $table->enum('type', \App\Enums\RequestType::getValues())
                ->default(\App\Enums\RequestType::software);
            $table->enum('status', \App\Enums\RequestStatus::getValues())
                ->default(\App\Enums\RequestStatus::received);

            $table->string('cost')->nullable();
            $table->text('details')->nullable();
            $table->timestamp('deadline')->nullable();

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
        Schema::dropIfExists('requests');
    }
}
