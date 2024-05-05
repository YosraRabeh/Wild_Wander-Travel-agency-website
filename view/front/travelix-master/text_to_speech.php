<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = json_decode(file_get_contents('php://input'), true)['content'];

    // POST request to create text-to-speech job
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.rapidapi.com/api/jobs');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['text' => $content]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'X-RapidAPI-Key: 01cc6023bamsh5bc68752b6b5cbap154e98jsnb30e54146190',
    ]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    $jobId = json_decode($result, true)['id'];

    // GET request to fetch audio URL
    do {
        sleep(1); // Wait for 1 second before checking job status

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.rapidapi.com/api/jobs/' . $jobId);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-RapidAPI-Key: 01cc6023bamsh5bc68752b6b5cbap154e98jsnb30e54146190',
        ]);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $jobStatus = json_decode($result, true);
    } while ($jobStatus['status'] === 'processing');

    // Send JSON response header
    header('Content-Type: application/json');

    if ($jobStatus['status'] === 'success') {
        echo json_encode(['audioUrl' => $jobStatus['url']]);
    } else {
        echo json_encode(['error' => 'Failed to convert text to speech']);
    }
}
?>
