<?php 
    function getDayName($date) {
        date_default_timezone_set('Asia/Jakarta');
        $listDays = listDays();
        $dayOfWeek = date('w', strtotime($date));
        $result = null;
        if (!empty($listDays[$dayOfWeek])) {
            $result = $listDays[$dayOfWeek];
        }
        return $result;
    }

    function listDays() {
        $list = [
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        return $list;
    }
    
    function getMonthName($date) {
        date_default_timezone_set('Asia/Jakarta');
        $listMonths = listMonths();
        $monthOfWeek = date('n', strtotime($date));
        $result = null;
        if (!empty($listMonths[$monthOfWeek])) {
            $result = $listMonths[$monthOfWeek];
        }
        return $result;
    }

    function listMonths() {
        $list = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        return $list;
    }
?>