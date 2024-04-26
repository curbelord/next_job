<div class="seccion_buscador">

    @if ($titulo == 'Busca una empresa')
        <form method="GET" action="{{ route('empresas_coincidentes') }}" id="formulario_empresas">
            @csrf

            <div class="tabla">
                <h2>{{ $titulo }}</h2>
            </div>

            <div class="tabla">
                <input type="text" name="buscador" id="buscador" placeholder="{{ $placeholder_buscador }}">
            </div>

            <div class="tabla">
                <button id="boton_envio_formulario" type="submit">Buscar</button>
            </div>
        </form>

    @else

        <form method="GET" action="{{ route('gestionar.ofertas.ofertas') }}">
            @csrf

            <div class="tabla">
                <h2>{{ $titulo }}</h2>
            </div>

            <div class="tabla">
                <input type="text" name="buscador" id="buscador" placeholder="{{ $placeholder_buscador }}">

                @if ($mostrarProvincias)
                    <select name="provincia" id="provincia">
                        <option value="0">Selecciona una provincia</option>

                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia }}">{{ $provincia }}</option>
                            @endforeach
                    </select>
                @endif
            </div>

            <div class="tabla tabla_filtros">
                @if ($mostrarFiltros)
                    {{-- @include('components.filtros') --}}
                    @include('desplegable')
                @endif
            </div>

            <div class="tabla">
                <button id="boton_envio_formulario" type="submit">Buscar</button>
            </div>
        </form>

    @endif

</div>
