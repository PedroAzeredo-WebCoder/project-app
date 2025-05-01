<div>
    {{-- This comment will not be present in the rendered HTML --}}
    <h1>Fornecedores</h1>

    @isset($fornecedores)
        @unless (count($fornecedores) > 0)
            <p>Nenhum fornecedor encontrado</p>
        @else
            @foreach ($fornecedores as $fornecedor)
                Interação {{ $loop->iteration }}
                @if ($loop->first)
                    <p>Primeiro fornecedor</p>
                @endif
                @if ($loop->last)
                    <p>Último fornecedor</p>

                    Total: {{ $loop->count }}
                @endif

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
                    <p>CNPJ: Não informado</p>
                @else
                    <p>CNPJ: {{ $fornecedor['cnpj'] }}</p>
                @endempty

                Status: {{ $fornecedor['status'] ?? 'Não informado' }}

                @switch($fornecedor['ddd'])
                    @case('51')
                        <p>DDD: Rio Grande do Sul</p>
                    @break

                    @case('11')
                        <p>DDD: São Paulo</p>
                    @break

                    @default
                        <p>DDD: Não informado</p>
                @endswitch

                {{-- Exibe todas as categorias em uma linha separada por vírgula usando @for --}}
                @if (!empty($fornecedor['categorias']) && is_array($fornecedor['categorias']))
                    <p>Categorias:
                        @for ($i = 0; $i < count($fornecedor['categorias']); $i++)
                            {{ $fornecedor['categorias'][$i] }}
                            @if ($i < count($fornecedor['categorias']) - 1)
                                ,
                            @endif
                        @endfor
                    </p>
                @else
                    <p>Categorias: Não informado</p>
                @endif

                @php
                    $i = 0;
                @endphp
                @if (!empty($fornecedor['atendimento']) && is_array($fornecedor['atendimento']))
                    <p>Atendimentos:
                        @php $i = 0; @endphp
                        @while ($i < count($fornecedor['atendimento']))
                            {{ $fornecedor['atendimento'][$i] }}@if ($i < count($fornecedor['atendimento']) - 1)
                                ,
                            @endif
                            @php $i++; @endphp
                        @endwhile
                    </p>
                @else
                    <p>Atendimentos: Não informado</p>
                @endif

                <p>Horários:
                    @forelse ($fornecedor['horarios'] ?? [] as $index => $horario)
                        {{ $horario }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @empty
                        Não informado
                    @endforelse
                </p>

                <hr>
            @endforeach
        @endunless
    @else
        <p>Lista de fornecedores não disponível.</p>
    @endisset
</div>
