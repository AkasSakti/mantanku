<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mantan', function (Blueprint $table) {
            $table->increments('id_mantan');
            $table->string('Nama_mantan', 100);
            $table->text('Alamat');
            $table->string('No_Hp', 15);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mantan');
    }
};
