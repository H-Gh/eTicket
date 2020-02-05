<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tickets',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text("title");
                $table->longText("text");
                $table->string("status")->default(\App\Ticket::PENDING);
                $table->text("answer")->nullable();
                $table->integer("assigned_to")->nullable();
                $table->integer("answered_by")->nullable();
                $table->timestamp("answered_at")->nullable();
                $table->integer("created_by");
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
        Schema::dropIfExists('tickets');
    }
}
