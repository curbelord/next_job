<div class="contenedor_estudios_experiencia">

    <div class="contenedor_titulo">
        <h2>{{ $title }}</h2>
    </div>

    <div class="contenedor_contenido">

        <div class="contenedor_input">
            <input type="text" name="{{ $title }}" id="{{ $title }}" placeholder="Nombre {{ $tipo }}">
            <input type="text" name="{{ $centro }}" id="{{ $centro }}" placeholder="{{ $centro }}">
            <input type="date" name="anho_inicio_{{ $title }}" id="anho_inicio_{{ $title }}" placeholder="anho_inicio_{{ $title }}">
            <input type="date" name="anho_fin_{{ $title }}" id="anho_fin_{{ $title }}" placeholder="anho_fin_{{ $title }}">
        </div>

    </div>

</div>