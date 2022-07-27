<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('industry_id')->constrained('industries');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('contactPerson_name');
            $table->string('designation');
            $table->string('contact_number');
            $table->string('email');
            $table->string('unique_id');
            $table->string('strength');
            $table->string('loopholes');
            $table->string('scopes');
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
        Schema::dropIfExists('companies');
    }
}
