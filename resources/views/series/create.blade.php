<x-layout title="Nova Série">
    <form action={{ route('series.store') }} method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value={{old('nome')}}>
            </div>
            <div class="col-2">
                <label for="seassonQty" class="form-label">N° de Temporadas:</label>
                <input type="text" id="seassonQty" name="seassonQty" class="form-control" value={{old('seassonQty')}}>
            </div>
            <div class="col-2">
                <label for="episodesPerSeasson" class="form-label">Eps/Temporadas:</label>
                <input type="text" id="episodesPerSeasson" name="episodesPerSeasson" class="form-control" value={{old('episodesPerSeasson')}}>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>