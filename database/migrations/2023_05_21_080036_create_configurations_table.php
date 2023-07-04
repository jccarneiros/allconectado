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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_email');
            $table->string('app_cep')->nullable();
            $table->string('app_endereco')->nullable();
            $table->string('app_numero')->nullable();
            $table->string('app_bairro')->nullable();
            $table->string('app_cidade')->nullable();
            $table->string('app_estado')->nullable();
            $table->string('app_site')->nullable();
            $table->string('app_telefone_um')->nullable();
            $table->string('app_telefone_dois')->nullable();
            $table->string('app_telefone_tres')->nullable();
            $table->string('app_autor');
            $table->string('app_image')->nullable();
            $table->string('app_url')->nullable();
            $table->string('app_debug');
            $table->string('app_env');
            $table->string('app_description');
            $table->string('session_lifetime');
            $table->string('session_expire_on_close');
            $table->string('session_encrypt');
            $table->boolean('app_enable_register')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
