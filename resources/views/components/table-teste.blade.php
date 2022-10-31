<div>
    <div class="container">
       @foreach($alunos as $aluno)
        <div class="card">
          <div class="card-body">
            <img src="https://sistem.academiaextremeapocalipse.com.br/storage/alunos/OUIyOahX6i9E624LVMYrpQMq117X158DXDFJAtuw.jpg"  width="100" height="100" class="float-left rounded-circle">
            <div class="message">
              <h5 class="card-title">{{$aluno->nome}}</h5><br>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="actions">
              <a href="#" class="card-link">Like</a>
              <a href="#" class="card-link">Reply</a>
              <a href="#" class="card-link">Share</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
</div>
