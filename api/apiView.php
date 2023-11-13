<?php

class apiView {
    public function response($data, $status) {
        // Aviso al cliente que le enviamos datos JSON
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        // Convertimos a JSON
        echo json_encode($data);
    }

    private function requestStatus($code) {
        $status = array(
            200 => "OK",
            404 => "Not Found",
            500 => "Internal Server Error"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
    }
}