<h3>Fornecedor</h3>

@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
    Iteração atual: {{ $loop->iteration }}
    <br>
    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{$fornecedor['status']}}
    <br>
    CNPJ: {{$fornecedor['cnpj'] ?? ''}}
    <br>
    Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['tekefibe'] ?? ''}}
    <br>
    @if($loop->first)
        Primeira Iteração do loop
    @endif
    @if($loop->last)
        Ultima Iteração do loop

        <br>
        Total de registros {{$loop->count}}
    @endif
    <hr>
    @empty
        Não existem fornecedores cadastrados!!!
    @endforelse
@endisset

