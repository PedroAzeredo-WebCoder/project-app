<div>
    {{-- This comment will not be present in the rendered HTML --}}
    <h1>Fornecedores</h1>

    @isset($fornecedores)
        @unless (count($fornecedores) > 0)
            <p>Nenhum fornecedor encontrado</p>
        @else
            @foreach ($fornecedores as $fornecedor)
                @isset($fornecedor['status'])
                    @if ($fornecedor['status'] == 'F')
                        <p style="color: red;">{{ $fornecedor['nome'] }}</p>
                    @elseif ($fornecedor['status'] == 'T')
                        <p style="color: green;">{{ $fornecedor['nome'] }}</p>
                    @else
                        <p>{{ $fornecedor['nome'] }}</p>
                    @endif
                @endisset
                
                @empty($fornecedor['cnpj'])
                    <p>CNPJ não informado</p>
                @else
                    <p>CNPJ: {{ $fornecedor['cnpj'] }}</p>
                @endempty

                Status: {{ $fornecedor['status'] ?? 'Não informado' }}
            @endforeach
        @endunless
    @else
        <p>Lista de fornecedores não disponível.</p>
    @endisset
</div>
