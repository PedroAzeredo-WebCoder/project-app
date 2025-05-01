<div>
    {{-- This comment will not be present in the rendered HTML --}}
    <h1>Fornecedores</h1>

    @isset($fornecedores)
        @unless (count($fornecedores) > 0)
            <p>Nenhum fornecedor encontrado</p>
        @else
            <table border="1" width="100%" cellpadding="6" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>CNPJ</th>
                        <th>DDD</th>
                        <th>Categorias</th>
                        <th>Atendimentos</th>
                        <th>Horários</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @isset($fornecedor['status'])
                                    @if ($fornecedor['status'] == 'F')
                                        <span style="color: red;">{{ $fornecedor['nome'] }}</span>
                                    @elseif ($fornecedor['status'] == 'T')
                                        <span style="color: green;">{{ $fornecedor['nome'] }}</span>
                                    @else
                                        {{ $fornecedor['nome'] }}
                                    @endif
                                @else
                                    {{ $fornecedor['nome'] ?? 'Não informado' }}
                                @endisset
                                @if ($loop->first)
                                    <br><small>(Primeiro fornecedor)</small>
                                @endif
                                @if ($loop->last)
                                    <br><small>(Último fornecedor)</small>
                                    <br><small>Total: {{ $loop->count }}</small>
                                @endif
                            </td>
                            <td>{{ $fornecedor['status'] ?? 'Não informado' }}</td>
                            <td>
                                @empty($fornecedor['cnpj'])
                                    Não informado
                                @else
                                    {{ $fornecedor['cnpj'] }}
                                @endempty
                            </td>
                            <td>
                                @switch($fornecedor['ddd'])
                                    @case('51')
                                        Rio Grande do Sul
                                    @break

                                    @case('11')
                                        São Paulo
                                    @break

                                    @default
                                        Não informado
                                @endswitch
                            </td>
                            <td>
                                @if (!empty($fornecedor['categorias']) && is_array($fornecedor['categorias']))
                                    @for ($i = 0; $i < count($fornecedor['categorias']); $i++)
                                        {{ $fornecedor['categorias'][$i] }}@if ($i < count($fornecedor['categorias']) - 1)
                                            ,
                                        @endif
                                    @endfor
                                @else
                                    Não informado
                                @endif
                            </td>
                            <td>
                                @if (!empty($fornecedor['atendimento']) && is_array($fornecedor['atendimento']))
                                    @php $i = 0; @endphp
                                    @while ($i < count($fornecedor['atendimento']))
                                        {{ $fornecedor['atendimento'][$i] }}@if ($i < count($fornecedor['atendimento']) - 1)
                                            ,
                                        @endif
                                        @php $i++; @endphp
                                    @endwhile
                                @else
                                    Não informado
                                @endif
                            </td>
                            <td>
                                @forelse ($fornecedor['horarios'] ?? [] as $index => $horario)
                                    {{ $horario }}@if (!$loop->last)
                                        ,
                                    @endif
                                    @empty
                                        Não informado
                                    @endforelse
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endunless
        @else
            <p>Lista de fornecedores não disponível.</p>
        @endisset
    </div>
