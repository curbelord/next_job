<div class="seccion_buscador">

    @if ($titulo == 'Busca una empresa')


        <form method="GET" action="{{ route('empresa-buscada') }}">

            @csrf
            
            <h2>{{ $titulo }}</h2>

            <input type="text" name="buscador" id="buscador" placeholder="{{ $placeholder_buscador }}">

            @if ($mostrarProvincias)
                <select name="provincia" id="provincia">
                    <option value="0">Selecciona una provincia</option>

                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia }}">{{ $provincia }}</option>
                        @endforeach        
                </select>
            @endif

            @if ($mostrarFiltros)
                @include('components.filtros')
            @endif

            <button type="submit">Buscar</button>

        </form>

    @else

        <form method="GET" action="{{ route('ofertas') }}">

            @csrf

            <h2>{{ $titulo }}</h2>

            <input type="text" name="buscador" id="buscador" placeholder="{{ $placeholder_buscador }}">

            @if ($mostrarProvincias)
                <select name="provincia" id="provincia">
                    <option value="0">Selecciona una provincia</option>

                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia }}">{{ $provincia }}</option>
                        @endforeach        
                </select>
            @endif

            @if ($mostrarFiltros)
                @include('components.filtros')
            @endif

            <button type="submit">Buscar</button>

        </form>

    @endif

</div>
