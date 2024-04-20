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
        DB::statement('
            CREATE EVENT actualiza_estado_ofertas_cerradas
            ON SCHEDULE EVERY 1 DAY
            STARTS TIMESTAMP(CURRENT_DATE) + INTERVAL 1 DAY + INTERVAL 0 HOUR
            ON COMPLETION PRESERVE
            DO
                UPDATE oferta
                SET estado = "Oculta"
                WHERE fecha_cierre = CURDATE();
        ');

        DB::statement('
            CREATE EVENT resetea_checkin
            ON SCHEDULE EVERY 1 DAY
            STARTS TIMESTAMP(CURRENT_DATE) + INTERVAL 1 DAY + INTERVAL 0 HOUR
            ON COMPLETION PRESERVE
            DO
                UPDATE demandantes
                SET checkin = false;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP EVENT IF EXISTS actualiza_estado_ofertas_cerradas');
        DB::statement('DROP EVENT IF EXISTS resetea_checkin');
    }
};
