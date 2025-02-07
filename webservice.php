<?php
$dataset_file = __DIR__ . '/dataset.json';

if (!file_exists($dataset_file)) {
    echo json_encode(['error' => 'dataset.json not found']);
    exit;
}

$dataset = json_decode(file_get_contents($dataset_file), true);

if ($dataset === null) {
    echo json_encode(['error' => 'Invalid JSON in dataset.json']);
    exit;
}

$search_text = isset($_GET["texto"]) ? trim($_GET["texto"]) : "";
$search_text = urldecode(htmlspecialchars($search_text));
echo ("Texto buscado: " . $search_text);

if ($search_text === "") {
    echo json_encode(["error" => "'texto' param is required"]);
    exit;
}

$found_books = [];
$found_authors = [];
$authors_books = [];



foreach ($dataset as $item) {

    //match only with the exact text
    if (strtolower($item["titulo"]) == strtolower($search_text)) {
        $found_books[] = $item;
    }

    if (strtolower($item["autor"]) == strtolower($search_text)) {
        $found_authors[$item["autor"]][] = $item;
    }
}

foreach ($found_authors as $author => $books) {
    usort($books, fn($a, $b) => $b["fecha_nov"] <=> $a["fecha_nov"]);

    $authors_books[] = [
        "autor" => $author,
        "libros_recientes" => array_slice($books, 0, 2)
    ];
}

header('Content-Type: application/json');
echo json_encode(["libros" => $found_books, "autores" => $authors_books], JSON_PRETTY_PRINT);
