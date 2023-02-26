@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                @foreach ($produtos as $p)
                        <tr>
                            <td>{{$p->nome}}</td>
                            <td>{{$p->site}}</td>
                            <td>{{$p->uf}}</td>
                            <td>{{$p->email}}</td>
                            <td> <a href="{{ route('produto.show',['produto'=>$p->id]) }}">Ver</a></td>
                            <td>
                                <form id="form_{{$p->id}}" method="post" action="{{ route('produto.destroy',['produto'=>$p->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$p->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td> <a href="{{ route('produto.edit',['produto'=>$p->id]) }}">Editar</a></td>
                        </tr>
                @endforeach
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links() }}

                <p>Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})</p>
            </div>
        </div>

    </div>

@endsection
