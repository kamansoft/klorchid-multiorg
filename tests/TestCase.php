<?php

namespace Kamansoft\PlatformMultiorg\Tests;

use Kamansoft\PlatformMultiorg\PlatformMultiorgServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      PlatformMultiorgServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}