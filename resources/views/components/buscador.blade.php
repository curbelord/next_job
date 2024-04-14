<div class="seccion_buscador">

    @if ($titulo == 'Busca una empresa')

                            <!--['empresa' => request('buscador')]
                            url('empresa', ['empresa' => $empresa->nombre])-->
        <form method="GET" action="{{ route('empresa_buscada') }}">

            @csrf

            <div class="tabla">
                <h2>{{ $titulo }}</h2>
            </div>

            <div class="tabla">
                <input type="text" name="buscador" id="buscador" placeholder="{{ $placeholder_buscador }}">
            </div>

            <div class="tabla">
                <button type="submit">Buscar</button>
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
                    @include('components.filtros')
                @endif
            </div>

            <div class="tabla">
                <button type="submit">Buscar</button>
            </div>

        </form>

    @endif

</div>
