<div class="seccion_buscador">

    <h2>Busca un empleo</h2>

    <input type="text" name="buscador" id="buscador" placeholder="Puesto, localidad, categoría...">

    <select name="provincia" id="provincia">
        <option value="0">Selecciona una provincia</option>

        @foreach ($provincias as $provincia)
            <option value="{{ $provincia }}">{{ $provincia }}</option>
        @endforeach
        
    </select>

    <button type="button">Buscar</button>

</div>