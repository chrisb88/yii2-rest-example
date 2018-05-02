<?php


class UpdateCategoryCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function patchCategory(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPATCH('/categories/560f1a36-f580-11e7-b73d-d43d7e54900e', ['name' => 'Category 1 updated', 'slug' => 'cat1-upd']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeInDatabase('categories', ['name' => 'Category 1 updated']);
    }

    public function putCategory(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPUT('/categories/560f1a36-f580-11e7-b73d-d43d7e54900e', ['name' => 'Category 1 updated', 'slug' => 'cat1-upd']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeInDatabase('categories', ['name' => 'Category 1 updated']);
    }

    public function changeVisibility(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPATCH('/categories/560f1a36-f580-11e7-b73d-d43d7e54900e', ['isVisible' => 0]);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeInDatabase('categories', ['name' => 'Category 1', 'isVisible' => 0]);
    }

    public function cannotChangeId(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->sendPATCH('/categories/560f1a36-f580-11e7-b73d-d43d7e54900e', ['name' => 'Category 1 updated', 'id' => '860f1a36-f580-11e7-b73d-d43d7e54900e']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeInDatabase('categories', ['name' => 'Category 1 updated']);
        $I->dontSeeInDatabase('categories', ['id' => '860f1a36-f580-11e7-b73d-d43d7e54900e']);
    }
}
