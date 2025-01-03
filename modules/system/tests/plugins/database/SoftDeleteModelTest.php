<?php

namespace System\Tests\Plugins\Database;

use Database\Tester\Models\Author;
use Database\Tester\Models\SoftDeleteAuthor;
use Database\Tester\Models\UserWithAuthor;
use Database\Tester\Models\UserWithAuthorAndSoftDelete;
use Database\Tester\Models\UserWithSoftAuthor;
use Database\Tester\Models\UserWithSoftAuthorAndSoftDelete;
use Model;
use System\Tests\Bootstrap\PluginTestCase;

class SoftDeleteModelTest extends PluginTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        include_once base_path().'/modules/system/tests/fixtures/plugins/database/tester/models/User.php';
        include_once base_path().'/modules/system/tests/fixtures/plugins/database/tester/models/Author.php';

        $this->runPluginRefreshCommand('Database.Tester');
    }

    public function testDeleteOptionOnHardModel()
    {
        Model::unguard();
        $user = UserWithAuthor::create(['name' => 'Stevie', 'email' => 'stevie@example.com']);
        $author = Author::create(['name' => 'Louie', 'email' => 'louie@example.com', 'user_id' => $user->id]);
        Model::reguard();

        $authorId = $author->id;
        $user->delete(); // Hard
        $this->assertNull(Author::find($authorId));
    }

    public function testSoftDeleteOptionOnHardModel()
    {
        Model::unguard();
        $user = UserWithSoftAuthor::create(['name' => 'Stevie', 'email' => 'stevie@example.com']);
        $author = Author::create(['name' => 'Louie', 'email' => 'louie@example.com', 'user_id' => $user->id]);
        Model::reguard();

        $authorId = $author->id;
        $user->delete(); // Hard
        $this->assertNotNull(Author::find($authorId)); // Do nothing
    }

    public function testSoftDeleteOptionOnSoftModel()
    {
        Model::unguard();
        $user = UserWithSoftAuthorAndSoftDelete::create(['name' => 'Stevie', 'email' => 'stevie@example.com']);
        $author = SoftDeleteAuthor::create(['name' => 'Louie', 'email' => 'louie@example.com', 'user_id' => $user->id]);
        Model::reguard();

        $authorId = $author->id;
        $user->delete(); // Soft
        $this->assertNull(SoftDeleteAuthor::find($authorId));
        $this->assertNotNull(SoftDeleteAuthor::withTrashed()->find($authorId));
    }

    public function testDeleteOptionOnSoftModel()
    {
        Model::unguard();
        $user = UserWithAuthorAndSoftDelete::create(['name' => 'Stevie', 'email' => 'stevie@example.com']);
        $author = Author::create(['name' => 'Louie', 'email' => 'louie@example.com', 'user_id' => $user->id]);
        Model::reguard();

        $authorId = $author->id;
        $user->delete(); // Soft
        $this->assertNotNull(Author::find($authorId)); // Do nothing

        $userId = $user->id;
        $user = UserWithAuthorAndSoftDelete::withTrashed()->find($userId);
        $user->restore();

        $user->forceDelete(); // Hard
        $this->assertNull(Author::find($authorId));
    }

    public function testRestoreSoftDeleteRelation()
    {
        Model::unguard();
        $user = UserWithSoftAuthorAndSoftDelete::create(['name' => 'Stevie', 'email' => 'stevie@example.com']);
        $author = SoftDeleteAuthor::create(['name' => 'Louie', 'email' => 'louie@example.com', 'user_id' => $user->id]);
        Model::reguard();

        $authorId = $author->id;
        $user->delete(); // Soft
        $this->assertNull(SoftDeleteAuthor::find($authorId));
        $this->assertNotNull(SoftDeleteAuthor::withTrashed()->find($authorId));

        $userId = $user->id;
        $user = UserWithSoftAuthorAndSoftDelete::withTrashed()->find($userId);
        $user->restore();

        $this->assertNotNull(SoftDeleteAuthor::find($authorId));
    }
}
