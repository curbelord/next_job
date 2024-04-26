<div class="container_formacion">
    <div class="datos_formacion_iconos">
        <div class="datos_formacion">
            <div class="nombre_formacion">
                <h3>{{ $nombreFormacion }}</h3>
            </div>
            <div class="nombre_centro">
                <p>{{ $nombreCentro }}</p>
            </div>
            <div class="fecha_inicio_fin_formacion">
                <p>{{ $fechaInicioFin }}</p>
            </div>
        </div>
        <div class="iconos_edicion_eliminacion">
            <div class="icono_editar">
                <a href="{{ $rutaEdicion }}"></a>
            </div>
            <button type="submit" class="icono_eliminar"></button>
        </div>
    </div>
</div>
