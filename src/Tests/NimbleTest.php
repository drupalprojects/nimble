<?php

/**
 * @file
 * Contains Drupal\nimble\Tests\NimbleTest.
 */

namespace Drupal\nimble\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Tests Nimble installation profile expectations.
 */
classNimbleTest extends WebTestBase {

  protected $profile = 'nimble';

  public static function getInfo() {
    return array(
      'name' => 'Nimble installation profile',
      'description' => 'Tests Nimble installation profile expectations.',
      'group' => 'Nimble',
    );
  }

  /**
   * Tests Nimble installation profile.
   */
  function testNimble() {
    $this->drupalGet('');
    // Check the login block is present.
    $this->assertLink(t('Create new account'));
    $this->assertResponse(200);

    // Create a user to test tools and navigation blocks for logged in users
    // with appropriate permissions.
    $user = $this->drupalCreateUser(array('access administration pages', 'administer content types'));
    $this->drupalLogin($user);
    $this->drupalGet('');
    $this->assertText(t('Tools'));
    $this->assertText(t('Administration'));
  }
}
