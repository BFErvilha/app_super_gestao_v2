{{ $slot }}
<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    @if($errors->has('nome'))

    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="motivo_contatos_id" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivos as $motivo)
            <option value="{{$motivo->id}}" {{ old('motivo_contatos_id') === $motivo->id ? 'selected': '' }}>{{$motivo->motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" value="{{ old('nome') }}" class="borda-preta" placeholder="Preencha aqui a sua mensagem">
        @if(old('mensagem' !== ''))
            {{ old('mensagem') }}
        @endif
        Preencha aqui a sua mensagem
    </textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

@if($errors->any())
    <div style="position: absolute;  top: 0px; left: 0px; width: 100%; background-color:tomato ">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </div>
@endif
