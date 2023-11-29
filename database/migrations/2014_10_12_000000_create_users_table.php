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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->text('telephone');
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->rememberToken();
            $table->timestamps();

            // Les attributs du projet

            // $table->id();
            // $table->string('Nom');
            // $table->string('prenom');
            // $table->string('email');
            // $table->text('telephone');
            // $table->string('motDePasse');
            // $table->timestamps();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dateCreation');
            $table->string('slogan');
            $table->string('logo');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->rememberToken();
            $table->timestamps();


            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
