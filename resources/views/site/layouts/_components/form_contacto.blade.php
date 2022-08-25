{{ $slot }}

 <form action={{ route('site.contacto') }} method="post">
        @csrf
            <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$class}}">
            @if($errors->has('nome'))
                {{ $errors->first('nome')}}
            @endif
            <br>
            <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$class}}">
            {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
            <br>
            <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$class}}">
            {{$errors->has('email') ? $errors->first('email') : ''}}
            <br>
            <select name="motivo_contacto_id" class="{{$class}}">
                <option value="">Qual o motivo do contato?</option>
                @foreach($motivo_contactos as $key => $motivo_contacto)
                 <option value="{{$motivo_contacto->id}}" {{old('motivo_contacto_id') == $motivo_contacto->id ? 'selected' : ''}}>{{$motivo_contacto->motivo_contacto}}</option>
                @endforeach
            </select>
             {{$errors->has('motivo_contacto_id') ? $errors->first('motivo_contacto_id') : ''}}
            <br>
            <textarea name="mensagem" class="{{$class}}">{{ (old('mensagem') != '') ? old('mensagem') : "Preecnha aqui a sua mensagem" }}</textarea>
            {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
            <br>
            <button type="submit" class="{{$class}}">ENVIAR</button>
</form>

{{-- 
@if($errors->any())
<div style="position:absolute; top:0px; left:0px; width:100%; background:red">

@foreach($errors->all() as $erro)

    {{$erro}}}
    <br>

@endforeach

</div>
@endif

--}}