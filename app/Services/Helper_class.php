<?php

namespace App\Services;

class Helper_class
{

    public function order_confirmation()
    {
        $val =  glob("./order_confirmation/*");

        return $this->print($val);
    }

    public function ship_notification()
    {
        $val =  glob("./ship_notification/*");

        return $this->print($val);
    }

    public function print($val)
    {
        foreach ($val as $data) {
            $result = file_get_contents($data);

            echo "<pre>";
            echo htmlspecialchars($result);
            echo "</pre> <br>";
        }
    }
}
