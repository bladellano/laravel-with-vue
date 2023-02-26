    @if (isset($produto->id))
        <form method="post" action="{{route('produto.update',['produto'=>$produto->id])}}">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{route('produto.store')}}">
        @csrf
    @endif

    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

    <select name="unidade_id">
        <option value="">--Selecione--</option>
        @foreach ($unidades as $u)
            <option value="{{$u->id}}" {{ ($produto->unidade_id ?? old('unidade_id')) == $u->id ? 'selected' : '' }} >{{$u->descricao}}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <button type="submit" class="borda-preta"> {{ isset($produto->id) ? 'Atualizar' : 'Cadastrar' }}</button>
</form>
