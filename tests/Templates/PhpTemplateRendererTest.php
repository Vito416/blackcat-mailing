<?php
declare(strict_types=1);

namespace BlackCat\Mailing\Tests\Templates;

use BlackCat\Mailing\Templates\PhpTemplateRenderer;
use PHPUnit\Framework\TestCase;

final class PhpTemplateRendererTest extends TestCase
{
    public function testVerifyEmailTemplateRenders(): void
    {
        $renderer = PhpTemplateRenderer::default();
        $email = $renderer->render('verify_email', [
            'verify_url' => 'https://app.example.com/verify?token=x.y',
            'app_name' => 'BlackCat',
            'ttl_seconds' => 120,
        ]);

        self::assertNotSame('', $email->subject);
        self::assertStringContainsString('verify', strtolower($email->subject));
        self::assertStringContainsString('https://app.example.com/verify?token=x.y', $email->text);
        self::assertNotSame('', $email->html);
    }

    public function testMagicLinkTemplateRenders(): void
    {
        $renderer = PhpTemplateRenderer::default();
        $email = $renderer->render('magic_link', [
            'magic_link_url' => 'https://app.example.com/magic-login?token=x.y',
            'app_name' => 'BlackCat',
            'ttl_seconds' => 120,
        ]);

        self::assertNotSame('', $email->subject);
        self::assertStringContainsString('sign', strtolower($email->subject));
        self::assertStringContainsString('https://app.example.com/magic-login?token=x.y', $email->text);
        self::assertNotSame('', $email->html);
    }
}
