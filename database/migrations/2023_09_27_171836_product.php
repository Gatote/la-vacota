<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->decimal('profit', 10, 2)->nullable();
            $table->string('image');
            $table->timestamps();
        });

        // Crea una función en PostgreSQL para calcular profit
        DB::statement('CREATE OR REPLACE FUNCTION calculate_profit() RETURNS TRIGGER AS $$
        BEGIN
            NEW.profit = NEW.price - NEW.cost;
            RETURN NEW;
        END;
        $$ LANGUAGE plpgsql');

        // Crea un trigger para llamar a la función cuando se actualizan o insertan registros
        DB::statement('CREATE TRIGGER calculate_profit_trigger
            BEFORE INSERT OR UPDATE
            ON products
            FOR EACH ROW
            EXECUTE FUNCTION calculate_profit()');
    }




    public function down()
    {
        Schema::dropIfExists('products');
    }
};
