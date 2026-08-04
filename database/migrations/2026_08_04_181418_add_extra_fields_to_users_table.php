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
    Schema::table('users', function (Blueprint $table) {
        $table->string('cpf')->unique()->nullable()->after('email');
        $table->decimal('balance', 10, 2)->default(0)->after('cpf');
        $table->string('photo')->nullable()->after('balance');
        $table->string('phone')->nullable()->after('photo');
        $table->date('birth_date')->nullable()->after('phone');
        $table->string('cep')->nullable()->after('birth_date');
        $table->string('number')->nullable()->after('cep');
        $table->string('street')->nullable()->after('number');
        $table->string('neighborhood')->nullable()->after('street');
        $table->string('city')->nullable()->after('neighborhood');
        $table->string('state')->nullable()->after('city');
        $table->string('complement')->nullable()->after('state');
    });
}

    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['cpf', 'balance', 'photo', 'phone', 'birth_date', 'cep', 'number', 'street', 'neighborhood', 'city', 'state', 'complement']);
    });
}
};
