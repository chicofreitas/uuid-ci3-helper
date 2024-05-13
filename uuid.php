<?php
function generateUUID() {
    // Generate 16 bytes (128 bits) of random data
    $data = random_bytes(16);

    // Set the UUID version (4 for randomly generated UUIDs)
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    
    // Set the UUID variant (2 bits)
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Format the UUID
    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

    return $uuid;
}

// Usage
$random_uuid = generateUUID();
echo "Lenght: " . strlen($random_uuid) . ".\n\n";
echo $random_uuid;
?>
