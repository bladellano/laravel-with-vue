@if (isset($produto_detalhe->id))
    <form method="post" action="{{route('produto-detalhe.update',['produto'=>$produto_detalhe->id])}}">
@csrf
@method('PUT')
@else
    <form method="post" action="{{route('produto-detalhe.store')}}">
@csrf
@endif

<input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="Produto ID" class="borda-preta">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}

<select name="unidade_id">
<option value="">--Selecione--</option>
@foreach ($unidades as $u)
    <option value="{{$u->id}}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $u->id ? 'selected' : '' }} >{{$u->descricao}}</option>
@endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta"> {{ isset($produto_detalhe->id) ? 'Atualizar' : 'Cadastrar' }}</button>
</form>