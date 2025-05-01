<div>
    {{-- This comment will not be present in the rendered HTML --}}
    <h1>Fornecedores</h1>

    @isset($fornecedores)
        @unless (count($fornecedores) > 0)
            <p>Nenhum fornecedor encontrado</p>
        @else
            @foreach ($fornecedores as $fornecedor)
                @if ($fornecedor['status'] == 'F')
                    <p style="color: red;">{{ $fornecedor['nome'] }}</p>
                @elseif ($fornecedor['status'] == 'T')
                    <p style="color: green;">{{ $fornecedor['nome'] }}</p>
                @else
                    <p>{{ $fornecedor['nome'] }}</p>
                @endif  
            @endforeach
        @endunless
    @else
        <p>Lista de fornecedores não disponível.</p>
    @endisset
</div>