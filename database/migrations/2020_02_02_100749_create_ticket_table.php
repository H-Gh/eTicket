<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'ticket',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text("title");
                $table->text("answer");
                $table->string("status");
                $table->integer("created_by");
                $table->integer("assigned_to");
                $table->integer("answered_by");
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
}
