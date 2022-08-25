@extends('app.layouts.basico')

@section('titulo','Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
        <p> Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
            <li> <a href="{{ route('produto.create') }}"> Novo </a> </li>
             <li> <a href=""> Consulta </a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">
             <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="width:100%">
                    <thead>
                        <tr>
                            <th> Nome </th>
                            <th> Descrição </th>
                            <th> Peso </th>
                            <th> Unidade ID </th>
                            <th> Comprimento  </th>
                            <th> Altura </th>
                            <th> Largura </th> 
                            <th>  </th>
                            <th>  </th>
                            <th>  </th>
                        </tr>
                    </thead>
                @foreach($produtos as $produto)
                    <tr>
                            <td> {{$produto->nome}} </td>
                            <td> {{$produto->descricao}} </td>
                            <td> {{$produto->peso}} </td>
                            <td> {{$produto->unidade_id}} </td>
                             <td>{{$produto->produtoDetalhe->cumprimento ?? ''}} </td>
                            <td> {{$produto->produtoDetalhe->altura ?? ''}} </td>
                            <td> {{$produto->produtoDetalhe->largura ?? ''}} </td>
                            <td><a href="{{ route('produto.show', ['produto'=>$produto->id])}}"> Visualizar </a></td>
                            <td>
                            <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                            @method('DELETE')
                            @csrf
                            <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()"> Excluir </a>
                            </form>
                            </td>
                            <td><a href="{{ route('produto.edit', ['produto'=>$produto->id]) }}"> Editar </a></td>
                        </tr>

                        <tr>
                            <td colspan="12">
                           <p> Pedidos </p>
                           @foreach($produto->pedidos as $pedido)
                           <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                               Pedido: {{ $pedido->id }},
                           @endforeach
                        </tr>
                @endforeach

                </table>

               
                {{$produtos->appends($request)->links()}}
                <br>
 {{-- 
                {{$fornecedores->count()}} - Total de registros por página

                <br>

                {{$fornecedores->total()}} - Total de registros da Consulta

                <br>

                {{$fornecedores->firstItem()}} - Número do primeiro registro da página

                <br>

                {{$fornecedores->lastItem()}} - Número do últim registro da página

                <br> --}}
               Exibindo {{$produtos->count()}} produtos de {{ $produtos->total()}}
             </div>
        </div>
    </div>
@endsection