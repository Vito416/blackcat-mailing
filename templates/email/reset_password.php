<?php
declare(strict_types=1);

/** @var array<string,mixed> $data */
$resetUrl = (string)($data['reset_url'] ?? '');
$appName = (string)($data['app_name'] ?? 'BlackCat');
$ttl = (int)($data['ttl_seconds'] ?? 0);

$subject = $appName . ': reset your password';
$text = "Reset your password:\n" . $resetUrl . "\n";
if ($ttl > 0) {
    $text .= "\nThis link expires in " . $ttl . " seconds.\n";
}

$html = '<p>Reset your password:</p>'
    . '<p><a href="' . htmlspecialchars($resetUrl, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '">Reset password</a></p>';

return [
    'subject' => $subject,
    'html' => $html,
    'text' => $text,
];

