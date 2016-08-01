<?php

echo "<h1>HI, IT'S DEMO</h1>";

// Rude MySql DEMO
try {
    $pdo= new PDO('mysql:host=localhost;dbname=demo', 'demo', 'demo');

    $sql = 'select phrase from quotes order by rand() limit 0,1';
    $stmt = $pdo->prepare( $sql );
    if ($stmt->execute() ) {
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
        echo sprintf("Quote Of The Day: <b>%s</b>", $stmt['phrase']);
        $stmt->closeCursor();
    }
    $pdo = null;
} catch ( PDOException $e ) {
    print "PDOException: " . $e->getMessage() . "<br/>";
    die();
} catch ( \Exception $e ) {
    print "Exception: " . $e->getMessage() . "<br/>";
    die();
}