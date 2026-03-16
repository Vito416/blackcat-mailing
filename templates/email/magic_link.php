<?php
declare(strict_types=1);

/** @var array<string,mixed> $data */
$magicUrl = (string)($data['magic_link_url'] ?? '');
$appName = (string)($data['app_name'] ?? 'BlackCat');
$ttl = (int)($data['ttl_seconds'] ?? 0);

$subject = $appName . ': sign in';
$text = "Sign in:\n" . $magicUrl . "\n";
if ($ttl > 0) {
    $text .= "\nThis link expires in " . $ttl . " seconds.\n";
}

$html = '<p>Sign in:</p>'
    . '<p><a href="' . htmlspecialchars($magicUrl, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '">Sign in</a></p>';

return [
    'subject' => $subject,
    'html' => $html,
    'text' => $text,
];
