<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input type="text" value="{{ old('nome') }}" name="nome" placeholder="Nome" class="{{ $classe }}">
    @if($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input type="text" value="{{ old('telefone') }}" name="telefone" placeholder="Telefone" class="{{ $classe }}">
        {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input type="text" value="{{ old('email') }}" name="email" placeholder="E-mail" class="{{ $classe }}">
        {{ $errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
        {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <br>
    <textarea name="mensagem" placeholder="Digite sua mensagem" class="{{ $classe }}">@if(old('mensagem')!=''){{ old('mensagem')}}@endif</textarea>
        {{ $errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>