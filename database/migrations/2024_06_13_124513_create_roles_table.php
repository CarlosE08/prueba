<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Este método crea automáticamente un campo `id` de tipo INT y autoincremental.
            $table->string('name', 255); // Columna `name` de tipo VARCHAR de longitud 255.
            $table->timestamps(); // Este método crea automáticamente los campos `created_at` y `updated_at`.
        });

        // Insertar datos iniciales
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'client'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
