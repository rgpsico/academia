<form action="{{route('imageUpload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='form-group' >
        <input type="hidden" name="idAluno" id="idAluno" value="">
        <input type="file" name="avatarFile" id="avatarFile" value="">
    </div>

</form>