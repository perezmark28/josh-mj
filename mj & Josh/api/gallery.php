<?php
/**
 * Return gallery items as JSON (for JS) or handle delete.
 */
$baseDir = dirname(__DIR__);
$dataFile = $baseDir . '/gallery_data.json';

function readGalleryData($path) {
  if (!file_exists($path)) return [];
  $raw = @file_get_contents($path);
  if ($raw === false) return [];
  $data = @json_decode($raw, true);
  return is_array($data) ? $data : [];
}

function writeGalleryData($path, $data) {
  return file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX) !== false;
}

// DELETE (GET ?delete=id): remove item by id
if (isset($_GET['delete']) && $_GET['delete'] !== '') {
  header('Content-Type: application/json');
  $id = $_GET['delete'];
  $items = readGalleryData($dataFile);
  $idx = null;
  foreach ($items as $i => $item) {
    if (isset($item['id']) && $item['id'] === $id) { $idx = $i; break; }
  }
  if ($idx === null) {
    http_response_code(404);
    echo json_encode(['error' => 'Not found']);
    exit;
  }
  $removed = $items[$idx];
  array_splice($items, $idx, 1);
  if (isset($removed['url'])) {
    $filePath = $baseDir . '/' . $removed['url'];
    if (is_file($filePath)) @unlink($filePath);
  }
  writeGalleryData($dataFile, $items);
  echo json_encode(['ok' => true]);
  exit;
}

// GET: list all items
header('Content-Type: application/json');
header('Cache-Control: no-store');
$items = readGalleryData($dataFile);
echo json_encode(['items' => $items]);
