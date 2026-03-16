<?php
declare(strict_types=1);

/** @var array<string,mixed> $data */
$verifyUrl = (string)($data['verify_url'] ?? '');
$appName = (string)($data['app_name'] ?? 'BlackCat');
$ttl = (int)($data['ttl_seconds'] ?? 0);

$subject = $appName . ': verify your email';
$text = "Verify your email:\n" . $verifyUrl . "\n";
if ($ttl > 0) {
    $text .= "\nThis link expires in " . $ttl . " seconds.\n";
}

$html = '<p>Verify your email:</p>'
    . '<p><a href="' . htmlspecialchars($verifyUrl, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '">Verify email</a></p>';

return [
    'subject' => $subject,
    'html' => $html,
    'text' => $text,
];

