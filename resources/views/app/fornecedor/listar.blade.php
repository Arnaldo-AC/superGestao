@extends('app.layouts.basico')

@section('titulo','Fornecedor Listar')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
        <p> Fornecedor </p>
        </div>

        <div class="menu">
            <ul>
            <li> <a href="{{ route('app.fornecedor.adicionar') }}"> Novo </a> </li>
             <li> <a href="{{ route('app.fornecedor.listar') }}"> Consulta </a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">
             <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="width:100%">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Nome </th>
                            <th> Site </th>
                            <th> UF </th>
                            <th> E-mail </th>
                            <th>  </th>
                            <th>  </th>
                            <th>  </th>
                        </tr>
                    </thead>
                @foreach($fornecedores as $fornecedor)
                    <tr>
                            <td> {{$fornecedor->id}} </td>
                            <td> {{$fornecedor->nome}} </td>
                            <td> {{$fornecedor->site}} </td>
                            <td> {{$fornecedor->uf}} </td>
                            <td> {{$fornecedor->email}} </td>
                            <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}"> Excluir </a></td>
                            <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}"> Editar </a></td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <p> Lista de produtos </p>
                                <table border="1" style="margin:20px">
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> Nome </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fornecedor->produtos as $key => $produto)
                                            <tr>
                                                <td> {{ $produto->id}} </td>
                                                <td> {{$produto->nome}} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                @endforeach

                </table>

               
                {{$fornecedores->appends($request)->links()}}
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
               Exibindo {{$fornecedores->count()}} fornecedores de {{ $fornecedores->total()}}
             </div>
        </div>
    </div>
@endsection