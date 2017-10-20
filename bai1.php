<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<style>

    /**
        T?o th�m 2 class kh�c t??ng t?
     */

    .A{
        background-color: #9d9d9d;
        color: azure;
    }

    .A:hover{
        background-color: #3c763d;
        color: white;
    }
    .B{
        background-color: Blue;
        color: deepskyblue;
    }

    .B:hover{
        background-color: darkblue;
        color: purple;
    }
    .C{
        background-color: Red;
        color: lightslategrey;
    }
    .C:hover{
        background-color: darkred;
        color: yellow;
    }
</style>


<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse; width:  300px; margin: auto">

    <!-- d�ng php l?p n l?n v?i c�c class kh�c nhau l?p ?i l?p l?i theo th? t? -->
    <?php
    for($i = 1; $i< 21; $i++){


        if($i % 3 == 0) {
            $cl = "A";
        }
        if($i % 3 == 1) {
            $cl = "B";
        }
        if($i % 3 == 2) {
            $cl = "C";
        }
        echo '<tr class="' .$cl. '">';
        echo '<td>' .$i. '</td>';
        echo ' <td>Sinh vi�n '.$i.'</td>';
        echo '</tr>';
    }
    ?>

</table>

</body>
</html>