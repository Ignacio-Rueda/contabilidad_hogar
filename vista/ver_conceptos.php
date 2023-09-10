<?php include "./inc/nav.php";?>
<h1 class="title">Ver conceptos</h1>
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=contabilidad', 'root', '');

    $dbname = 'contabilidad';
    $query = "SHOW TABLES FROM $dbname";
    $stmt = $pdo->query($query);
    ?>
    <table>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?> <?php
        echo "<tr>";
        echo "<td>";
        echo $row['Tables_in_contabilidad'];
        echo "</td>";
        echo "</tr>";
    }
    ?>
    </table>
    
    <?php
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
