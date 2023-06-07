<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // va aggiunto un campo per indicare quale è la colonna dell'id
            $table->unsignedBigInteger('type_id')->nullable()->after('id'); //mettiamo nullable perche ci possono essere dei campi nel quale non ce il type. AFTER per indicare che la vogliamo dopo un elemento
            // vincolo, indicando alla chiave esterna sopra creata a quale colonna di quale tabella fa parte. indichiamo cosa succede se il record venisse eliminato possiamo dire di settare tutti gli elementi con questa categoria su null.
            $table->foreign('type_id')->references('id')->on('types')->onDelete(('set null'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
