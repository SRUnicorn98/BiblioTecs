<!DOCTYPE html>
<html>
<head>
<meta charset=”utf-8″>
<title></title>
</head>
<body>
<h2>Upload de Archivos en Laravel</h2>
<form method="post" id="frm" url="upload" files="true"” enctype="multipart/form-data">
{{ csrf_field() }}
<!--<input type="hidden" name="id_usuario_foto" value="<//?= $usuario->id; ?>"> -->
        <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 

      <div class="box-body">
        <div class="form-group col-xs-12" >
          <!--<//?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>
          <img src="<//?=  url($usuario->imagenurl)  ?>"  alt="User Image"  style="width:160px;height:160px;" id="fotografia_usuario" >
               User image -->
        </div>

        <div class="form-group col-xs-12"  >
          <label>Agregar Documento </label>
          <input name="archivo" id="archivo" type="file" class="archivo form-control"  required/><br /><br />
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Subir Documento</button>
      </div>
    </div>
</form>
</body>
</html>