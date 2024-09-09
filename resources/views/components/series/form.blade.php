<form action={{ $action }} method="post">
    @csrf
    @if($update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" @isset($nome)value="{{$nome}}"@endisset>    
    </div>
    @if($update)
        <button type="submit" class="btn btn-primary">Editar</button>
    @else
        <button type="submit" class="btn btn-primary">Adicionar</button>
    @endif
</form>