<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

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
            $table->bigIncrements('id');
            $table->string('name')->default('');
            $table->string('nom')->default('');
            $table->string('prenom')->default('');
            $table->string('email')->unique()->default('');
            $table->date('date_naissance')->default(Carbon::now());
            $table->string('telephone')->default('');
            $table->boolean('majeur')->default(0);
            $table->boolean('cgu')->default(0);
            $table->boolean('newsletter')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('');
            $table->integer('role_id')->default('1');
            $table->string('provider')->default('none');
            $table->string('provider_id')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
