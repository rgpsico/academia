  <template>
  <div>
    <form action="">
      <div class="input-group mb-3 col-9">
        <input
          type="text"
          class="form-control"
          name="nome"
          placeholder="Nome do Aluno"
          aria-label="Nome do Aluno"
          aria-describedby="basic-addon2"
          @change="getAlunos()"          
        />
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">
            Buscar Aluno
          </button>
        </div>
      </div>
    </form>
  </div>
</template>
<script>


</script>