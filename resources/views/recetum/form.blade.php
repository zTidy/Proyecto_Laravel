<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="cliente_id" class="form-label">{{ __('Cliente Id') }}</label>
            <select name="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror" value="{{ old('cliente_id', $recetum?->cliente_id) }}" id="cliente_id" placeholder="Cliente Id">
                @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}">{{ $cliente->nombre}}</option>
                @endforeach
            </select>
            {!! $errors->first('cliente_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="receta" class="form-label">{{ __('Receta') }}</label>
            <textarea type="text" name="receta" class="form-control @error('receta') is-invalid @enderror" value="{{ old('receta', $recetum?->receta) }}" id="receta" placeholder="Receta">{{ $recetum->receta }}</textarea>
            {!! $errors->first('receta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
