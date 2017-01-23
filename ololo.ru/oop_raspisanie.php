<STYLE type="text/css">
    <!--
    * {
        font-family: Arial, sans-serif;
        text-align: center;
        font-size: 30px;
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url(ds.jpg);
    }

    div {
        width: 80%;
        margin-left: 10%;
        background: white;
        text-align: center;
        opacity: 0.9;
        z-index: -2;
    }

    table {
        min-width: 100%;
    }

    tr.linum {
        margin-top: 30px;
    }

    caption {
        margin-bottom: 30px;
        margin-top: 30px;
        line-height: 50px;
        background-image: url(2.png);
        font-weight: bold;
    }

    tr.linum td:first-child {
        width: 25%;
        text-align: left;
        vertical-align: 0;
        position: absolute;
        padding-left: 6px;
        font-weight: 600;
    }

    tr.linum td:nth-child(2) {
        padding-left: 230px;
    }

    tr.linum:before {
        content: '';
        background-image: url(1.png);
        opacity: 0.8;
        height: 60px;
        width: 220px;
        margin-top: -5px;
        margin-left: -20px;
        position: absolute;
    }

    span {
        color: transparent;
    }

    -->
</STYLE>
<body>
<div>
    <?php
    include "db_conn.php";
    include "classes.php";
    $id = (int)$_GET['id'];
    $day = date(N);
    if ((date(W) % 2) == 0) {
        $parity = 2;
        $paritydes = 'Знаменатель';
    } else {
        $parity = 1;
        $paritydes = 'Числитель';
    }
    $rt = new raspD($parity, $id);
    //Расписание на сегодня
    echo '<table><caption>Сегодня ' . $rt->daydes($day) . ' (' . $paritydes . ')</caption>';
    $rt->getView($day);
    echo '</table>';
    //Расписание на всю неделю
    $rt->rasp();
    $connection->close();
    ?>
</div>
</body>