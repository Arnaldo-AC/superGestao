@extends('app.layouts.basico')

@section('titulo','Pedido')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
        <p> Listagem de pedidos</p>
        </div>

        <div class="menu">
            <ul>
            <li> <a href="{{ route('pedido.create') }}"> Novo </a> </li>
             <li> <a href=""> Consulta </a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">
             <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="width:100%">
                    <thead>
                        <tr>
                            <th> ID Pedido </th>
                            <th> Cliente </th>
                            <th>  </th>
                            <th>  </th>
                            <th>  </th>
                             <th>  </th>
                        </tr>
                    </thead>
                @foreach($pedidos as $pedido)
                    <tr>
                            <td> {{$pedido->id}} </td>
                            <td> {{$pedido->cliente_id}} </td>
                             <td><a href="{{ route('pedido-produto.create', ['pedido'=>$pedido->id])}}"> Adicionar Produtos </a></td>
                            <td><a href="{{ route('pedido.show', ['pedido'=>$pedido->id])}}"> Visualizar </a></td>
                            <td>
                            <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                            @method('DELETE')
                            @csrf
                            <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()"> Excluir </a>
                            </form>
                            </td>
                            <td><a href="{{ route('pedido.edit', ['pedido'=>$pedido->id]) }}"> Editar </a></td>
                        </tr>
                @endforeach

                </table>

               
                {{$pedidos->appends($request)->links()}}
                <br>
 {{-- 
                {{$fornecedores->count()}} - Total de registros por p??gina

                <br>

                {{$fornecedores->total()}} - Total de registros da Consulta

                <br>

                {{$fornecedores->firstItem()}} - N??mero do primeiro registro da p??gina

                <br>

                {{$fornecedores->lastItem()}} - N??mero do ??ltim registro da p??gina

                <br> --}}
               Exibindo {{$pedidos->count()}} pedidos de {{ $pedidos->total()}}
             </div>
        </div>
    </div>
@endsection