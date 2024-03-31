<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW candidatos_preseleccionados AS SELECT referencia AS 'id_oferta', COUNT(DISTINCT nombre) AS 'candidatos_preseleccionados' FROM oferta, estado WHERE oferta.referencia = estado.id_oferta AND nombre LIKE 'Preseleccionado'  GROUP BY referencia;");

        DB::statement("CREATE VIEW candidatos_descartados AS SELECT referencia AS 'id_oferta', COUNT(DISTINCT nombre) AS 'candidatos_descartados' FROM oferta, estado WHERE oferta.referencia = estado.id_oferta AND nombre LIKE 'Descartado'  GROUP BY referencia;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS candidatos_preseleccionados;");
        DB::statement("DROP VIEW IF EXISTS candidatos_descartados;");
    }
};
