<div class="container_experiencia">
    <div class="datos_experiencia_iconos">
        <div class="datos_experiencia">
            <div class="nombre_trabajo">
                <h3>{{ $nombreTrabajo }}</h3>
            </div>
            <div class="nombre_empresa">
                <p>{{ $nombreEmpresa }}</p>
            </div>
            <div class="fecha_inicio_fin_experiencia">
                <p>{{ $fechaInicioFin }}</p>
            </div>
        </div>
        <div class="iconos_edicion_eliminacion">
            <div class="icono_editar">
                <a href="{{ $rutaEdicion }}"></a>
            </div>
            <button type="submit" class="icono_eliminar" id="eliminar_experiencia"></button>
        </div>
    </div>
    <div class="descripcion_experiencia">
        <p>{{ $descripcion }}</p>
    </div>
</div>
