<STYLE type="text/css">
    <!--
    * {
        list-style-type: none;
        font-family: Arial, sans-serif;
        text-align: center;
        font-size: 24px;
        margin: 0;
        padding: 0;
    }

    select {
        width: 100%;
        height: 70px;
    }

    input {
        width: 100%;
        height: 70px;
    }

    -->
</STYLE>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    function getName() {
        var faculty = $("#faculty option:selected").val();
        $.ajax({
            type: "POST",
            url: "ajax.php",
            dataType: "json",
            data: {faculty: faculty}
        }).done(function (result) {
            $("#name").removeAttr("disabled");
            $("#name").empty();
            $("#name").append($('<option selected>Выберите направление</option>'));
            jQuery.each(result, function () {
                $("#name").append($('<option value="' + this + '">' + this + '</option>'));
            });

        });
    }
    function getCourse() {
        var faculty = $("#faculty option:selected").val();
        var name = $("#name option:selected").val();
        $.ajax({
            type: "POST",
            url: "ajax.php",
            dataType: "json",
            data: {faculty: faculty, name: name}
        }).done(function (result) {
            $("#course").removeAttr("disabled");
            $("#course").empty();
            $("#course").append($('<option selected>Выберите курс</option>'));
            jQuery.each(result, function () {
                $("#course").append($('<option value="' + this + '">' + this + '</option>'));
            });
        });
    }
</script>
<?php
include "db_conn.php";
?>
<form action="next.php" method="POST">
    <select name="faculty" id="faculty" onchange="getName()">
        <option selected>Выберите факультет</option>
        <?php
        $result = $connection->query("SELECT DISTINCT faculty FROM groups");
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['faculty'] . '">' . $row['faculty'] . '</option>';
        }
        ?>
    </select>
    <select name="name" id="name" disabled onchange="getCourse()">
        <option selected>Выберите направление</option>
    </select>
    <select name="course" id="course" disabled>
        <option selected>Выберите курс</option>
    </select>
    <input type="submit" value="Выбрать">
</form>
<?php
$connection->close();
?>

