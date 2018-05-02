<?php


class CreateCategoryCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function createCategory(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPOST('/categories', ['name' => 'newly created category', 'slug' => 'new-cat']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"newly created category"');
        $I->seeInDatabase('categories', ['name' => 'newly created category']);
    }
}
