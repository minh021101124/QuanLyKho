<?php
function percent($sale, $price) {
    if ($price == 0) {
        return 0;
    }
    return round((($price - $sale) * 100 / $price), 2); // Làm tròn đến 2 chữ số thập phân
}
?>



