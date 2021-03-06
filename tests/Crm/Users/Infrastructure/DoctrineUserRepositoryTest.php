<?php

declare(strict_types=1);

namespace RGR\Tests\Crm\Users\Infrastructure;

use RGR\Crm\Users\Infrastructure\Persistence\FileUsersRepository;
use RGR\Tests\Crm\Users\Domain\UserIdMother;
use RGR\Tests\Crm\Users\Domain\UserMother;
use RGR\Tests\Crm\Users\UserModuleInfrastructureTestCase;

final class DoctrineUserRepositoryTest extends UserModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_user(): void
    {
        $user = UserMother::random();

        $this->doctrineRepository()->save($user);
    }

    /** @test */
    public function it_should_return_an_existing_user(): void
    {
        $user = UserMother::random();

        $this->doctrineRepository()->save($user);

        $this->assertEquals($user, $this->doctrineRepository()->search($user->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_user(): void
    {
        $this->assertNull($this->doctrineRepository()->search(UserIdMother::random()));
    }
}
