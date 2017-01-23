<?php

// Класс расписания на неделю для группы
class raspD
{
    public $parity;
    public $id;
    private $res;

    //Конструктор класса
    public function __construct($parity, $id)
    {
        global $connection;
        $this->parity = $parity;
        $this->id = $id;
        $numm = $connection->query("SELECT number FROM groups WHERE id = '$id'")->fetch_assoc();
        echo '<title>' . $numm['number'] . '</title><h2>' . $numm['number'] . '</h2>';
    }

    //Описание дня недели
    public function daydes($day)
    {
        switch ($day) {
            case '1':
                return "Понедельник";
                break;
            case '2':
                return "Вторник";
                break;
            case '3':
                return "Среда";
                break;
            case '4':
                return "Четверг";
                break;
            case '5':
                return "Пятница";
                break;
            case '6':
                return "Суббота";
                break;
            case '7':
                return "Воскресенье";
                break;
        }
    }

    //Время проведения пары
    private function ltime($i)
    {
        switch ($i) {
            case '1':
                return "8:20 - 9:50";
                break;
            case '2':
                return "10:00 - 11:30";
                break;
            case '3':
                return "12:10 - 13:40";
                break;
            case '4':
                return "13:50 - 15:20";
                break;
            case '5':
                return "15:50 - 17:20";
                break;
            case '6':
                return "17:30 - 19:00";
                break;
            case '7':
                return "19:30 - 21:00";
                break;
        }
    }

    //Расписание на день
    public function getView($day)
    {
        global $connection;
        $this->res = $connection->query("SELECT * FROM raspis WHERE group_id = '{$this->id}' AND weekday = '{$day}' AND (parity = '0' OR parity = '{$this->parity}') ORDER BY 'number'");
        //Проверка на наличие пар
        if ($this->res->num_rows == 0) {
            echo '<tr class="linum0"><td>Нет пар</td></tr>';
        } else {
            while ($row = $this->res->fetch_assoc()) {
                if ($row['corpus'] == 8 OR $row['corpus'] == 0) {
                    echo '<tr class="linum"><td>' . $this->ltime($row['number']) . '</td><td>' . $row['discipline'] . '<br><b>Индивидуально</b><br><span>aaa</span></td></tr>';
                } else {
                    echo '<tr class="linum"><td>' . $this->ltime($row['number']) . '</td><td>' . $row['discipline'] . '<br><b>' . $row['cabinet'] . '/' . $row['corpus'] . 'к</b><br>' . $row['teacher'] . '<br><span>Помогите кто нибудь!!!</span></td></tr>';
                }
            }
        }
    }

    //Расписание на неделю
    public function rasp()
    {
        for ($i = 1; $i <= 6; $i++) {
            echo '<table><caption>' . $this->daydes($i) . '</caption>';
            $this->getView($i);
            echo '</table>';
        }
    }

}

?>