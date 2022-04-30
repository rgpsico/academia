
   
       @csrf

        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id=" nome" value="{{ $aluno->nome ?? '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="Whatssap" class="col-sm-2 col-form-label">Whatssap</label>
            <div class="col-sm-10">
                <input type="text" name="whatssap" class="form-control @error('whatssap') is-invalid @enderror" id="whatssap" value="{{ $aluno->whatssap ?? ''}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="instagran" class="col-sm-2 col-form-label">instagran</label>
            <div class="col-sm-10">
                <input type="text" name="instagran"
                    class="form-control @error('instagran') is-invalid @enderror" id=" instagran" value="{{ $aluno->instagran ?? '' }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="instagran" class="col-sm-2 col-form-label">Imagem</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
            </div>
        </div>
    

        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">{{$submit_bottom ?? 'Atualizar'}}</button>
                </div>
        </div>
        <!-- /.box-footer -->
    </form>

 
</div>