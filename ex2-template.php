<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<style>
    tr.header{
        font-weight: bold;
        color: white;
        background-color: deepskyblue;
    }

    td{
        padding: 10px;
    }

</style>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    if(isset($_GET['$filePath'])){
        $root = $_GET['$filePath'];
    }
    $parent = dirname($root);
?>
<script>
    $(document).ready(function () {


        $(".rename").click(function () {

            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });

        });


    });



</script>


<br>
<div style="width: 300px; margin: auto; margin-bottom: 50px">

    <form >
        <input type="text">
        <input type="submit" value="New folder" name="submit">
    </form>

    <br>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="submit">
    </form>

</div>



<table border="1" cellpadding="15" cellspacing="10" style="text-align: center; margin: auto; border-collapse: collapse">
    <tr>
        <td colspan="6">
            <form method="get">
                <input type="text" name = "path" value= "<?=$link?>">
                <input type="submit" value ="Back" name="submit">
            </form>
        </td>


    </tr>
    <tr class="header">
        <td>Icon</td>
        <td>File name</td>
        <td>Type</td>
        <td>Last modified</td>
        <td>File size</td>
        <td>Action</td>
    </tr>


    <?php
    $files = scandir($root);
    for($i =0; $i < count($files); $i++){
        $fileName = $files[$i];
        $filePath = $root . '/' . $fileName;
        $file = 'File';

        $size = '-';
        if(substr($fileName,0,1)== '.') continue;

        if (is_dir($filePath)){
            $file = 'Directory';
            $link =  "?filePath=<?=$filePath?>";

        }
        else{
            $size = ceil(filesize($filePath))/1024;
            $size = $size.'KB';
        }

        ?>

        <tr>
            <td><img src="images/Folder-icon.png"></td>
            <td><a href="<?=$link?>"><?=$fileName?></a></td>
            <td><?= $file ?></td>
            <td>14/10/2017</td>
            <td><?= $size ?></td>
            <td><a href="#" class="rename">Rename</a> | <a href="#" class  ="Delete">Delete</a></td>
        </tr>

        <?php
    }
    ?>
</table>


<!-- Rename dialog -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đổi tên thư mục</h4>
            </div>
            <div class="modal-body">
                <p>Nhập tên mới.</p>
                <input type="text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Lưu</button>
            </div>
        </div>
    </div>
</div>
<!-- Rename dialog -->



</body>
</html>