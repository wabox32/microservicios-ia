<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_document_id');
            $table->foreign('type_document_id')->references('id')->on('type_documents')->onDelete('cascade');
            $table->string('first_name', 45);
            $table->string('second_name', 45);
            $table->string('lastname', 45);
            $table->string('surname', 45);
            $table->string('identification_number', 45);
            $table->string('email', 191);
            $table->string('password', 191);
            $table->string('address', 191);
            $table->enum('status', ['activo', 'inactivo']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
