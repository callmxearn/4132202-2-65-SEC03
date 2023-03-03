<?php
include "condb.php";
?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Lastname</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM db_test ORDER BY user_id ASC";
        $result = mysqli_query($link,$sql);
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?=$row['user_id']?></td>
            <td><?=$row['user_name']?></td>
            <td><?=$row['user_pass']?></td>
            <th><button class="btn_edit"><?=$row['user_id']?></button></th>
            <th><button class="btn_del"><?=$row['user_id']?></button></th>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(".btn_del").click(function () {
        $.ajax({
            url:"/model/user._del.php",
            method: "GET",
            data: { id : id_vcval },
            success: function (res) {
                $("#div_res").html(res);
                $("#div_action").load("/model/user_data.php");
            }
        });
    });
</script>